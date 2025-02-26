<?php include '../views/client/layout/header.php' ?>
<main>
    <div class="mb-4 pb-4"></div>
    <div class="mb-4 pb-4"></div>
    <section class="full-width_padding">
        <div class="full-width_border border-2" style="border-color: #eeeeee;">
            <div class="shop-banner position-relative ">
                <div class="background-img" style="background-color: #eeeeee;">
                    <img loading="lazy" src="./images/banner/banner.webp" width="1750" height="450" alt="Pattern" class="slideshow-bg__img object-fit-cover">
                </div>
                
            </div>
        </div>
    </section>
    <div class="mb-4 pb-lg-3"></div>
    <section class="shop-main container">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
            <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                <a href="?act=index" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
                <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
            </div>
        </div>
            <?php if(isset($result)):?>
                <p>Kết quả tìm kiếm với từ khóa <?= $_SESSION['keyword'] ?></p>
            <?php endif;?>
        <div class="products-grid row row-cols-2 row-cols-md-3 row-cols-lg-4" id="products-grid">
            <?php foreach($product as $pro) :?>
            <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                    <div class="pc__img-wrapper">
                        <div class="swiper-container background-img " data-settings='{"resizeObserver": true}'>
                            <div>
                                <a href="?act=product_detail&slug=<?=$pro['product_slug']?>"><img loading="lazy" src="./images/product/<?= $pro['product_image'] ?>" width="330" height="400" class="pc_img" alt=""></a>

                            </div>
                            <a href="?act=product_detail&slug=<?=$pro['product_slug']?>" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium " title="Add to Cart">Add to Cart</a>
                        </div>
                    </div>
                    <div class="pc__info position-relative">
                        <p class="pc_category"><?= $pro['category_name'] ?></p>
                        <h6 class="pc_title"><a href="?act=product_detail&slug=<?=$pro['product_slug']?>"><?= $pro['product_name'] ?></a></h6>
                        <div class="product-cart__price d-flex">
                            <span class="money price price-old"><?= number_format($pro['product_price'] *1000, 0, ',', '.') ?>đ</span>
                            <span class="money price price-sale"><?= number_format($pro['product_sale_price'] *1000, 0, ',', '.') ?>đ</span>
                        </div>
                        <a href="?act=wishlist-add&product_id=<?=$pro['product_id']?>" class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_heart" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="text-center">
            <a class="btn-link btn-link_lg text-uppercase fw-medium" href="?act=index">Show More</a>
        </div>
    </section>

</main>



<?php include '../views/client/layout/footer.php' ?>