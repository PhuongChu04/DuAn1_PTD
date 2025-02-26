<?php
require_once '../models/Order.php';
require_once '../models/Ship.php';
require_once '../models/User.php';
require_once '../models/Order.php';
class OrderController{
    protected $cart;
    protected $ship;
    protected $user;
    protected $order;
    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->order = new Order();
    }
    public function index()
    {
        $user = $this->user->getUserByID($_SESSION['user']['user_id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();
        // echo '<pre>';
        //     print_r($cart);
        //     echo '<pre>';
        //     exit();
        include '../views/client/checkout/checkout.php';
    }
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
            $errors = [];

        if (empty($_POST['name'])) {
            $errors['name'] = 'Vui lòng nhập họ tên.';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'Vui lòng nhập email.';
        }
        if (empty($_POST['phone'])) {
            $errors['phone'] = 'Vui lòng nhập số điện thoại.';
        }
        if (empty($_POST['address'])) {
            $errors['address'] = 'Vui lòng nhập địa chỉ.';
        }
        if (empty($_POST['shipping_id'])) {
            $errors['shipping_id'] = 'Vui lòng chọn phương thức giao hàng.';
        }
        if (empty($_POST['payment_method'])) {
            $errors['payment_method'] = 'Vui lòng chọn phương thức thanh toán.';
        }

        // Nếu có lỗi, lưu vào session và chuyển về trang checkout
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ?act=checkout');
            exit();
        }

            $carts = $this->cart->getAllCart();

            $orderDetail = $this->order->addOrderDetail(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['amount'],
                $_POST['note'],
                $_POST['shipping_id'],
                $_POST['coupon_id'],
                $_POST['payment_method'],
            );
            if ($orderDetail) {
                $orderDetail_Id = $this->order->getLastInsertId();
                foreach ($carts as $cart) {

                    $this->order->addOrder($cart['product_id'], $cart['variant_id'], $orderDetail_Id, $cart['quantity']);
                    $this->cart->deleteCart($cart['cart_id']);
                }
                
                unset($_SESSION['total']);
                unset($_SESSION['coupon']);
                unset($_SESSION['totalCoupon']);
                header("Location: ?act=checkout-complete");
                $_SESSION['success'] = 'Đặt hàng thành công';
                exit();
            } else {
                $_SESSION['error'] = 'Đặt hàng không thành công';
                header('Location: ?act=checkout');
                exit();
            }
            
        }
    }

   
}


?>