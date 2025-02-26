<?php
require_once '../connect/connect.php';
class Ship extends connect {
    public function getAllShip(){
        $sql = 'SELECT * FROM ships';
        $stmt = $this->connect()->prepare($sql);    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);    
    }
}