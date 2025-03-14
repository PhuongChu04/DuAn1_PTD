<?php include '../views/admin/layout/header.php' ?>
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-xxl">
        <form action="?act=coupon-update&coupon_id=<?= $coupon['coupon_id'] ?>" method="POST">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div>
                            <h4 class="card-title  mt-2">Trạng thái mã giảm giá</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="Hidden" <?= $coupon['status'] == 'Hidden' ? 'checked' : '' ?> id="flexRadioDefault9" checked="">
                                            <label class="form-check-label" for="flexRadioDefault9">
                                                Đã hết hạn
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Active" <?= $coupon['status'] == 'Active' ? 'checked' : '' ?> id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                            Đang hoạt động
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Futute Plan" <?= $coupon['status'] == 'Futute Plan' ? 'checked' : '' ?> id="flexRadioDefault11">
                                        <label class="form-check-label" for="flexRadioDefault11">
                                            Kế hoạch tương lai
                                        </label>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lịch trình</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label  class="form-label text-dark">Ngày bắt đầu</label>
                                <input type="date" id="start-date" class="form-control flatpickr-input active" value="<?=$coupon['start_date'] ?>" name="start_date" placeholder="dd-mm-yyyy">
                            </div>
                            <?php if (isset($_SESSION['errors']['start_date'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['start_date'] ?></p>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="end-date" class="form-label text-dark">Ngày kết thúc</label>
                                <input type="date" id="end-date" class="form-control flatpickr-input active"  value="<?=$coupon['end_date'] ?>" name="end_date" placeholder="dd-mm-yyyy" >
                            </div>
                            <?php if (isset($_SESSION['errors']['end_date'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['end_date'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card">
                            <div>
                                <h4 class="card-title  mt-2  ">Thông tin mã giảm giá</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="coupons-code" class="form-label">Tên mã giảm giá</label>
                                            <input type="text" id="coupons-code" name="name" value="<?=$coupon['name'] ?>"  class="form-control" placeholder="Code enter">
                                        </div>
                                        <?php if (isset($_SESSION['errors']['name'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="coupons-code" class="form-label">Mã giảm giá</label>
                                            <input type="text" id="coupons-code" name="coupon_code" class="form-control" value="<?=$coupon['coupon_code'] ?>" placeholder="Code enter">
                                        </div>
                                        <?php if (isset($_SESSION['errors']['coupon_code'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['coupon_code'] ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="coupons-limits" class="form-label">Số lượng</label>
                                            <input type="number" id="coupons-limits" name="quantity" class="form-control" value="<?=$coupon['quantity'] ?>" placeholder="Số lượng mã giảm giá">
                                        </div>
                                        <?php if (isset($_SESSION['errors']['quantity'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['quantity'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <h4 class="card-title mb-3 mt-2">Các loại phiếu giảm giá</h4>
                                <div class="row mb-3">
                                    <!-- <div class="col-lg-4">
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" value="Free Shipping" id="flexRadioDefault12" checked="">
                                                <label class="form-check-label" for="flexRadioDefault12">
                                                    Miễn phí vận chuyển
                                                </label>
                                            </div>

                                        </div>
                                    </div> -->
                                    <div class="col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" value="Percentage" <?= $coupon['type'] == 'Percentage' ? 'checked' : '' ?> id="flexRadioDefault13">
                                            <label class="form-check-label" for="flexRadioDefault13">
                                                Giảm phần trăm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" value="Fixed Amount" <?= $coupon['type'] == 'Fixed Amount' ? 'checked' : '' ?>  id="flexRadioDefault14">
                                            <label class="form-check-label" for="flexRadioDefault14">
                                                Số tiền cố định
                                            </label>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['errors']['type'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['type'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <label for="discount-value" class="form-label">Giá trị giảm</label>
                                            <input type="text" id="discount-value" name="coupon_value" class="form-control" value="<?=$coupon['coupon_value'] ?>" placeholder="Nhập giá trị giảm">
                                        </div>
                                        <?php if (isset($_SESSION['errors']['coupon_value'])) : ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['coupon_value'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top">
                                <button type="submit" name="coupon-update" class="btn btn-primary">Cập nhật mã giảm giá</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <?php
        unset($_SESSION['errors']);
        include '../views/admin/layout/footer.php' ?>