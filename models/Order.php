<?php
require_once '../connect/connect.php';
class Order extends connect
{
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
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';

        $stmt = $this->connect()->prepare($sql);
        $now = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại

        return $stmt->execute([
            $name,
            $email,
            $phone,
            $address,
            $amount,
            $note,
            $shipping_id,
            $_SESSION['user']['user_id'],
            $coupon_id,
            $payment_method,
            $now,
            $now
        ]);
    }
    public function getLastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
    public function getAllOrderDetail()
    {
        $sql = 'select * from order_details';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    public function getOrderDetailById()
{
    if (!isset($_GET['order_detail_id']) || empty($_GET['order_detail_id'])) {
        return false; // Trả về false nếu không có order_detail_id
    }

    $sql = 'SELECT * FROM order_details WHERE order_detail_id = ?';
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$_GET['order_detail_id']]);
    $orderDetail = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$orderDetail) {
        error_log("LỖI: Không tìm thấy order_detail_id = " . $_GET['order_detail_id']);
    }

    return $orderDetail;
}
    public function getOrderById()
    {
        $sql = 'SELECT
     
      orders.*, 
      products.name AS product_name, 
      products.image AS product_image, 
      product_variants.sale_price AS variant_sale_price, 
      colors.color_name AS color_name, 
      sizes.size_name AS size_name
  FROM orders
  LEFT JOIN products ON products.product_id = orders.product_id
  LEFT JOIN product_variants ON product_variants.product_variant_id = orders.variant_id
  LEFT JOIN colors ON product_variants.color_id = colors.color_id
  LEFT JOIN sizes ON product_variants.size_id = sizes.size_id
  WHERE orders.order_detail_id = ?';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getCouponByID()
    {
        if (!isset($_GET['order_detail_id']) || empty($_GET['order_detail_id'])) {
            return false;
        }
    
        $sql = 'SELECT coupons.*, coupons.type AS type, coupons.coupon_value AS coupon_value
                FROM order_details
                LEFT JOIN coupons ON coupons.coupon_id = order_details.coupon_id
                WHERE order_details.order_detail_id = ?';
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        $coupon = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$coupon) {
            error_log("LỖI: Không tìm thấy mã giảm giá cho order_detail_id = " . $_GET['order_detail_id']);
        }
    
        return $coupon;
    }
    public function getShipByID()
{
    if (!isset($_GET['order_detail_id']) || empty($_GET['order_detail_id'])) {
        return false;
    }

    $sql = 'SELECT ships.* FROM order_details
            LEFT JOIN ships ON ships.shipping_id = order_details.shipping_id
            WHERE order_details.order_detail_id = ?';
    
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$_GET['order_detail_id']]);
    $ship = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ship) {
        error_log("LỖI: Không tìm thấy thông tin vận chuyển cho order_detail_id = " . $_GET['order_detail_id']);
    }

    return $ship;
}
    public function updateOrder($status)
    {
        $sql = 'SELECT status FROM order_details WHERE order_detail_id= ? ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        $currentStatus = $stmt->fetchColumn();

        $allowedStatus = [
            'Đang chờ' => ['Đã xác nhận'],
            'Đã xác nhận' => ['Đang giao'],
            'Đang Giao' => ['Đã giao'],
            'Đã giao' => []
        ];
        if (!isset($allowedStatus[$currentStatus]) || !in_array($status, $allowedStatus[$currentStatus])) {
            return false;
        }

        $sql = 'UPDATE order_details SET status=?, updated_at= now()  WHERE order_detail_id= ? ';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status, $_GET['order_detail_id']]);
    }
    public function getOrderDetailByUserId()
    {
        $sql = 'SELECT * FROM order_details where user_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function cancel()
    {
        $sql = 'DELETE FROM order_details where order_detail_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['order_detail_id']]);
    }
    





}
