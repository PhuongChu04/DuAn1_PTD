<?php

class ShopController{
    protected $product;
    protected $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index(){
        $category = $this->category->listCategory();
        $product = $this->product->listProduct();
        $result = $this->search();
        if (!empty($result)) {
            $product =$result;
        }
        include '../views/client/shop/shop.php';

    }

    public function search(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
            $result = $this->product->search($_POST['keyword']);
            $_SESSION['keyword'] = $_POST['keyword'];
            if ($result) {
               $_SESSION['success'] = "Kết quả tìm kiếm với từ khóa " . "" .$_POST['keyword'];
            }else{
                $_SESSION['error'] = "Không tìm thấy kết quả với từ khóa" . "" .$_POST['keyword'];
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            return $result;
        }
    }
}