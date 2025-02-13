<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">

        <div class="row d-none">
            <div class="col-lg-12">
                <div class="card bg-light-subtle">
                    <div class="card-header border-0">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <form class="app-search d-none d-md-block me-auto">
                                            <div class="position-relative">
                                                <input type="search" class="form-control" placeholder="Search Coupons and Code" autocomplete="off" value="">
                                                <iconify-icon icon="solar:magnifer-broken" class="search-widget-icon"></iconify-icon>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <h5 class="text-dark fw-medium mb-0">5,786 <span class="text-muted">Items</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-md-end mt-3 mt-md-0">
                                    <button type="button" class="btn btn-outline-secondary me-1"><i class="bx bx-cog me-1"></i>More Setting</button>
                                    <button type="button" class="btn btn-outline-secondary me-1"><i class="bx bx-filter-alt me-1"></i> Filters</button>
                                    <button type="button" class="btn btn-success me-1"><i class="bx bx-plus"></i> New Coupons</button>
                                </div>
                            </div><!-- end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">All Product List</h4>
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
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Tên mã giảm giá</th>
                                        <th>Giảm giá</th>
                                        <th>Mã giảm giá</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listCoupon as $coupon): ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>

                                            <td><?= $coupon['name'] ?></td>
                                            <?php if ($coupon['type'] == 'Percentage') : ?>
                                                <td><?= $coupon['coupon_value'] ?>%</td>
                                            <?php elseif ($coupon['type'] == 'Fixed Amount') : ?>
                                                <td><?= number_format($coupon['coupon_value']*1000, 0, ',', '.') ?>đ</td>
                                            <?php endif; ?>
                                            <td><?= $coupon['coupon_code'] ?></td>
                                            <td><?= $coupon['start_date'] ?></td>
                                            <td><?= $coupon['end_date'] ?></td>
                                            <?php if ($coupon['status'] == 'Active') : ?>
                                                <td>
                                                    <span class="badge text-success bg-success-subtle fs-12"><i class="bx bx-check-double"></i><?= $coupon['status'] ?></span>
                                                </td>
                                            <?php elseif ($coupon['status'] == 'Hidden') : ?>
                                                <td>
                                                    <span class="badge text-danger bg-danger-subtle fs-12"><i class="bx bx-x"></i><?= $coupon['status'] ?></span>
                                                </td>
                                            <?php elseif ($coupon['status'] == 'Futute Plan') : ?>
                                                <td>
                                                    <span class="badge text-success bg-warning-subtle fs-12"><i class="bx bx-check-double"></i><?= $coupon['status'] ?></span>
                                                </td>
                                            <?php endif; ?>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    
                                                    <a href="?act=coupon-edit&coupon_id=<?= $coupon['coupon_id']?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                    <a onclick="return confirm('Bạn chắc chắn xóa mã giảm giá này không?')" href="?act=coupon-delete&coupon_id=<?= $coupon['coupon_id']?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
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

    <?php include '../views/admin/layout/footer.php' ?>