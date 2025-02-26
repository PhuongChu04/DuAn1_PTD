<?php include '../views/client/layout/header.php' ?>
<main>
  <div class="mb-4 pb-4"></div>
  <div class="mb-4 pb-4"></div>
  <section class="my-account container">
    <h2 class="page-title">Orders</h2>
    <div class="row">
      <div class="col-lg-3">
        <ul class="account-nav">
          <li><a href="account_dashboard.html" class="menu-link menu-link_us-s">Dashboard</a></li>
          <li><a href="?act=order-cl" class="menu-link menu-link_us-s menu-link_active">Orders</a></li>
          <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li>
          <li><a href="?act=profileDetail" class="menu-link menu-link_us-s">Account Details</a></li>
          <li><a href="account_wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
          <li><a href="login_register.html" class="menu-link menu-link_us-s">Logout</a></li>
        </ul>
      </div>
      <div class="col-lg-9">
        <div class="page-content my-account__orders-list">
          <table class="orders-table">
            <thead>
              <tr>
                <th>Mã Đơn Hàng</th>
                <th>Trạng Thái</th>
                <th>Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listOrder as $order): ?>
                <tr>
                  <td>#<?= $order['order_detail_id'] ?></td>
                  <td><?= $order['status'] ?></td>
                  <td>
                    <a href="?act=trash-order&order_detail_id=<?= $order['order_detail_id'] ?>" class="btn btn-light">View</a>
                    <?php if ($order['status'] == 'Đang chờ'): ?>
                      <a onclick="return confirm('Bạn muốn hủy đơn hàng ?')" href="?act=cancel-order&order_detail_id=<?= $order['order_detail_id'] ?>" class="btn btn-danger">Hủy</a>
                    <?php endif; ?>

                    
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include '../views/client/layout/footer.php' ?>
