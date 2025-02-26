<?php include '../views/admin/layout/header.php' ?>

<div class="page-content">
    
    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row">
            <form action="index.php?act=category-edit&id=<?= $getCategory['category_id']?>" method="post" enctype="multipart/form-data">
                <div class="col-xl-9 col-lg-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm ảnh danh mục</h4>
                        </div>
                        <div class="card-body">
                            <!-- File Upload -->
                             <img src="./images/category/<?=$getCategory['image']?>" width="200px"  alt="" class="mb-3">   
                            <input type="file" name="image" id="image" class="form-control">    
                            <input type="hidden" name="old_image" value="<?=$getCategory['image']?>">
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm danh mục</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="meta-title" class="form-label">Tên danh mục</label>
                                        <input type="text" id="meta-title" class="form-control" name="name" value="<?=$getCategory['name']?>" placeholder="Nhập tên danh mục">
                                    </div>
                                    <?php if (isset($_SESSION['errors']['name'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label for="meta-title" class="form-label">Trạng thái</label>
                                    <select class="form-control" id="crater" name="status" data-choices data-choices-groups data-placeholder="Chọn trạng thái">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="Hidden"<?=$getCategory['status'] == 'Hidden' ? 'selected': ''?>>Ẩn</option>
                                        <option value="Active"<?=$getCategory['status'] == 'Active' ? 'selected': ''?>>Hiện</option>
                                    </select>
                                    <?php if (isset($_SESSION['errors']['status'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="description" class="form-label">Mô tả </label>
                                        <textarea class="form-control bg-light-subtle" name="description" id="description" rows="4" placeholder="Nhập mô tả"><?=$getCategory['name']?></textarea>
                                    </div>
                                    <?php if (isset($_SESSION['errors']['description'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" name="updateCategory" class="btn btn-outline-secondary w-100">Cập nhật</button>
                            </div>
                            <div class="col-lg-2">
                                <a href="index.php?act=category" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


</div>
<?php include '../views/admin/layout/footer.php' ?>