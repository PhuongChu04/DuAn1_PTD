<?php include '../views/admin/layout/header.php' ?>

<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row">

            <form action="?act=product-update&&id=<?= $product['product_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="col-xl-9 col-lg-8 ">
                    <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm Ảnh Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <!-- File Upload -->
                            <?php foreach ($gallery as $value): ?>
                                <img src="./images/product_gallery/<?= $value['image'] ?>" alt="" width="100px">

                                <input type="file" hidden name="gallery_image[]" id="" class="form-control">

                            <?php endforeach; ?>
                            <input type="file" name="old_gallery_image[]" value="<?= $value['image'] ?>" id="" class="form-control">
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="product-name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" id="product-name" name="product_name[]" value="<?= $product['product_name'] ?>" onkeyup="ChangeToSlug()" class="form-control" placeholder="Nhập tên Sản phẩm">
                                    </div>
                                    <?php if (isset($_SESSION['errors']['product_name'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['product_name'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">

                                    <label for="product-categories" class="form-label">Danh mục</label>
                                    <select class="form-control" id="product-categories" data-choices data-choices-groups data-placeholder="Chọn danh mục">
                                        <?php foreach ($listCategory as $cate) : ?>

                                            <option value="<?= $cate['category_id'] ?>"
                                                <?= $product['category_id'] == $cate['category_id'] ? 'selected' : '' ?>><?= $cate['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>


                                </div>
                                <div class="col-lg-6">
                                    <div class="mb3">
                                        <label for="product-category" class="form-label">Ảnh sản phẩm</label>
                                        <img src="./images/product/<?= $product['product_image'] ?>" alt="" width="100px">
                                        <input type="file" hinden name="old_product_image[]" value="<?= $product['product_image'] ?>" id="" class="form-control">

                                    </div>
                                    <?php if (isset($_SESSION['errors']['product_image'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['product_image'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb3">
                                        <label for="product-category" class="form-label">Đường dẫn</label>
                                        <input type="text" name="product_slug[]" value="<?= $product['product_slug'] ?>" id="slug" class="form-control">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="product_price" class="form-label">Giá sản phẩm</label>
                                        <input type="text" id="product_price" name="product_price[]" value="<?= $product['product_price'] ?>" class="form-control" placeholder="Nhập giá Sản phẩm">
                                    </div>
                                    <?php if (isset($_SESSION['errors']['product_price'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['product_price'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="product_sale_price" class="form-label">Giá khuyến mại</label>
                                        <input type="text" id="product_sale_price" name="product_sale_price[]" value="<?= $product['product_sale_price'] ?>" class="form-control" placeholder="Nhập giá khuyến mãi">
                                    </div>

                                    <?php if (isset($_SESSION['errors']['product_sale_price'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['product_sale_price'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php foreach ($varianr as $key => $value): ?>
                                <div id="variants">
                                    <div class="row mb-4">
                                        <div class="col-lg-4">
                                            <div class="mt-3">
                                                <input type="hidden" name="product_variant_id[]" value="<?= $value['product_variant_id'] ?>">
                                                <h5 class="text-dark fw-medium">Kích thước :</h5>
                                                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                    <?php foreach ($ListSize as $size) : ?>
                                                        <input type="checkbox" class="btn-check" id="size-<?= $size['size_id'] ?>" value="<?= $size['size_id'] ?>" name="variant_size[]">
                                                        <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-<?= $size['size_id'] ?>"><?= $size['size_name'] ?></label>
                                                    <?php endforeach; ?>

                                                </div>

                                            </div>
                                            <?php if (isset($_SESSION['errors']['variant_size'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['variant_size'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mt-3">
                                                <h5 class="text-dark fw-medium">Màu :</h5>

                                                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                    <?php foreach ($ListColor as $color) : ?>
                                                        <input type="checkbox" class="btn-check" id="color-<?= $color['color_id'] ?>" value="<?= $color['color_id'] ?>" name="variant_color[]">
                                                        <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color['color_id'] ?>"> <i class="bx bxs-circle fs-18 " style="color:<?= $color['color_code'] ?>"></i></label>

                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                            <?php if (isset($_SESSION['errors']['variant_color'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['variant_color'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-3">


                                            <div class="mt-3">
                                                <label for="variant_quantity[]" class="form-label">Số lượng</label>
                                                <input type="text" id="variant_quantity[]" name="variant_quantity[]" value="<?= $value['variant_quantity'] ?>" class="form-control" placeholder="Nhập giá khuyến mãi">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['variant_quantity'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['variant_quantity'] ?></p>
                                            <?php endif; ?>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="variant_price[]" class="form-label">Giá biến thể</label>
                                                    <input type="text" id="variant_price[]" value="<?= $value['variant_price'] ?>" name="variant_price[]" class="form-control" placeholder="Nhập giá Sản phẩm">
                                                </div>
                                                <?php if (isset($_SESSION['errors']['variant_price'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['variant_price'] ?></p>
                                                <?php endif; ?>
                                                <div class="col-lg-6">


                                                    <div class="mb-3">
                                                        <label for="variant_sale_price[]" class="form-label">Giá khuyến mại biến thể</label>
                                                        <input type="text" id="variant_sale_price[]" value="<?= $value['variant_sale_price'] ?>" name="variant_sale_price[]" class="form-control" placeholder="Nhập giá khuyến mãi">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_sale_price'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['variant_sale_price'] ?></p>
                                                    <?php endif; ?>


                                                </div>

                                            </div>
                                            <div class="rounded">
                                                <div class="row justify-content-end g-2">
                                                    <div class="col-lg-2">
                                                        <putton type="button" id="add-variant" class="btn btn-primary w-100">Thêm biến thể</putton>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Mô tả</label>
                                                <textarea class="form-control bg-light-subtle" id="description" name="product_description[]" rows="7" placeholder="Nhập mô tả"></textarea>
                                            </div>
                                            <?php if (isset($_SESSION['errors']['product_description'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['product_description'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" name="update-product[]" class="btn btn-outline-secondary w-100">Cập nhật sản phẩm</button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="?act=product" class="btn btn-primary w-100">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('add-variant').addEventListener('click', function() {
            const container = document.getElementById('variants');
            const newVariant = document.createElement('div');
            // newVariant.classList.add('row','mb-4');
            newVariant.innerHTML = `
        <div class="row mb-4">
                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Kích thước :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                        <?php foreach ($ListSize as $size): ?>
                                          
                                        
                                    <input type="checkbox" class="btn-check" id="size-<?= $size['size_id'] ?>-${container.children.length}" value="<?= $size['size_id'] ?>" name="variant_size[]">
                                        <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-<?= $size['size_id'] ?>-${container.children.length}"><?= $size['size_name'] ?></label>
                                        <?php endforeach; ?>      
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mt-3">
                                    <h5 class="text-dark fw-medium">Màu :</h5>
                                    <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                    <?php foreach ($ListColor as $color): ?>
                                    <input type="checkbox" class="btn-check" id="color-<?= $color['color_id'] ?>-${container.children.length}" value="<?= $color['color_id'] ?>" name="variant_color[]">
                                        <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color['color_id'] ?>-${container.children.length}"> <i class="bx bxs-circle fs-18 " style="color:<?= $color['color_code'] ?>"></i></label>
                                        <?php endforeach; ?>   
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                         
                                
                         <div class="mt-3">
                                     <label for="variant_quantity[]" class="form-label">Số lượng</label>
                                     <input type="text" id="variant_quantity[]" name="variant_quantity[]" class="form-control" placeholder="Nhập giá khuyến mãi">
                                 </div>
                            
                            
                         </div>
                          
                            <div class="row">
                            <div class="col-lg-6">
                              
                              <div class="mb-3">
                                  <label for="variant_price[]" class="form-label">Giá biến thể</label>
                                  <input type="text" id="variant_price[]" name="variant_price[]" class="form-control" placeholder="Nhập giá Sản phẩm">
                              </div>
                            <div class="col-lg-6">
                         
                                
                             <div class="mb-3">
                                  <label for="variant_sale_price[]" class="form-label">Giá khuyến mại biến thể</label>
                                  <input type="text" id="variant_sale_price[]" name="variant_sale_price[]" class="form-control" placeholder="Nhập giá khuyến mãi">
                              </div>
                         
                         
                        </div>

        `;
            container.appendChild(newVariant);
        })
    </script>

</div>
<?php unset($_SESSION['errors']) ?>
<?php include '../views/admin/layout/footer.php' ?>