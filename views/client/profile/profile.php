<?php include '../views/client/layout/header.php' ?>
<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">My Account</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
            <li><a href="?act=profile" class="menu-link menu-link_us-s menu-link_active">Dashboard</a></li>
            <li><a href="?act=order-cl" class="menu-link menu-link_us-s">Orders</a></li>
            <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li>
            <li><a href="?act=profileDetail" class="menu-link menu-link_us-s">Account Details</a></li>
            <li><a href="account_wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
            <li><a href="?act=logout" class="menu-link menu-link_us-s">Logout</a></li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__dashboard">
            <p>Hello <strong><?= $_SESSION['user']['name'] ?></strong> (not <strong>alitfn58?</strong> <a href="login_register.html">Log out</a>)</p>
            <p>From your account dashboard you can view your <a class="unerline-link" href="account_orders.html">recent orders</a>, manage your <a class="unerline-link" href="account_edit_address.html">shipping and billing addresses</a>, and <a class="unerline-link" href="account_edit.html">edit your password and account details.</a></p>
          </div>
        </div>
      </div>
    </section>
  </main>


<?php
unset($_SESSION['errors']);
include '../views/client/layout/footer.php' ?>