<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

     <!-- Start Container -->
     <div class="container-xxl">

          <div class="row">
               <div class="col-xl-9 col-lg-8">
                    <div class="row">
                         <div class="col-lg-12">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                                             <div>
                                                  <h4 class="fw-medium text-dark d-flex align-items-center gap-2">
                                                       #<?= $getOrderDetail['order_detail_id'] ?> <span
                                                            class="badge bg-success-subtle text-success  px-2 py-1 fs-13"><?= $getOrderDetail['status'] ?></span><span
                                                            class="border border-warning text-warning fs-13 px-2 py-1 rounded">In
                                                            Progress</span></h4>
                                                  <p class="mb-0">Order / Order Details /
                                                       <?= $getOrderDetail['order_detail_id'] ?> -
                                                       <?= date('F d,Y \a\t  g:i:a', strtotime($getOrderDetail['created_id'])) ?>
                                                  </p>

                                             </div>
                                             <form action="?act=order-update&order_detail_id=<?=$getOrderDetail['order_detail_id']?>" method="post">
                                             <div>
                                                  <a href="#!" class="btn btn-outline-secondary">Refund</a>
                                                  <a href="#!" class="btn btn-outline-secondary">Return</a>
                                                  <select class="form-select" name="status" aria-label="Transection">
                                                       <option value="Pending" <?= $getOrderDetail['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                       <option value="Confirmed"
                                                            <?= $getOrderDetail['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                                       <option value="Shipped" <?= $getOrderDetail['status'] == 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                                       <option value="Delivered"
                                                            <?= $getOrderDetail['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                                       <option value="Canceled" <?= $getOrderDetail['status'] == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                                                  </select>

                                                  <button type="submit" name="updateOrder" class="btn btn-primary">Cập nhật đơn hàng</button>
                                             </div>
                                             </form>
                                        </div>



                                   </div>

                              </div>
                              <div class="card">
                                   <div class="card-header">
                                        <h4 class="card-title">Product</h4>
                                   </div>
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle border-bottom">
                                                       <tr>
                                                            <th>Tên sản phẩm và kích thước</th>

                                                            <th>Số lượng</th>
                                                            <th>Giá</th>

                                                            <th>Tổng tiền</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php foreach ($getOrder as $order): ?>
                                                            <tr>
                                                                 <td>
                                                                      <div class="d-flex align-items-center gap-2">
                                                                           <div
                                                                                class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                                <img src="assets/images/product/p-1.png"
                                                                                     alt="" class="avatar-md">
                                                                           </div>
                                                                           <div>
                                                                                <a href="#!"
                                                                                     class="text-dark fw-medium fs-15"><?= $order['product_name'] ?></a>
                                                                                <p class="text-muted mb-0 mt-1 fs-13">
                                                                                     <span>Size :
                                                                                     </span><?= $order['size_name'] ?>
                                                                                </p>
                                                                                <p class="text-muted mb-0 mt-1 fs-13">
                                                                                     <span>Màu :
                                                                                     </span><?= $order['color_name'] ?>
                                                                                </p>
                                                                           </div>
                                                                      </div>

                                                                 </td>


                                                                 <td> <?= $order['quantity'] ?></td>
                                                                 <td><?= number_format($order['variant_sale_price'] * 1000) ?>đ
                                                                 </td>

                                                                 <td>
                                                                      <?= number_format($order['variant_sale_price'] * $order['quantity'] * 1000) ?>đ
                                                                 </td>
                                                            </tr>




                                                       <?php endforeach; ?>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>


                         </div>
                    </div>
               </div>
               <div class="col-xl-3 col-lg-4">
                    <div class="card">
                         <div class="card-header">
                              <h4 class="card-title">Tóm tắt đơn hàng</h4>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table mb-0">
                                        <tbody>
                                             <tr>
                                                  <td class="px-0">
                                                       <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                                 icon="solar:clipboard-text-broken"></iconify-icon>Tổng
                                                            cộng
                                                       </p>
                                                  </td>
                                                  <td class="text-end text-dark fw-medium px-0">
                                                       <?= number_format(($getOrderDetail['amount']) * 1000) ?>đ</td>
                                             </tr>
                                             <tr>
                                                  <td class="px-0">
                                                       <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                                 icon="solar:ticket-broken"
                                                                 class="align-middle"></iconify-icon> Giảm giá: </p>
                                                  </td>
                                                  <td class="text-end text-dark fw-medium px-0">
                                                       <?= number_format($handleCoupon * 1000) ?>đ</td>
                                             </tr>
                                             <tr>
                                                  <td class="px-0">
                                                       <p class="d-flex mb-0 align-items-center gap-1"><iconify-icon
                                                                 icon="solar:kick-scooter-broken"
                                                                 class="align-middle"></iconify-icon> Phí giao hàng :
                                                       </p>
                                                  </td>
                                                  <td class="text-end text-dark fw-medium px-0">
                                                       <?= number_format(($getOrderDetail['amount'] - $handleCoupon + $ship['shipping_price']) * 1000) ?>đ
                                                  </td>
                                             </tr>


                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-between bg-light-subtle">
                              <div>
                                   <p class="fw-medium text-dark mb-0">Tổng số tiền</p>
                              </div>
                              <div>
                                   <p class="fw-medium text-dark mb-0">$737.00</p>
                              </div>

                         </div>
                    </div>



               </div>
          </div>
     </div>

</div>
<?php include '../views/admin/layout/footer.php' ?>