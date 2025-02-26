<?php
session_start();
<<<<<<< HEAD
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/AuthAdminController.php';
=======
require_once '../controllers/admin/OrderAdminController.php';
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
>>>>>>> dungvtph48187
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/HomeController.php';
require_once('../controllers/client/CartController.php');
require_once '../controllers/client/OrderController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'index';

$categoryAdmin = new CategoryAdminController();
$couponAdmin = new CouponAdminController();
<<<<<<< HEAD
$authAdmin = new AuthAdminController();

$productAdmin = new ProductAdminController();

=======
$productAdmin = new ProductAdminController();
$orderAdmin = new OrderAdminController();
>>>>>>> dungvtph48187
//Client
$auth = new AuthController();
$profile = new ProfileController();
$home = new HomeController();
$cart = new CartController();
<<<<<<< HEAD

=======
>>>>>>> dungvtph48187
$order = new OrderController();




<<<<<<< HEAD

switch ($action) {
    case 'auth':
        $authAdmin->singin();
        break;
    case 'logout-admin':
        $authAdmin->logout();
        break;
    case 'admin':
        // $authAdmin->middLeware();
=======
switch ($action) {
    case 'admin':
>>>>>>> dungvtph48187
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
    case 'product-update':
        $productAdmin->update();
        break;
    case 'gallery-delete':
        $productAdmin->deleteGallery();
        break;
    case 'product-variant-delete':
        $productAdmin->deleteProductVariant();
        break;
    case 'product-delete':
        $productAdmin->deleteProduct();
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
<<<<<<< HEAD


        // Client
=======
    case 'order-list':
        $orderAdmin->list();
        break;
    case 'order-edit':
        $orderAdmin->edit();

        break;
    case 'order-update':
        $orderAdmin->update();

        break;



    // Client
>>>>>>> dungvtph48187
    case 'index':
        $home->index();
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
    case 'product_detail';
        $home->getProductDetail();
        break;

    case 'cart':
        $cart->index();
        break;
    case 'addToCart-buyNow':
        $cart->addToCartOrBuyNow();
        break;
    case 'update-cart':
        $cart->update();
        break;
    case 'delete-cart':
        $cart->delete();
        break;
<<<<<<< HEAD

=======
>>>>>>> dungvtph48187
    case 'checkout':
        $order->index();
        break;
    case 'order':
        $order->checkout();
        break;
<<<<<<< HEAD
    case 'checkout-complete':
        include '../views/client/checkout/checkoutComplete.php';
        break;
=======
>>>>>>> dungvtph48187
}
