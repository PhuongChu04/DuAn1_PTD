<?php include '../views/admin/layout/header.php'; ?>

<div class="page-content">
     <div class="container-fluid">
          <div class="row">
               <div class="col-xl-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between align-items-center gap-1">
                              <h4 class="card-title flex-grow-1">Danh Sách Sản Phẩm</h4>
                              <a href="index.php?act=product-create" class="btn btn-sm btn-primary">Thêm Mới Sản Phẩm</a>
                              <div class="dropdown">
                                   <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">This Month</a>
                                   <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#!" class="dropdown-item">Download</a>
                                        <a href="#!" class="dropdown-item">Export</a>
                                        <a href="#!" class="dropdown-item">Import</a>
                                   </div>
                              </div>
                         </div>
                         <div class="table-responsive">
                              <table class="table align-middle mb-0 table-hover table-centered">
                                   <thead class="bg-light-subtle">
                                        <tr>
                                             <th style="width: 20px;">
                                                  <div class="form-check ms-1">
                                                       <input type="checkbox" class="form-check-input" id="selectAll">
                                                       <label class="form-check-label" for="selectAll"></label>
                                                  </div>
                                             </th>
                                             <th>Tên sản phẩm và biến thể</th>
                                             <th>Giá sản phẩm</th>
                                             <th>Giá Khuyến mãi</th>
                                             <th>Số lượng</th>
                                             <th>Danh mục</th>
                                             <th>Hành động</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($listProduct as $product): ?>
                                             <tr>
                                                  <td>
                                                       <div class="form-check ms-1">
                                                            <input type="checkbox" class="form-check-input" id="productCheck_<?= $product['product_id'] ?>">
                                                            <label class="form-check-label" for="productCheck_<?= $product['product_id'] ?>"></label>
                                                       </div>
                                                  </td>
                                                  <td>
                                                       <div class="d-flex align-items-center gap-2">
                                                            <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                 <img src="./images/product/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>" class="avatar-md">
                                                            </div>
                                                            <div>
                                                                 <a href="#!" class="text-dark fw-medium fs-15"><?= $product['product_name'] ?></a>
                                                                 <p class="text-muted mb-0 mt-1 fs-13">
                                                                      <span>Size: </span>
                                                                      <?= implode(', ', array_column($product['variants'], 'product_variant_size')) ?>
                                                                 </p>
                                                                 <p class="text-muted mb-0 mt-1 fs-13">
                                                                      <span>Color: </span>
                                                                      <?= implode(', ', array_column($product['variants'], 'product_variant_color')) ?>
                                                                 </p>
                                                            </div>
                                                       </div>
                                                  </td>
                                                  <td><?= $product['product_price'] ?></td>
                                                  <td><?= $product['product_sale_price'] ?></td>
                                                  <td> <?php foreach ($product['variants'] as $variant): ?>
                                                            <span><?= $variant['product_variant_quantity'] ?></span>
                                                       <?php endforeach; ?>
                                                  </td>
                                                  <td><?= $product['category_name'] ?></td>
                                                  <td>
                                                       <div class="d-flex gap-2">
                                                            <a href="" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                            <a href="?act=product-edit&id=<?= $product['product_id'] ?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                            <a onclick="return confirm('Bạn chắn chắn muốn xóa k?')" href="?act=product-delete&id=<?= $product['product_id'] ?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       </div>
                                                  </td>
                                             </tr>
                                        <?php endforeach; ?>
                                   </tbody>
                              </table>
                         </div>
                         <div class="card-footer border-top">
                              <nav aria-label="Page navigation">
                                   <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                   </ul>
                              </nav>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php include '../views/admin/layout/footer.php'; ?>