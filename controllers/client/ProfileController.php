<?php
require_once '../models/User.php';
class ProfileController extends User{
    public function updateProfile(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên ';
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
            if (count($errors)>0) {
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
               }
            
            $_SESSION['errors'] = $errors;
           $user = $this->updateUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
           if ($user) {
            $_SESSION['user'] =$this->getUserById($_SESSION['user']['user_id']);
            $_SESSION['success'] = 'Cập nhật thông tin thành công';
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
           }else{
            
            $_SESSION['error'] = 'Cập nhật thông tin không thành công. Vui lòng kiểm tra lại';
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
           }
           
           
        }
    }
}