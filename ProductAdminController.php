<?php
require_once '../models/Product.php';
class ProductAdminController extends Product
{
    public function index()
    {
        $listProduct = $this->listProduct();
        echo " pre";
        print_r($listProduct);
        include '../views/admin/product/list.php';
    }
    public function create()
    {
        $ListColor = $this->getAllColor();
        $ListSize = $this->getAllSize();
        $listCategory = $this->getAllCategory();
        include '../views/admin/product/create.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_products'])) {
            $errors = [];
            if (empty($_POST['product_name'])) {
                $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_price'])) {
                $errors['product_price'] = 'Vui lòng nhập giá';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mại';
            }
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $errors['image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            }
            if (!isset($_FILES['gallery_image']) || $_FILES['gallery_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['gallery_image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            }
            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui lòng nhập size';
            }
            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui lòng nhập màu';
            }
            if (empty($_POST['variant_quantity'])) {
                $errors['variant_quantity'] = 'Vui lòng nhập số lượng';
            }
            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui lòng nhập mô tả';
            }
            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:?act=product-create');
            }


            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                $addProduct = $this->addProduct($_POST['category_id'], $_POST['name'], $_POST['product_image'], $_POST['product_price'], $_POST['product_sale_price'], $_POST['product_slug'], $_POST['product_description']);
                if ($addProduct) {
                    $product_id = $this->getLastInsertId();
                    if (isset($_POST['variant_size']) && isset($_POST['variant_coler'])) {
                        foreach ($_POST['variant_size'] as $key => $size) {
                            $addProductVariant =
                                $this->addProductVariant($_POST['variant_price'][$key], $_POST['variant_sale_price'][$key], $_POST['variant_quantity'][$key], $product_id, $_POST['variant_color'][$key], $_POST['variant_size'][$key]);
                        }
                    }
                    if (!empty($_FILES['product_gallery']['name'][0])) {
                        $file = $_FILES['product_gallery'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $product_gallery = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                            move_uploaded_file($file['tmp_name'], './images/product_gallery/' . $product_gallery);
                            $this->addGallery($addProduct, $product_gallery);
                        }
                    }
                }
                $_SESSION['success'] = "Thêm sản phẩm thành công";
                header('location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = "Thêm sản phẩm không thành công";
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
    public function edit()
    {
        $product = $this->getProductById($_GET['id']);
        $variant = $this->getProductVariantById($_GET['id']);
        $gallery = $this->getProductGalleryById($_GET['id']);
        $listCategory = $this->getAllCategory();
        $ListColor = $this->getAllColor();
        $ListSize = $this->getAllSize();
        include '../views/admin/product/edit.php';
    }
    public function update()
    {

        $errors = [];
        if (empty($_POST['product_name'])) {
            $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
        }
        if (empty($_POST['product_price'])) {
            $errors['product_price'] = 'Vui lòng nhập giá';
        }
        if (empty($_POST['product_sale_price'])) {
            $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mại';
        }


        if (empty($_POST['variant_size'])) {
            $errors['variant_size'] = 'Vui lòng nhập size';
        }
        if (empty($_POST['variant_color'])) {
            $errors['variant_color'] = 'Vui lòng nhập màu';
        }
        if (empty($_POST['variant_quantity'])) {
            $errors['variant_quantity'] = 'Vui lòng nhập số lượng';
        }
        if (empty($_POST['product_description'])) {
            $errors['product_description'] = 'Vui lòng nhập mô tả';
        }
        $_SESSION['errors'] = $errors;
        if (count($errors) > 0) {
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-product'])) {
            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                    if (isset($_POST['old_product_image']) && file_exists('./images/product/' . $_POST['old_product_image'])) {
                        unlink('./images/product/' . $_POST['old_product_image']);
                    }
                }
            } else {
                $product_image = $_POST['old_product_image'];
            }
            $updateProduct = $this->updateProduct($_POST['category_id'], $_POST['name'], $_POST['product_image'], $_POST['product_price'], $_POST['product_sale_price'], $_POST['product_slug'], $_POST['product_description'], $_GET['id']);
            if ($updateProduct) {
                $product_id=$_POST['product_id'];
                if (isset($_POST['size']) && isset($_POST['color'])) {
                    foreach ($_POST['size'] as $key => $size) {
                        if (isset($_POST['product_variant_id'][$key]) && !empty($_POST['product_variant_id'][$key])) {
                            $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_color'][$key],
                                $size,
                                $_POST['variant_quantity'][$key],
                              $product_id
                            );
                        } else {
                            $addProductVariant = $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_color'][$key],
                                $_POST['variant_size'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id
                            );
                        }
                    }
                }
                if (!empty($_FILES['gallery_image']['name'][0])) {
                    $file = $_FILES['product_gallery'];
                    for ($i = 0; $i < count($file['name']); $i++) {
                        $fileName = basename($file['name'][$i]);
                        $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                        move_uploaded_file($file['tmp_name'], './images/product_gallery/' . $imageArray);
                        $this->addGallery($_GET['id'], $imageArray);
                    }
                } else {
                    $imageArray = $_POST['old_gallery_image'];
                }
                $_SESSION['success'] = "Cập nhật thành công";
                header('location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = "Cập nhật không thành công";
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
