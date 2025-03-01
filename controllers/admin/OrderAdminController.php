<?php
require_once '../models/Order.php';
class OrderAdminController extends Order
{
    public function list()
    {
        $listOrder = $this->getAllOrderDetail();
        include '../views/admin/order/list.php';
    }
    public function edit()
    {
        $getOrderDetail = $this->getOrderDetailByID();
        $getOrder = $this->getOrderByID();

        $coupon = $this->getCouponByID();
        $ship = $this->getShipByID();
        $handleCoupon = $this->handleCoupon($coupon, $getOrderDetail['amount']);



        include '../views/admin/order/edit.php';
    }

    public function handleCoupon($coupon, $total)
    {
        if ($coupon['type'] == 'Percentage') {
            $totalCoupon = $total * ($coupon['coupon_value'] / 100);
        } elseif ($coupon['type'] == 'Fixed Amount') {
            $totalCoupon = $coupon['coupon_value'];
        }
        return $totalCoupon ?? 0;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateOrder'])) {
            $updateOrder = $this->updateOrder($_POST['status']);
            if ($updateOrder) {
                $_SESSION['success'] = 'Cập nhật đơn hàng thành công';
                header('Location: ?act=order-list');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật đơn hàng không thành công. Vui lòng kiểm tra lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }



}