<?php
require_once '../connect/connect.php';

class Wishlist extends connect{
    public function listWishList(){
        $sql = "SELECT products.*, favorites.* FROM favorites  LEFT JOIN products ON favorites.product_id = products.product_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWishList(){
        $sql = "INSERT INTO favorites(user_id,product_id,quantity,created_at) VALUES (?,?,1,now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'] ?? null, $_GET['product_i   d']]);
    }

    public function deleteWishList(){
        $sql = "DELETE FROM favorites WHERE favorite_id =?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['favorite_id']]);
    }

    public function checkWishList(){
        $sql = "SELECT *FROM favorites WHERE user_id= ? and product_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id'] ?? null, $_GET['product_id']]);
        return $stmt->fetch();
    }
}