<?php
class Database{
    protected $pdo;
    public function __construct(){
        $host = "localhost";
            $dbname = "duanmau";
            $username = "root";
            $password = "";
    
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối: " . $e->getMessage());
            }
    }
    public function RegisterModel($username, $password){
        $sql = "INSERT INTO user (username, `password`) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        return $stmt->execute();
    }
    public function LoginModel($username, $password){
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
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
    public function ListProduct($page, $limit){
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM mobilehome LIMIT $start, $limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TotalProduct(){
        $sql = "SELECT count(*) as count FROM mobilehome";
        $stmt = $this->pdo->query($sql);
        return (int)$stmt->fetchColumn();
    }
    public function ProductsSaleModel(){
        $sql = "SELECT * FROM sale";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ProductNew(){
        $sql = "SELECT * FROM vuacohang";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   



    public function getFilteredProducts($brand, $min, $max, $offset, $limit) {
        $sql = "SELECT * FROM mobilehome WHERE 1"; // Lọc tất cả nếu không có điều kiện
        $params = [];

        if (!empty($brand)) {
            // Nếu có thương hiệu, lọc theo thương hiệu
            $sql .= " AND brand IN (" . implode(',', array_fill(0, count($brand), '?')) . ")";
            $params = array_merge($params, $brand);
        }

        if (!empty($min) && !empty($max)) {
            // Nếu có giá trị min và max, lọc theo giá
            $sql .= " AND gia BETWEEN ? AND ?";
            $params[] = $min;
            $params[] = $max;
        }

        // Thêm phần phân trang
        $sql .= " LIMIT ? OFFSET ?";
        $stmt = $this->pdo->prepare($sql);

        // Liên kết các giá trị tham số
        $index = 1;
        foreach ($params as $param) {
            $stmt->bindValue($index++, $param);
        }

        $stmt->bindValue($index++, (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue($index++, (int)$offset, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countFilteredProducts($brand, $min, $max) {
        $sql = "SELECT COUNT(*) FROM mobilehome WHERE 1";
        $params = [];

        if (!empty($brand)) {
            $sql .= " AND brand IN (" . implode(',', array_fill(0, count($brand), '?')) . ")";
            $params = array_merge($params, $brand);
        }

        if (!empty($min) && !empty($max)) {
            $sql .= " AND gia BETWEEN ? AND ?";
            $params[] = $min;
            $params[] = $max;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }
    public function laysanphamtheoid($id) {
        $sql = "SELECT * FROM sale WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function laysanphamtheoid2($id) {
        $sql = "SELECT * FROM vuacohang WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $name, $giamoi, $image, $mota) {
        try {
            $query = "UPDATE sale 
                      SET name = :name, giamoi = :giamoi, image = :image, mota = :mota 
                      WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
    
            $stmt->bindValue(":name", $name );
            $stmt->bindValue(":giamoi", $giamoi);
            $stmt->bindValue(":image", $image);
            $stmt->bindValue(":mota", $mota);
            $stmt->bindValue(":id", $id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Lỗi cập nhật sản phẩm: " . $e->getMessage());
        }
        
    }
    function delete($id){
        $sql = "DELETE FROM sale WHERE id =". $id;
        $stmt = $this->pdo->prepare($sql);         
        $stmt->execute();
    }
}