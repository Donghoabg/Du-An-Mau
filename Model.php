<?php
class Database{
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
    public function getproductsale() {
    $sql = "SELECT * FROM sale";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    public function ProductsSaleModel(){
        $sql = "SELECT * FROM sale";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Sản phẩm
    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
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
    public function searchProducts($category_id, $keyword, $min_price, $max_price) {
        $sql = "SELECT * FROM products WHERE 1=1";
        $params = [];
        if (!empty($category_id)) { $sql .= " AND category_id = ?"; $params[] = $category_id; }
        if (!empty($keyword))    { $sql .= " AND name LIKE ?";    $params[] = "%$keyword%"; }
        if (is_numeric($min_price)) { $sql .= " AND price >= ?";  $params[] = $min_price; }
        if (is_numeric($max_price)) { $sql .= " AND price <= ?";  $params[] = $max_price; }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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
}