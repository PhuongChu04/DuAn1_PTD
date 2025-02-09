<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
// require_once '../controllers/client/HomeController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'index';

$categoryAdmin = new CategoryAdminController();

$auth= new AuthController();
$profile= new ProfileController();
$productAdmin= new ProductAdminController();
// $home= new HomeController();

switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product':
       $productAdmin->index();
        break;
    case 'product-create':
        $productAdmin->create();
        break;
    case 'product-store':
            $productAdmin->store();
            break;    
    case 'product-edit':
        $productAdmin->edit();
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


    // Client
    case 'index':
        // $home->index();
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
