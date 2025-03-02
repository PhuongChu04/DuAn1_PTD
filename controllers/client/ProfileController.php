<?php
require_once '../models/User.php';
require_once '../models/Order.php';

class ProfileController
{
    protected $user;
    protected $order;

    public function __construct()
    {
        $this->user = new User();
        $this->order = new Order();
    }

    public function index()
    {
        $order = $this->order->getOrderDetailByUserId();
        include '../views/client/profile/profile.php';
    }

    public function indexOderClient()
    {
        $listOrder = $this->order->getOrderDetailByUserId();
        include '../views/client/trashOrder/orderClient.php';
    }

    public function trashOrder()
    {
        $getOrderDetail = $this->order->getOrderDetailByID();
        $getOrder = $this->order->getOrderByID();
        $coupon = $this->order->getCouponByID();
        $ship = $this->order->getShipByID();
        $handleCoupon = $this->handleCoupon($coupon, $getOrderDetail['amount']);

        include '../views/client/trashOrder/trashOrder.php';
    }

    public function handleCoupon($coupon, $total)
    {
        if ($coupon['type'] == 'Percentage') {
            return $total * ($coupon['coupon_value'] / 100);
        } elseif ($coupon['type'] == 'Fixed Amount') {
            return $coupon['coupon_value'];
        }
        return 0;
    }

    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên người dùng';
            }
            if (empty($_POST['email'])) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_POST['phone'])) {
                $errors['phone'] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($_POST['address'])) {
                $errors['address'] = 'Vui lòng nhập địa chỉ';
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $user = $this->user->updateUser($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email']);

            if ($user) {
                $_SESSION['user'] = $this->user->getUserByID($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cập nhật thông tin thành công';
            } else {
                $_SESSION['errors'] = 'Cập nhật thông tin không thành công. Vui lòng kiểm tra lại';
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function cancelOrder()
    {
        try {
            $this->order->cancel();
            $_SESSION['success'] = 'Hủy đơn hàng thành công';
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Hủy đơn hàng thất bại. Vui lòng thử lại';
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
