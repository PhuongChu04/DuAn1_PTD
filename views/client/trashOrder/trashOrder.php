<?php include '../views/client/layout/header.php'; ?>
<main>
  <div class="mb-4 pb-4"></div>
  <div class="mb-4 pb-4"></div>
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h3 class="page-title d-flex justify-content-center">Theo dõi đơn hàng của bạn</h3>
    <div class="order-complete">
      <div class="order-complete__message">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="40" cy="40" r="40" fill="#B9A16B" />
          <path d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z" fill="white" />
        </svg>
        <h3>Đơn hàng của bạn đã được xác nhận</h3>
        <p>Cảm ơn. Bạn đã sử dụng dịch vụ.</p>
      </div>
      <div class="order-info">
        <div class="order-info__item">
          <label>Mã đơn hàng</label>
          <span>#<?= $getOrderDetail['order_detail_id'] ?></span>
        </div>
        <div class="order-info__item">
          <label>Ngày đặt hàng</label>
          <span><?= date('d/m/Y', strtotime($getOrderDetail['created_at'])) ?></span>
        </div>
        <div class="order-info__item">
          <label>Tổng tiền</label>
          <span><?= number_format(($getOrderDetail['amount'] - ($handleCoupon ?? 0) + $ship['shipping_price']) * 1000) ?>đ</span>
        </div>
        <div class="order-info__item">
          <label>Phương thức thanh toán</label>
          <span><?= $getOrderDetail['payment_method'] ?></span>
        </div>
      </div>
      <div class="checkout__totals-wrapper">
        <div class="checkout__totals">
          <h3>Chi Tiết Đơn Hàng</h3>
          <table class="checkout-cart-items">
            <thead>
              <tr>
                <th>Sản Phẩm</th>
                <th>Giá</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($getOrder as $order): ?>
                <tr>
                  <td>
                    <?= $order['product_name'] ?> x <?= $order['quantity'] ?>
                  </td>
                  <td>
                    <?= number_format($order['variant_sale_price'] * 1000) ?>đ
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <table class="checkout-totals">
            <tbody>
              <tr>
                <th>Tổng tiền sản phẩm</th>
                <td><?= number_format($getOrderDetail['amount'] * 1000) ?>đ</td>
              </tr>
              <tr>
                <th>Giảm giá</th>
                <td>-<?= number_format(($handleCoupon ?? 0) * 1000) ?>đ</td>
              </tr>
              <tr>
                <th>Phí vận chuyển</th>
                <td><?= $ship['shipping_name'] ?>: <?= number_format($ship['shipping_price'] * 1000) ?>đ</td>
              </tr>
              <tr>
                <th>Tổng tiền phải trả</th>
                <td><?= number_format(($getOrderDetail['amount'] - ($handleCoupon ?? 0) + $ship['shipping_price']) * 1000) ?>đ</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>
<?php include '../views/client/layout/footer.php'; ?>
