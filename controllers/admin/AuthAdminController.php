<?php
require_once '../models/User.php';
class AuthAdminController extends User
{
    public function isAdmin()
    {
        return isset($_SESSION['user_admin']) && $_SESSION['user_admin']['role_id'] == 2;
    }

    public function middLeware()
    {
        if (!$this->isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền đăng nhập. Vui lòng đăng nhập lại";
            header('location: ?act=auth');
            exit();
        } else {
            return true;
        }
    }

    public function singin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['auth'])) {
            $errors = [];
            if (empty($_POST['email'])) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_POST['password'])) {
                $errors['password'] = 'Vui lòng nhập password';
            }
            
            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header('location: ?act=auth');
                exit();
            }

            $auth = $this->auth($_POST['email'], $_POST['password']);
            if ($auth) {
                $_SESSION['user_admin'] = $auth;
                $_SESSION['success'] = "Đăng nhập thành công";
                header('location: ?act=admin');
                exit();
            }else{
                $_SESSION['error'] = 'Bạn không có quyền truy cập';
                header('location: ?act=index');
                exit();
            }
        }
        include '../views/admin/auth/login.php';
    }

    public function logout(){
        unset($_SESSION['user_admin']);
        header('location: ?act=auth');
        exit();
    }
}
