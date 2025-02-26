<<<<<<< HEAD
<?php
require_once '../models/Product.php';
class ProductAdminController extends Product
{
    public function index()
    {
        $listProduct = $this->listProduct();
        // echo '<pre>';
        // print_r($listProduct);
        // echo '<pre>';
        include '../views/admin/product/list.php';
    }
    public function create()
    {
        $ListColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        $listCategorys = $this->getAllCategory();
       
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
                $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['product_image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            }
            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui lòng chọn kích thước';
            }
            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui lòng chọn màu';
            }
            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui lòng nhập mô tả';
            }
            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }
            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:?act=product-create');
                exit;
            }


            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if (!move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                $_SESSION['error'] = 'Không thể tải lên file ảnh sản phẩm.';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            }


            $addProduct = $this->addProduct(
                $_POST['category_id'],
                $_POST['product_name'],
                $product_image,
                $_POST['product_price'],
                $_POST['product_sale_price'],
                $_POST['product_slug'],
                $_POST['product_description']
            );


            if ($addProduct) {
                $product_id = $this->getLastInsertId();
                foreach ($_POST['variant_size'] as $key => $size) {
                    $addProductVariant = $this->addProductVariant(
                        $_POST['variant_price'][$key],
                        $_POST['variant_sale_price'][$key],
                        $_POST['variant_quantity'][$key],
                        $product_id,
                        $_POST['variant_color'][$key],
                        $size
                    );
                }

                if (!empty($_FILES['gallery_image']['name'][0])) {
                    $galleryFiles = $_FILES['gallery_image'];
                    for ($i = 0; $i < count($galleryFiles['name']); $i++) {
                        $fileName = basename($galleryFiles['name'][$i]);
                        $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                        move_uploaded_file($galleryFiles['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                        $this->addGallery($product_id, $imageArray);
                    }
                }
            }
            $_SESSION['success'] = 'Thêm sản phẩm thành công';
            header('Location:?act=product');
            exit();
        } else {
            $_SESSION['error'] = 'Thêm sản phẩm không thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function edit()
    {
        $product = $this->getProductById($_GET['id']);
        $variants = $this->getProductVariantById($_GET['id']);
        $gallery = $this->getProductGalleryById($_GET['id']);
        $listCategorys = $this->getAllCategory();
        $ListColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        include '../views/admin/product/edit.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {

            $errors = [];
            if (empty($_POST['product_name'])) {
                $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_price'])) {
                $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui lòng chọn kích thước';
            }
            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui lòng chọn màu';
            }
            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui lòng nhập mô tả';
            }
            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }

            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                    // Nếu có ảnh mới, xóa ảnh cũ
                    if (isset($_POST['old_product_image']) && file_exists('./images/product/' . $_POST['old_product_image'])) {
                        unlink('./images/product/' . $_POST['old_product_image']);
                    }
                }
            } else {
                // Nếu không có ảnh mới, giữ ảnh cũ
                $product_image = $_POST['old_product_image'];
            }

            // Cập nhật thông tin sản phẩm
            $updateProduct = $this->updateProduct(
                $_POST['product_id'],
                $_POST['category_id'],
                $_POST['product_name'],
                $product_image,
                $_POST['product_price'],
                $_POST['product_sale_price'],
                $_POST['product_slug'],
                $_POST['product_description']
            );

            if ($updateProduct) {
                $product_id = $_POST['product_id'];

                // Cập nhật biến thể sản phẩm
                if (isset($_POST['variant_size']) && isset($_POST['variant_size'])) {
                    foreach ($_POST['variant_size'] as $key => $size) {
                        if (isset($_POST['product_variant_id'][$key]) && !empty($_POST['product_variant_id'][$key])) {
                            // Cập nhật biến thể
                            $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $size
                            );
                        } else {
                            // Thêm biến thể mới
                            $addProductVariant = $this->addProductVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $_POST['variant_size'][$key]
                            );
                        }
                    }
                }

                // Cập nhật thư viện ảnh (nếu có)
                if (!empty($_FILES['gallery_image']['name'][0])) {
                    if (!empty($_FILES['gallery_image']['name'][0])) {
                        $file = $_FILES['gallery_image'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                            move_uploaded_file($file['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                            $this->addGallery($product_id, $imageArray);
                        }
                    }
                } else {
                    $imageArray = $_POST['old_gallery_image'];
                }

                $_SESSION['success'] = 'Cập nhật thành công';
                header('Location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật không thành công. Vui lòng thử lại.';
                header('Location:' . $_SERVER['HTTP_REFERER']);-
                exit();
            }
        }
    }

    public function deleteGallery()
    {
        try {
            $gallery = $this->getGallery();

            if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                unlink('./images/product_gallery/' . $gallery['image']);
            }
            $this->removeGallery();
            $_SESSION['success'] = 'Xóa ảnh khỏi kho lưu trữ thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteProductVariant()
    {
        try {
            $this->removeProductVariant();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteProduct()
    {
        try {
            $galleries = $this->getProductGalleryById();
            foreach ($galleries as $gallery) {
                if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                    unlink('./images/product_gallery/' . $gallery['image']);
                }
            }   
            $this->removeProduct();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
=======
<?php
require_once '../models/Product.php';
class ProductAdminController extends Product
{
    public function index()
    {
        $listProduct = $this->listProduct();
        // echo '<pre>';
        // print_r($listProduct);
        // echo '<pre>';
        include '../views/admin/product/list.php';
    }
    public function create()
    {
        $ListColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        $listCategorys = $this->getAllCategory();
       
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
                $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['product_image'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            }
            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui lòng chọn kích thước';
            }
            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui lòng chọn màu';
            }
            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui lòng nhập mô tả';
            }
            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }
            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:?act=product-create');
                exit;
            }


            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if (!move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                $_SESSION['error'] = 'Không thể tải lên file ảnh sản phẩm.';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
            }


            $addProduct = $this->addProduct(
                $_POST['category_id'],
                $_POST['product_name'],
                $product_image,
                $_POST['product_price'],
                $_POST['product_sale_price'],
                $_POST['product_slug'],
                $_POST['product_description']
            );


            if ($addProduct) {
                $product_id = $this->getLastInsertId();
                foreach ($_POST['variant_size'] as $key => $size) {
                    $addProductVariant = $this->addProductVariant(
                        $_POST['variant_price'][$key],
                        $_POST['variant_sale_price'][$key],
                        $_POST['variant_quantity'][$key],
                        $product_id,
                        $_POST['variant_color'][$key],
                        $size
                    );
                }

                if (!empty($_FILES['gallery_image']['name'][0])) {
                    $galleryFiles = $_FILES['gallery_image'];
                    for ($i = 0; $i < count($galleryFiles['name']); $i++) {
                        $fileName = basename($galleryFiles['name'][$i]);
                        $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                        move_uploaded_file($galleryFiles['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                        $this->addGallery($product_id, $imageArray);
                    }
                }
            }
            $_SESSION['success'] = 'Thêm sản phẩm thành công';
            header('Location:?act=product');
            exit();
        } else {
            $_SESSION['error'] = 'Thêm sản phẩm không thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function edit()
    {
        $product = $this->getProductById($_GET['id']);
        $variants = $this->getProductVariantById($_GET['id']);
        $gallery = $this->getProductGalleryById($_GET['id']);
        $listCategorys = $this->getAllCategory();
        $ListColors = $this->getAllColor();
        $listSizes = $this->getAllSize();
        include '../views/admin/product/edit.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {

            $errors = [];
            if (empty($_POST['product_name'])) {
                $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_price'])) {
                $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($_POST['product_sale_price'])) {
                $errors['product_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['variant_size'])) {
                $errors['variant_size'] = 'Vui lòng chọn kích thước';
            }
            if (empty($_POST['variant_color'])) {
                $errors['variant_color'] = 'Vui lòng chọn màu';
            }
            if (empty($_POST['product_description'])) {
                $errors['product_description'] = 'Vui lòng nhập mô tả';
            }
            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }

            $_SESSION['errors'] = $errors;
            if ($errors) {
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $file = $_FILES['product_image'];
            $product_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $product_image)) {
                    // Nếu có ảnh mới, xóa ảnh cũ
                    if (isset($_POST['old_product_image']) && file_exists('./images/product/' . $_POST['old_product_image'])) {
                        unlink('./images/product/' . $_POST['old_product_image']);
                    }
                }
            } else {
                // Nếu không có ảnh mới, giữ ảnh cũ
                $product_image = $_POST['old_product_image'];
            }

            // Cập nhật thông tin sản phẩm
            $updateProduct = $this->updateProduct(
                $_POST['product_id'],
                $_POST['category_id'],
                $_POST['product_name'],
                $product_image,
                $_POST['product_price'],
                $_POST['product_sale_price'],
                $_POST['product_slug'],
                $_POST['product_description']
            );

            if ($updateProduct) {
                $product_id = $_POST['product_id'];

                // Cập nhật biến thể sản phẩm
                if (isset($_POST['variant_size']) && isset($_POST['variant_size'])) {
                    foreach ($_POST['variant_size'] as $key => $size) {
                        if (isset($_POST['product_variant_id'][$key]) && !empty($_POST['product_variant_id'][$key])) {
                            // Cập nhật biến thể
                            $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $size
                            );
                        } else {
                            // Thêm biến thể mới
                            $addProductVariant = $this->addProductVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $_POST['variant_color'][$key],
                                $_POST['variant_size'][$key]
                            );
                        }
                    }
                }

                // Cập nhật thư viện ảnh (nếu có)
                if (!empty($_FILES['gallery_image']['name'][0])) {
                    if (!empty($_FILES['gallery_image']['name'][0])) {
                        $file = $_FILES['gallery_image'];
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $fileName = basename($file['name'][$i]);
                            $imageArray = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                            move_uploaded_file($file['tmp_name'][$i], "./images/product_gallery/" . $imageArray);
                            $this->addGallery($product_id, $imageArray);
                        }
                    }
                } else {
                    $imageArray = $_POST['old_gallery_image'];
                }

                $_SESSION['success'] = 'Cập nhật thành công';
                header('Location:?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật không thành công. Vui lòng thử lại.';
                header('Location:' . $_SERVER['HTTP_REFERER']);-
                exit();
            }
        }
    }

    public function deleteGallery()
    {
        try {
            $gallery = $this->getGallery();

            if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                unlink('./images/product_gallery/' . $gallery['image']);
            }
            $this->removeGallery();
            $_SESSION['success'] = 'Xóa ảnh khỏi kho lưu trữ thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteProductVariant()
    {
        try {
            $this->removeProductVariant();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteProduct()
    {
        try {
            $galleries = $this->getProductGalleryById();
            foreach ($galleries as $gallery) {
                if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                    unlink('./images/product_gallery/' . $gallery['image']);
                }
            }   
            $this->removeProduct();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
>>>>>>> dungvtph48187
}