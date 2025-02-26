<?php
require_once '../connect/connect.php';
class Order extends connect{
    public function addOrder(
        $product_id,
        $variant_id,
        $order_detail_id,
        $quantity
    ) {
        $sql = 'INSERT INTO orders(user_id, product_id, variant_id, order_detail_id, quantity, created_at, updated_at)
                 VALUES (?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'], $product_id, $variant_id, $order_detail_id, $quantity]);
    }
    public function addOrderDetail($name, $email, $phone, $address, $amount, $note, $shipping_id, $coupon_id, $payment_method)
    {
        $sql = 'INSERT INTO order_details(name,email,phone,address,amount,note,shipping_id,user_id,coupon_id,payment_method,created_at,updated_at)
                 VALUES (?,?,?,?,?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note, $shipping_id, $_SESSION['user']['user_id'], $coupon_id, $payment_method]);
    }
    public function getLastInsertId()
    {
        return $this->connect()->lastInsertId();
    }

}
?>