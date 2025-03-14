<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from techzaa.in/larkon/admin/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 15:42:45 GMT -->

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Sign In | Larkon - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="admin/assets_admin/images/favicon.ico">

    <!-- Vendor css (Require in all Page) -->
    <link href="admin/assets_admin/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="admin/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="admin/assets_admin/css/app.min.css" rel="stylesheet" type="text/css" />



    <!-- Theme Config js (Require in all Page) -->
    <script src="admin/assets_admin/js/config.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Toastr CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="h-100">
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
            toastr.warning('{$_SESSION['error']}');
        </script>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
            toastr.success('{$_SESSION['success']}');
        </script>";
        unset($_SESSION['success']);
    }
    ?>
    <div class="d-flex flex-column h-100 p-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="row h-100">
                <div class="col-xxl-7">
                    <div class="row justify-content-center h-100">
                        <div class="col-lg-6 py-lg-5">
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div class="auth-logo mb-4">
                                    <a href="index.html" class="logo-dark">
                                        <img src="admin/assets_admin/images/logo-dark.png" height="24" alt="logo dark">
                                    </a>

                                    <a href="index.html" class="logo-light">
                                        <img src="admin/assets_admin/images/logo-light.png" height="24" alt="logo light">
                                    </a>
                                </div>

                                <h2 class="fw-bold fs-24">Sign In</h2>

                                <p class="text-muted mt-1 mb-4">Enter your email address and password to access admin panel.</p>

                                <div class="mb-5">
                                    <form action="?act=auth" method="POST" class="authentication-form">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control bg-" placeholder="Vui lòng nhập email">
                                            <?php if (isset($_SESSION['errors']['email'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <a href="auth-password.html" class="float-end text-muted text-unline-dashed ms-1">Reset password</a>
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Vui lòng nhập mật khẩu">
                                            <?php if (isset($_SESSION['errors']['password'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="mb-1 text-center d-grid">
                                            <button class="btn btn-soft-primary" type="submit" name="auth">Sign In</button>
                                        </div>
                                    </form>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-5 d-none d-xxl-flex">
                    <div class="card h-100 mb-0 overflow-hidden">
                        <div class="d-flex flex-column h-100">
                            <img src="admin/assets_admin/images/small/img-10.jpg" alt="" class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="assets/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="assets/js/app.js"></script>
<?php unset($_SESSION['errors']); ?>
</body>


<!-- Mirrored from techzaa.in/larkon/admin/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jan 2025 15:42:45 GMT -->

</html>