<?php include '../views/client/layout/header.php' ?>
<main>
  <div class="mb-md-1 pb-md-3"></div>
  <div class="mb-md-1 pb-md-3"></div>
  <div class="mb-md-1 pb-md-3"></div>
  <div class="mb-md-1 pb-md-3"></div>
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h2 class="page-title">Cart</h2>
    <div class="checkout-steps">
      <a href="shop_cart.html" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
          <span>Mua hàng</span>
          <em>Quản lý sản phẩm đặt</em>
        </span>
      </a>
      <a href="shop_checkout.html" class="checkout-steps__item">
        <span class="checkout-steps__item-number">02</span>
        <span class="checkout-steps__item-title">
          <span>Vận chuyển và Thanh toán</span>
          <em>Kiểm tra danh sách các mặt hàng của bạn</em>
        </span>
      </a>
      <a href="shop_order_complete.html" class="checkout-steps__item">
        <span class="checkout-steps__item-number">03</span>
        <span class="checkout-steps__item-title">
          <span>Xác nhận đặt hàng</span>
          <em>Xem lại và gửi đơn hàng của bạn</em>
        </span>
      </a>
    </div>
    <div class="shopping-cart">
      <form class="cart-table__wrapper" action="?act=update-cart" method="post">
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Thông tin sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giá khuyến mãi</th>
                <th>Quantity</th>
                <th>Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($carts as $cart) : ?>
                <tr>
                  <td>
                    <div class="shopping-cart__product-item">
                      <a href="product1_simple.html">
                        <img loading="lazy" src="./images/product/<?= $cart['product_image'] ?>" width="120" height="120" alt="">
                      </a>
                    </div>
                  </td>
                  <td>
                    <div class="shopping-cart__product-item__detail">
                      <h4><a href="product1_simple.html"><?= $cart['product_name'] ?></a></h4>
                      <ul class="shopping-cart__product-item__options">
                        <li>Màu : <?= $cart['variant_color_name'] ?></li>
                        <li>Kích thước : <?= $cart['variant_size_name'] ?></li>
                      </ul>
                    </div>
                  </td>
                  <td>
                    <span class="shopping-cart__product-price"><?= number_format($cart['product_variant_price'] * 1000, 0, ',', '.') ?>đ</span>
                  </td>
                  <td>
                    <span class="shopping-cart__product-p rice"><?= number_format($cart['product_variant_sale_price'] * 1000, 0, ',', '.') ?>đ</span>
                  </td>
                  <td>
                    <div class="qty-control position-relative">
                      <input type="number" name="quantity[<?= $cart['cart_id'] ?>]" value="<?= $cart['quantity'] ?>" min="1" class="qty-control__number text-center">
                      <div class="qty-control__reduce">-</div>
                      <div class="qty-control__increase">+</div>
                    </div><!-- .qty-control -->
                  </td>
                  <td>
                    <span class="shopping-cart__subtotal"><?= number_format($cart['product_variant_sale_price'] * $cart['quantity']  * 1000, 0, ',', '.') ?>đ</span>
                  </td>
                  <td>
                    <a href="?act=delete-cart&cart_id=<?= $cart['cart_id'] ?>" onclick="return confirm('Bạn có chắc xóa sản phẩm khỏi giỏ hàng không?') ">
                      <span>x Xóa</span>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="cart-table-footer">
            <div class="position-relative bg-body">
              <input class="form-control" type="text" name="coupon_code" placeholder="Nhập mã giảm giá">
              <button class="btn-light fw-medium position-absolute top-0 end-0 h-100 px-4" name="apply_coupon" type="submit">Áp dụng</button>

            </div>
            <button type="submit" name="update_cart" class="btn btn-dark">Cập nhật giỏ</button>
          </div>
        </div>
      </form>
      <div class="shopping-cart__totals-wrapper">
        <div class="sticky-content">
          <div class="shopping-cart__totals">
            <h3>Tổng số giỏ hàng</h3>
            <table class="cart-totals">
              <tbody>

                <tr>
                  <th>Tổng cộng</th>
                  <td><?= number_format($sum * 1000, 0, ',', '.') ?>đ</td>
                </tr>
                <tr>
                  <th>Tiền giảm giá:</th>
                  <td>-<?= number_format($_SESSION['totalCoupon'] * 1000, 0, ',', '.') ?>đ</td>
                </tr>

                <tr>
                  <th>Tổng cộng</th>
                  <td><?= number_format(($sum - ($_SESSION['totalCoupon'] ?? 0)) * 1000, 0, ',', '.') ?>đ</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="cart-table__header">
            <a href="?act=checkout" class=" btn btn-dark  "> Đặt hàng</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<br>
<?php include '../views/client/layout/footer.php' ?>