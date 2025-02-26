<?php include '../views/client/layout/header.php' ?>

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Yêu thích</h2>
      <div class="row">
        <div class="col-lg-3">
          <ul class="account-nav">
            <li><a href="account_dashboard.html" class="menu-link menu-link_us-s">Tổng quan</a></li>
            <li><a href="account_edit.html" class="menu-link menu-link_us-s">Thông tin tài khoản</a></li>
            <li><a href="account_wishlist.html" class="menu-link menu-link_us-s menu-link_active">Yêu thích</a></li>
            <li><a href="login_register.html" class="menu-link menu-link_us-s">Đăng xuất</a></li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <table class="orders-table">
                <thead>
                    <th>Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Sốlượng</th>
                    <th>Hoạt động</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($listWishList as $favorite) :?>
                    <tr>
                        <td>
                            <div class="shopping-cart__product-item">
                                <a href="?act=product_detail&slug=<?= $favorite['slug'] ?>">
                                    <img src="./images/product/<?= $favorite['image'] ?>" alt="" width="120px" height="120px">
                                </a>
                                <p><?= $favorite['name'] ?></p>
                            </div>
                        </td>
                        <td>
                            <span class="shopping-cart__product-price"><?= number_format($favorite['price'] *1000, 0, ',' , '.') ?>đ</span>
                        </td>
                        <td>
                            <div class="qty-control position-relative" style="width:60px;">
                                <p><?= $favorite['quantity'] ?></p>
                            </div>
                        </td>

                        <td>
                            <a href="index.php?act=product_detail&slug=<?= $favorite['slug'] ?>"  class="btn btn-dark">Thêm </a>
                        </td>
                        <td>
                            <a href="?act=wishlist-delete&favorite_id=<?= $favorite['favorite_id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <br>
</main>

<?php include '../views/client/layout/footer.php' ?>