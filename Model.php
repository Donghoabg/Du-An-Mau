<?php
class Database{
    private $db;
    private $itemsPerPage = 8;
    protected $pdo;
    public function __construct(){
        $host = "localhost";
            $dbname = "duan";
            $username = "root";
            $password = "";
    
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối: " . $e->getMessage());
            }
    }
    

    public function RegisterModel($username, $password) {
    $role = 'user';
    $sql = "INSERT INTO user (username, `password`, role) VALUES (:username, :password, :role)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":role", $role);
    return $stmt->execute();
}
    

    public function CheckUserExists($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0;
    }

    public function LoginModel($username, $password){
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt= $this->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        if($stmt->fetch(PDO::FETCH_ASSOC)){
            return true;
        }else{
            return false;
        }

    }
    
    // Sản phẩm
    
    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addProduct($name, $price, $category_id) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, category_id) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $category_id]);
    }
    public function updateProduct($id, $name, $price, $category_id) {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, price = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $category_id, $id]);
    }
    public function deleteProduct($id) {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function searchProducts($category_id, $keyword, $min_price, $max_price, $sort = '', $limit = null, $offset = null) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $count_sql = "SELECT COUNT(*) FROM products WHERE 1=1";
        $params = [];
        $count_params = [];

        if (!empty($category_id)) {
            $sql .= " AND category_id = ?";
            $count_sql .= " AND category_id = ?";
            $params[] = $category_id;
            $count_params[] = $category_id;
        }

        if (!empty($keyword)) {
            $sql .= " AND name LIKE ?";
            $count_sql .= " AND name LIKE ?";
            $params[] = "%$keyword%";
            $count_params[] = "%$keyword%";
        }

        if (is_numeric($min_price)) {
            $sql .= " AND price >= ?";
            $count_sql .= " AND price >= ?";
            $params[] = $min_price;
            $count_params[] = $min_price;
        }

        if (is_numeric($max_price)) {
            $sql .= " AND price <= ?";
            $count_sql .= " AND price <= ?";
            $params[] = $max_price;
            $count_params[] = $max_price;
        }

        // Sắp xếp
        if ($sort === 'asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($sort === 'desc') {
            $sql .= " ORDER BY price DESC";
        } elseif ($sort === 'new') {
            $sql .= " ORDER BY id DESC"; // hoặc created_at nếu có
        }

        // Thêm LIMIT và OFFSET nếu có
        // Thêm LIMIT và OFFSET nếu có
    if ($limit !== null && $offset !== null) {
        $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
    }

    // Lấy danh sách sản phẩm
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params); // chỉ chứa các điều kiện lọc
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Lấy tổng số sản phẩm phù hợp
    $stmt_count = $this->pdo->prepare($count_sql);
    $stmt_count->execute($count_params);
    $total = $stmt_count->fetchColumn();

    return [
        'products' => $products ?? [],
        'total' => $total ?? 0
    ];
    }

    //


    // Danh mục
    public function getAllCategories() {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategoryById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addCategory($name) {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }
    public function updateCategory($id, $name) {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        return $stmt->execute([$name, $id]);
    }
    public function deleteCategory($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function getProducts($limit, $offset) {
        $stmt = $this->pdo->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalProducts() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM products");
        return $stmt->fetchColumn();
    }
    public function getSaleProducts() {
            $sql = "SELECT p.id, p.name, p.image, p.price AS original_price, s.sale_price
                    FROM sale_products s
                    JOIN products p ON s.product_id = p.id";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}