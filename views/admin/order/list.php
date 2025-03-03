<?php include '../views/admin/layout/header.php' ?>


<div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">

     <!-- <div class="row">
          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Payment Refund</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">490</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:chat-round-money-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Order Cancel</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">241</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:cart-cross-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Order Shipped</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">630</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:box-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Order Delivering</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">170</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:tram-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Pending Review</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">210</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:clipboard-remove-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Pending Payment</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">608</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:clock-circle-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">Delivered</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">200</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:clipboard-check-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-md-6 col-xl-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2">In Progress</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">656</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:inbox-line-broken" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div> -->

     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                         <div>
                              <h4 class="card-title">All Order List</h4>
                         </div>
                         <div class="dropdown">
                              <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                   This Month
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                   <!-- item-->
                                   <a href="#!" class="dropdown-item">Download</a>
                                   <!-- item-->
                                   <a href="#!" class="dropdown-item">Export</a>
                                   <!-- item-->
                                   <a href="#!" class="dropdown-item">Import</a>
                              </div>
                         </div>
                    </div>
                    <div class="card-body p-0">
                         <div class="table-responsive">
                              <table class="table align-middle mb-0 table-hover table-centered">
                                   <thead class="bg-light-subtle">
                                        <tr>
                                             <th>Mã đơn hàng</th>
                                             <th>Ngày mua</th>
                                             <th>Khách hàng</th>
                                    
                                             <th>Tổng tiền</th>
                                             
                                          
                                             <th>Trạng thái đơn hàng</th>
                                             <th>Hàng động</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach($listOrder as $order): ?>
                                        <tr>
                                             <td>
                                               #<?= $order['order_detail_id'] ?>
                                             </td>
                                             <td><?=date('M d Y',strtotime($order['created_at']))?></td>
                                             <td>
                                                  <a href="#!" class="link-primary fw-medium"><?=$order['name']?></a>
                                             </td>
                                            
                                             <td> <?=number_format($order['amount']*1000)?></td  >
                                             
                                             <td> <span class="badge border border-secondary text-secondary  px-2 py-1 fs-13"><?=$order['status']?></span></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="?act=order-edit&order_detail_id=<?= $order['order_detail_id'] ?>" class="btn btn-success"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="?act=order-edit&order_detail_id=<?= $order['order_detail_id'] ?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    
                                                  </div>
                                             </td>
                                        </tr>

                                        <?php endforeach; ?>

                                   </tbody>
                              </table>
                         </div>
                         <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                         <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                   <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                              </ul>
                         </nav>
                    </div>
               </div>
          </div>

     </div>

</div>
<!-- End Container Fluid -->

<!-- ========== Footer Start ========== -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>document.write(new Date().getFullYear())</script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                    href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">PTD</a>
            </div>
        </div>
    </div>
</footer>
<!-- ========== Footer End ========== -->

</div>
<?php include '../views/admin/layout/footer.php' ?>