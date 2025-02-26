<?php include '../views/client/layout/header.php' ?>
<main>
  <div class="mb-4 pb-4"></div>
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h2 class="page-title">Shipping and Checkout</h2>
    <div class="checkout-steps">
      <a href="shop_cart.html" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
          <span>Shopping Bag</span>
          <em>Manage Your Items List</em>
        </span>
      </a>
      <a href="shop_checkout.html" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">02</span>
        <span class="checkout-steps__item-title">
          <span>Shipping and Checkout</span>
          <em>Checkout Your Items List</em>
        </span>
      </a>
      <a href="shop_order_complete.html" class="checkout-steps__item">
        <span class="checkout-steps__item-number">03</span>
        <span class="checkout-steps__item-title">
          <span>Confirmation</span>
          <em>Review And Submit Your Order</em>
        </span>
      </a>
    </div>

    <form action="?act=order" method="post">
      <div class="checkout-form">
        <div class="billing-info__wrapper">
          <h4>BILLING DETAILS</h4>
          <div class="row">
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" placeholder="First Name">
                <label for="checkout_first_name"> Name</label>
              </div>
              <?php if (isset($_SESSION['errors']['name'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['name']  ?></p>
              <?php endif; ?>
            </div>

            <div class="col-md-12">
              <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>" placeholder="Street Address *">
                <label for="checkout_company_name">Street Address *</label>
              </div>
              <?php if (isset($_SESSION['errors']['address'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['address']  ?></p>
              <?php endif; ?>
            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>" placeholder="Phone *">
                <label for="checkout_phone">Phone *</label>
              </div>
              <?php if (isset($_SESSION['errors']['phone'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['phone']  ?></p>
              <?php endif; ?>
            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Your Mail *">
                <label for="checkout_email">Your Mail *</label>
              </div>
              <?php if (isset($_SESSION['errors']['email'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['email']  ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mt-3">
              <textarea class="form-control form-control_gray" name="note" placeholder="Order Notes (optional)" cols="30" rows="8"></textarea>
            </div>
          </div>
        </div>
        <div class="checkout__totals-wrapper">
          <div class="sticky-content">
            <div class="checkout__totals">
              <h3>Your Order</h3>
              <table class="checkout-cart-items">
                <thead>
                  <tr>
                    <th>PRODUCT</th>
                    <th>SUBTOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($carts as $cart) : ?>
                    <tr>
                      <td>
                        <?= $cart['product_name'] ?> x <?= $cart['quantity'] ?>
                      </td>
                      <td>
                        <?= number_format($cart['product_variant_sale_price'] * 1000, 0, ',', '.')  ?> đ
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <table class="checkout-totals">
                <tbody>
                  <tr>
                    <th>SUBTOTAL</th>
                    <input type="hidden" name="amount" value="<?= $_SESSION['total'] ?>" id="">
                    <td><?= number_format($_SESSION['total'] * 1000, 0, ',', '.')  ?> đ</td>
                  </tr>
                  <?php if (isset($_SESSION['coupon'])) : ?>
                    <tr>
                      <input type="hidden" name="coupon_id" value="<?= $_SESSION['coupon']['coupon_id'] ?>">
                      <th>Coupon</th>
                      <td>-<?= number_format($_SESSION['totalCoupon'] * 1000, 0, ',', '.')  ?> đ</td>
                    </tr>
                  <?php endif; ?>
                  <?php foreach ($ships as $key => $ship) : ?>
                    <tr>
                      <th>
                        <div> <?= $ship['shipping_id'] ?></div>
                      </th>
                      <td>
                        <input type="hidden" value="<?= $ship['shipping_id'] ?>">
                        <input class="form-check-input form-check-input_fill" name="shipping_id" type="radio" value="<?= $ship['shipping_id'] ?>" id="free_shipping-<?= $key + 1 ?>">
                        <label class="form-check-label" for="free_shipping-<?= $key + 1 ?>"> <?= $ship['shipping_name'] ?> : <?= number_format($ship['shipping_price'] * 1000, 0, ',', '.')  ?> đ</label>
                      </td>

                    </tr>
                    
                  <?php endforeach; ?>
                  
                </tbody>
                <tfoot>
                  
                  <tr>
                    <?php if (isset($_SESSION['coupon'])) : ?>

                      <th>TOTAL</th>
                      <td><?= number_format(($_SESSION['total'] - $_SESSION['totalCoupon']) * 1000, 0, ',', '.')  ?> đ</td>
                  </tr>
                <?php else : ?>
                  <th>TOTAL</th>
                  <td><?= number_format($_SESSION['total'] * 1000, 0, ',', '.')  ?> đ</td>
                <?php endif; ?>
                </tfoot>
                
              </table>
              <?php if (isset($_SESSION['errors']['shipping_id'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['shipping_id']  ?></p>
              <?php endif; ?>
            </div>
            
            <div class="checkout__payment-methods">
              <!-- <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" id="checkout_payment_method_1">
                  <label class="form-check-label" for="checkout_payment_method_1">
                    Direct bank transfer
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" id="checkout_payment_method_2">
                  <label class="form-check-label" for="checkout_payment_method_2">
                    Check payments
                    
                  </label>
                </div> -->
              <div class="form-check">
                <input class="form-check-input form-check-input_fill" type="radio" name="payment_method" id="payment_method_3" value="cod">
                <label class="form-check-label" for="checkout_payment_method_3">
                  Thanh toán khi nhận hàng
                </label>
                <?php if (isset($_SESSION['errors']['payment_method'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['payment_method']  ?></p>
              <?php endif; ?>
              </div>
              <!-- <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method" id="checkout_payment_method_4">
                  <label class="form-check-label" for="checkout_payment_method_4">
                    Paypal
                    
                  </label>
                </div> -->

            </div>
            <button type="submit" name="checkout" class="btn btn-primary btn-checkout">Đặt hàng</button>
          </div>
        </div>
      </div>
    </form>
  </section>
</main>
<?php include '../views/client/layout/footer.php' ?>