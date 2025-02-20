<?php 
require_once '../connect/connect.php';
class Coupon extends connect{
    public function listCoupon(){
        $sql="SELECT * FROM `coupons`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function addCoupon($name, $start_date, $end_date, $quantity, $status, $coupon_code, $type, $coupon_value){
        $sql = 'INSERT INTO coupons(name, start_date, end_date, quantity, status, coupon_code, type, coupon_value, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return$stmt->execute([$name, $start_date, $end_date, $quantity, $status, $coupon_code, $type, $coupon_value]);
    }

    public function editCoupon(){
        $sql = 'SELECT * FROM coupons WHERE coupon_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['coupon_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCoupon($name, $start_date, $end_date, $quantity, $status, $coupon_code, $type, $coupon_value){
        $sql = 'UPDATE coupons SET name=?, start_date=? , end_date=? , quantity=? , status=? , coupon_code=? , type=? , coupon_value=? , updated_at=now() WHERE coupon_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $start_date, $end_date, $quantity, $status, $coupon_code, $type, $coupon_value, $_GET['coupon_id']]);
    }

    public function deleteCoupon(){
        $sql = 'DELETE FROM coupons WHERE coupon_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['coupon_id']]);
    }
}