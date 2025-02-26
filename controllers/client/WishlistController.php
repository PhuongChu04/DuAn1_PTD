<?php
 require_once '../models/Wishlist.php';
class WithListController extends Wishlist{
    public function index(){

        $listWishList = $this->listWishList();
        include '../views/client/wishlist/wishlist.php';

    }
    public function add()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = 'Bạn cần đăng nhập trước khi chọn yêu thídch';
            header('Location:?act=register');
            exit();
        }
        $checkWishList =  $this->checkWishList();
        if ($checkWishList) {
            $_SESSION['error'] = 'Sản phẩm này đã co trong danh mục yêu thích của bạn';
            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
        $addWishList = $this->addWishList();
        if ($addWishList) {
            $_SESSION['success'] = "Thêm sản phẩm yêu thích thành công";
            header("Location:". $_SERVER['HTTP_REFERER']);
            exit();
        }else{
            $_SESSION['errors'] = "Thêm sản phẩm yêu thích không thành công";
            header("Location:". $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function delete(){
        try {
            $this->deleteWishList();
            $_SESSION['successs'] = 'Xóa sản phẩm yêu thích thành công';
            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Xóa sản phẩm yêu thích thất bại, Vui lòng thử lại';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}