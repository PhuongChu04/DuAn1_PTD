<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/AuthAdminController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'index';

$categoryAdmin = new CategoryAdminController();
$couponAdmin = new CouponAdminController();
$authAdmin = new AuthAdminController();




//Client
$auth= new AuthController();
$profile= new ProfileController();


switch ($action) {
    case 'auth':
        $authAdmin->singin();
        break;
    case 'logout-admin':
        $authAdmin->logout();
        break;
    case 'admin':
        // $authAdmin->middLeware();
        include '../views/admin/index.php';
        break;
    case 'product':
        include '../views/admin/product/list.php';
        break;
    case 'product-create':
        include '../views/admin/product/create.php';
        break;
    case 'product-edit':
        include '../views/admin/product/edit.php';
        break;
    case 'category':
        $categoryAdmin->index();
        break;
    case 'category-create':
        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $categoryAdmin->updateCategory();
        break;
    case 'category-delete':
        $categoryAdmin->deleteCategory();
        break;
    case 'coupon':
        $couponAdmin->index();
        break;
    case 'coupon-create':
        $couponAdmin->create();
        break;
    case 'coupon-edit':
        $couponAdmin->edit();
        break;
    case 'coupon-update':
        $couponAdmin->update();
        break;
    case 'coupon-delete':
        $couponAdmin->delete();
        break;


    // Client
    case 'index':
        include '../views/client/index.php';
        break;
    case 'login_register':
        include '../views/client/auth/login_register.php';
        break;
    case 'login':
        $auth->signin();
        break;
    case 'register':
        $auth->registers();
        break;
    case 'profile':
        include '../views/client/profile/profile.php';
        break;
    case 'profileDetail':
        include '../views/client/profile/profileDetail.php';
        break;
    case 'update-profile':
        $profile->updateProfile();
        break;
    case 'change-password':
        $auth->changePassword();
        break;
    case 'logout':
        $auth->logout();
        break;
}
