<?php
session_start();

require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/ProductAdminController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../controllers/admin/AuthAdminController.php';

require_once '../controllers/admin/OrderAdminController.php';

require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/HomeController.php';
require_once('../controllers/client/CartController.php');
require_once '../controllers/client/OrderController.php';
require_once('../controllers/client/ShopController.php');
require_once('../controllers/client/WishlistController.php');
$action = isset($_GET['act']) ? $_GET['act'] : 'index';

$categoryAdmin = new CategoryAdminController();
$couponAdmin = new CouponAdminController();
$authAdmin = new AuthAdminController();

$productAdmin = new ProductAdminController();


$orderAdmin = new OrderAdminController();

$auth = new AuthController();
$profile = new ProfileController();
$home = new HomeController();
$cart = new CartController();
$shop = new ShopController();

$withList = new WithListController();

$order = new OrderController();





switch ($action) {
    case 'auth':
        $authAdmin->singin();
        break;
    case 'logout-admin':

        $authAdmin->logout();
        break;
    case 'admin':
        $authAdmin->middLeware();
        include '../views/admin/index.php';
        break;
    case 'product':
        $authAdmin->middLeware();

        $productAdmin->index();
        break;
    case 'product-create':
        $authAdmin->middLeware();

        $productAdmin->create();
        break;
    case 'product-store':
        $authAdmin->middLeware();

        $productAdmin->store();
        break;
    case 'product-edit':
        $authAdmin->middLeware();

        $productAdmin->edit();
        break;
    case 'product-update':
        $authAdmin->middLeware();

        $productAdmin->update();
        break;
    case 'gallery-delete':
        $authAdmin->middLeware();

        $productAdmin->deleteGallery();
        break;
    case 'product-variant-delete':
        $authAdmin->middLeware();

        $productAdmin->deleteProductVariant();
        break;
    case 'product-delete':
        $authAdmin->middLeware();

        $productAdmin->deleteProduct();
        break;
    case 'category':
        $authAdmin->middLeware();

        $categoryAdmin->index();
        break;
    case 'category-create':
        $authAdmin->middLeware();

        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $authAdmin->middLeware();

        $categoryAdmin->updateCategory();
        break;
    case 'category-delete':
        $authAdmin->middLeware();

        $categoryAdmin->deleteCategory();
        break;
    case 'coupon':
        $authAdmin->middLeware();

        $couponAdmin->index();
        break;
    case 'coupon-create':
        $authAdmin->middLeware();

        $couponAdmin->create();
        break;
    case 'coupon-edit':
        $authAdmin->middLeware();

        $couponAdmin->edit();
        break;
    case 'coupon-update':
        $authAdmin->middLeware();

        $couponAdmin->update();
        break;
    case 'coupon-delete':
        $authAdmin->middLeware();

        $couponAdmin->delete();
        break;



    // Client

    case 'order-list':
        $orderAdmin->list();
        break;
    case 'order-edit':
        $orderAdmin->edit();

        break;
    case 'order-update':
        $orderAdmin->update();

        break;



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
    case 'checkout':
        $order->index();
        break;
    case 'order':
        $order->checkout();
        break;
   
    case 'wishlist':
        $withList->index();
        break;
    case 'wishlist-add':
        $withList->add();
        break;
    case 'wishlist-delete':
        $withList->delete();
        break;
    case 'shop':
        $shop->index();
        break;

    case 'order-cl':
        $profile->indexOderClient();
        break;
    case 'trash-order':
        $profile->trashOrder();
        break;
    case 'cancel-order':
        $profile->cancelOrder();
       break;
    case 'checkout-complete':
        include '../views/client/checkout/checkoutComplete.php';
        break;


}

