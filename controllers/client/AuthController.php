<?php
require_once '../models/User.php';
class AuthController extends User{
    public function registers()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên ';
            }
            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {    
                $errors['email'] = 'Vui lòng nhập emailemail';
            }
            if (empty($_POST['password']) &&  strlen($_POST['password']) <6) {
                $errors['password'] = 'Vui lòng nhập mật khẩu';
            }
            
            $_SESSION['errors'] = $errors;
            if (count($errors) >0) {
                header('Location: ?act=register');
                exit();
            }
            $resgister = $this->register($_POST['name'], $_POST['email'], $_POST['password']) ;            
            if ($resgister) {
                $_SESSION['success'] = 'Tạo tài khoản thành công. Vui lòng đăng nhập';
                header('Location: ?act=login');
                exit();
            }else{
                $_SESSION['error'] ='Tạo tài khỏan không thành công. Vui lòng xem lại';
                header('Location: '.$_SERVER['HTTP_REFERER']);
                exit();
            }
        
        }
        include '../views/client/auth/login_register.php';
    }

    public function signin(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $errors = [];
            
            if (empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {    
                $errors['email'] = 'Vui lòng nhập emailemail';
            }
            if (empty($_POST['password']) &&  strlen($_POST['password']) <6) {
                $errors['password'] = 'Vui lòng nhập mật khẩu';
            }
            
            $_SESSION['errors'] = $errors;
            if (count($errors) >0) {
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
            $login = $this->login($_POST['email'], $_POST['password']);
            if ($login) {
                $_SESSION['user'] =$login; //Lưu thông tin người dùng đăng nhập vào session
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('Location: ?act=index');
                exit();
            }else{
                $_SESSION['error'] ='Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin';
                header('Location: '.$_SERVER['HTTP_REFERER']);
                exit();
            }
           
            }      
            include '../views/client/auth/login_register.php';
           
    }

    public function changePassword(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-password'])) {
            $oldPassword =$this->getPassword();
            $errors= [];
            if (empty($_POST['old_password'])) {
                $errors['old_password']= 'Vui lòng nhập mật khẩu cũ';
            }
            if (empty($_POST['new_password'])) {
                $errors['new_password']= 'Vui lòng nhập mật khẩu mới';
            }
            if (empty($_POST['con_new_password'])) {
                $errors['con_new_password']= 'Vui lòng xác nhận mật khẩu ';
            }
            if (!password_verify($_POST['old_password'], $oldPassword)) {
                $errors['old_password']= 'Mật khẩu cũ không chính xác';
            }
            if ($_POST['new_password'] !== $_POST['con_new_password']) {
                $errors['con_new_password']= 'Mật khẩu mới không thùng khớp';
            }
            $_SESSION['errors'] =$errors;
            if (count($errors) > 0) {
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }
            $changePass =$this->updatePassword($_POST['new_password']);
            if ($changePass) {
                $_SESSION['success'] = 'Cập nhật mật khẩu thành công';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }else{
                $_SESSION['error']= 'Cập nhật mật khẩu không thành công. Vui lòng kiểm tra lại';
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }

        }
    }

    public function logout(){
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        header('Location: ./');
    }

}

