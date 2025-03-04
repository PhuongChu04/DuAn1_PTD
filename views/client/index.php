<?php include '../views/client/layout/header.php' ?>
<?php
require_once '../controllers/admin/CategoryAdminController.php';
$categoryController = new CategoryAdminController();
$categories = $categoryController->getCategoryImages();
?>

<div class="page-content">

<main>
    <section class="swiper-container js-swiper-slider slideshow full-width_padding"
      data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "pagination": {
          "el": ".slideshow-pagination",
          "type": "bullets",
          "clickable": true
        }
      }'>
      <div class="swiper-wrapper">
        <div class="swiper-slide full-width_border border-1" style="border-color: #f5e6e0;">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-bg" style="background-color: #f5e6e0;">
              <img loading="lazy" src="client/images/slideshow-pattern.png" width="1761" height="778" alt="Pattern" class="slideshow-bg__img object-fit-cover">
            </div>
            <!-- <p class="slideshow_markup font-special text-uppercase position-absolute end-0 bottom-0">Summer</p> -->
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="client/images/ptd2.png" width="400" height="733" alt="Woman Fashion 1" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 h-auto w-auto">
              <div class="character_markup">
                <p class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">Mùa hè</p>
              </div>
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h6 class="text_dash text-uppercase text-red fs-base fw-medium animate animate_fade animate_btt animate_delay-3">Sản phẩm hot</h6>
              <h2 class="text-uppercase h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Thời trang mùa hè</h2>
              <h2 class="text-uppercase h1 fw-bold animate animate_fade animate_btt animate_delay-5">Mens</h2>
              <!-- <a href="shop1.html" class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover More</a> -->
            </div>
          </div>
        </div><!-- /.slideshow-item -->

        <div class="swiper-slide full-width_border border-1" style="border-color: #f5e6e0;">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-bg" style="background-color: #f5e6e0;">
              <img loading="lazy" src="client/images/slideshow-pattern.png" width="1761" height="778" alt="Pattern" class="slideshow-bg__img object-fit-cover">
            </div>
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <img loading="lazy" src="client/images/ptd1.png" width="400" height="690" alt="Woman Fashion 2" class="slideshow-character__img animate animate_fade animate_rtl animate_delay-10 h-auto w-auto">
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h6 class="text_dash text-uppercase text-red fs-base fw-medium animate animate_fade animate_btt animate_delay-3">Mùa hè 2025</h6>
              <h2 class="text-uppercase h1 fw-bold animate animate_fade animate_btt animate_delay-3">Sản phẩm mới</h2>
              <h6 class="text-uppercase mb-5 animate animate_fade animate_btt animate_delay-3">
              Khuyến mãi có thời hạn - Giảm giá tới 60% và Miễn phí vận chuyển</h6>
              <!-- <a href="shop1.html" class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-3">Discover More</a> -->
            </div>
          </div>
        </div><!-- /.slideshow-item -->
      </div><!-- /.slideshow-wrapper js-swiper-slider -->

      <div class="container">
        <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
        <!-- /.products-pagination -->
      </div><!-- /.container -->

      <div class="slideshow-social-follow d-none d-xxl-block position-absolute top-50 start-0 translate-middle-y text-center">
        <ul class="social-links list-unstyled mb-0 text-secondary">
          <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg"><use href="#icon_facebook" /></svg>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><use href="#icon_twitter" /></svg>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><use href="#icon_instagram" /></svg>
            </a>
          </li>
          <li>
            <a href="https://www.pinterest.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg"><use href="#icon_pinterest" /></svg>
            </a>
          </li>
        </ul><!-- /.social-links list-unstyled mb-0 text-secondary -->
        <span class="slideshow-social-follow__title d-block mt-5 text-uppercase fw-medium text-secondary">Follow Us</span>
      </div><!-- /.slideshow-social-follow -->
      <a href="#section-collections-grid_masonry" class="slideshow-scroll d-none d-xxl-block position-absolute end-0 bottom-0 text_dash text-uppercase fw-medium">Scroll</a>
    </section><!-- /.slideshow -->

    <div class="mb-3 pb-3 mb-md-4 pb-md-4 mb-xl-5 pb-xl-5"></div>
    <div class="pb-1"></div>

    <!-- Shop by collection -->
    <section class="collections-grid collections-grid_masonry" id="section-collections-grid_masonry">
      <div class="container h-md-100">
        <div class="row h-md-100">
          <div class="col-lg-6 h-md-100">
            <div class="collection-grid__item position-relative h-md-100">
            <div class="background-img "  style="background-image: url('./images/category/<?php echo $categories['category1']['image']; ?>' );"></div>
              
              <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                <p class="text-uppercase mb-1">Hot List</p>
                <h3 class="text-uppercase"><strong>Dress pants</strong> Collection</h3>
                <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Khám phá</a>
              </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
            </div>
          </div><!-- /.col-md-6 -->

          <div class="col-lg-6 d-flex flex-column">
            <div class="collection-grid__item position-relative flex-grow-1 mb-lg-4">
            <div class="background-img"  style="background-image: url('./images/category/<?php echo $categories['category2']['image']; ?>' );"></div>

              <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                <p class="text-uppercase mb-1">Hot List</p>
                <h3 class="text-uppercase"><strong>Kaki</strong> Collection</h3>
                <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
              </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
            </div>
            <div class="position-relative flex-grow-1 mt-lg-1">
              <div class="row h-md-100">
                <div class="col-md-6 h-md-100">
                  <div class="collection-grid__item h-md-100 position-relative">
                  <div class="background-img "  style="background-image: url('./images/category/<?php echo $categories['category3']['image']; ?>' );"></div>

                    <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                      <p class="text-uppercase mb-1">Hot List</p>
                      <h3 class="text-uppercase"><strong>Short</strong> Collection</h3>
                      <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Khám Phá</a>
                    </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                  </div><!-- /.collection-grid__item -->
                </div>

                <div class="col-md-6 h-md-100">
                  <div class="collection-grid__item h-md-100 position-relative">
                    <div class="background-img" style="background-color: #f5e6e0"></div>
                    <div class="content_abs content_bottom content_left content_bottom-md content_left-md">
                      <h3 class="text-uppercase"><strong>E-Gift</strong> Cards</h3>
                      <p class="mb-1">Surprise someone with the gift they<br>really want.</p>
                      <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
                    </div><!-- /.content_abs content_bottom content_left content_bottom-md content_left-md -->
                  </div><!-- /.collection-grid__item -->
                </div>
              </div>
            </div>
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.collections-grid collections-grid_masonry -->

    <div class="mb-4 pb-4 mb-xl-5 pb-xl-5"></div>

    <section class="products-grid container">
      <h2 class="section-title text-uppercase text-center mb-1 mb-md-3 pb-xl-2 mb-xl-4">Sản Phẩm <strong>Nổi bật</strong></h2>

      <ul class="nav nav-tabs mb-3 text-uppercase justify-content-center" id="collections-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="collections-tab-1-trigger" data-bs-toggle="tab" href="#collections-tab-1" role="tab" aria-controls="collections-tab-1" aria-selected="true">Tất cả sản phẩm</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="collections-tab-2-trigger" data-bs-toggle="tab" href="#collections-tab-2" role="tab" aria-controls="collections-tab-2" aria-selected="true">Sản phẩm bán chạy</a>
        </li>
        <!-- <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="collections-tab-3-trigger" data-bs-toggle="tab" href="#collections-tab-3" role="tab" aria-controls="collections-tab-3" aria-selected="true">Best Seller</a>
        </li> -->
        <!-- <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="collections-tab-4-trigger" data-bs-toggle="tab" href="#collections-tab-4" role="tab" aria-controls="collections-tab-4" aria-selected="true">Top Rated</a>
        </li> -->
      </ul>

      <div class="tab-content pt-2" id="collections-tab-content">
        <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">
          <div class="row">
            <?php foreach ($product as $pro) :?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="?act=product_detail&slug=<?=$pro['product_slug']?>">
                    <img loading="lazy" src="../public/images/product/<?= $pro['product_image'] ?>"  width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <!-- <img loading="lazy" src="client/images/products/product_1-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second"> -->
                  </a>
                  <a href="?act=product_detail&slug=<?=$pro['product_slug']?>" class="pc__atc btn anim_appear-bottom btn position-absolute border-0" data-aside="cartDrawer" title="Add To Cart" name="add_to_cart">Add To Cart</a>
                  
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category"><?=$pro['category_name'] ?></p>
                  <h6 class="pc__title"><a href="?act=product_detail"><?=$pro['product_name']?></a></h6>
                  <div class="tp-product-price-wrapper">
                    <span class="tp-product-price text-decoration-line-through text-muted fs-9"><?=number_format($pro['product_price']*1000,0,',','.')?>đ</span>
                    <span class="tp-product-price new-price text-red fs-4"><?=number_format($pro['product_sale_price']*1000,0,',','.')?>đ</span>
                  </div>
                  <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                    <span class="reviews-note text-lowercase text-secondary ms-1">0 reviews</span>
                  </div>

                    <a href="?act=wishlist-add&product_id=<?= $pro['product_id'] ?>" class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                      <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                    </a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
           
          </div><!-- /.row -->
          <div class="text-center mt-2">
            <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">Discover More</a>
          </div>
        </div><!-- /.tab-pane fade show-->

        <div class="tab-pane fade show" id="collections-tab-2" role="tabpanel" aria-labelledby="collections-tab-2-trigger">
          <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_3.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_3-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Kirby T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_4.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_4-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_5.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_5-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_6.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_6-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Shirt In Botanical Cheetah Print</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_7.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_7-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_8.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_8-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_1-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cropped Faux Leather Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>
                  <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                    <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_2.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_2-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Calvin Shorts</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>
          </div><!-- /.row -->
          <div class="text-center mt-2">
            <a class="btn-link btn-link_lg default-underline default-underline text-uppercase fw-medium" href="#">See All Products</a>
          </div>
        </div><!-- /.tab-pane fade show-->

        <div class="tab-pane fade show" id="collections-tab-3" role="tabpanel" aria-labelledby="collections-tab-3-trigger">
          <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_5.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_5-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_6.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_6-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Shirt In Botanical Cheetah Print</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_7.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_7-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_8.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_8-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_1-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cropped Faux Leather Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>
                  <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                    <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_2.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_2-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Calvin Shorts</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_3.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_3-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Kirby T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_4.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_4-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>
          </div><!-- /.row -->
          <div class="text-center mt-2">
            <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">Discover More</a>
          </div>
        </div><!-- /.tab-pane fade show-->

        <div class="tab-pane fade show" id="collections-tab-4" role="tabpanel" aria-labelledby="collections-tab-4-trigger">
          <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_7.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_7-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cotton Jersey T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_8.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_8-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Zessi Dresses</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_1-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cropped Faux Leather Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>
                  <div class="product-card__review d-flex align-items-center">
                    <div class="reviews-group d-flex">
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                      <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    </div>
                    <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_2.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_2-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Calvin Shorts</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_3.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_3-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Kirby T-Shirt</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$17</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_4.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_4-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Cableknit Shawl</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price price-old">$129</span>
                    <span class="money price price-sale">$99</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_5.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_5-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Colorful Jacket</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$29</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
              <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                  <a href="product1_simple.html">
                    <img loading="lazy" src="client/images/products/product_6.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                    <img loading="lazy" src="client/images/products/product_6-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                  </a>
                  <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                </div>

                <div class="pc__info position-relative">
                  <p class="pc__category">Dresses</p>
                  <h6 class="pc__title"><a href="product1_simple.html">Shirt In Botanical Cheetah Print</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price">$62</span>
                  </div>

                  <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                  </button>
                </div>
              </div>
            </div>
          </div><!-- /.row -->
          <div class="text-center mt-2">
            <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="shop1.html">See All Products</a>
          </div>
        </div><!-- /.tab-pane fade show-->
      </div><!-- /.tab-content pt-2 -->
    </section><!-- /.products-grid -->


    <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div>


    <!-- <section class="deal-timer position-relative d-flex align-items-end overflow-hidden" style="background-color: #ebebeb;">
      <div class="background-img" style="background-image: url('client/images/deal_timer_bg.jpg');"></div>

      <div class="deal-timer-wrapper container position-relative">
        <div class="deal-timer__content pb-2 mb-3 pb-xl-5 mb-xl-3 mb-xxl-5">
          <p class="text_dash text-uppercase text-red fw-medium">Deal of the week</p>
          <h3 class="h1 text-uppercase"><strong>Spring</strong> Collection</h3>
          <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium mt-3">Shop Now</a>
        </div>

        <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown" data-date="18-5-2024" data-time="06:50">
          <div class="day countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word fw-bold text-uppercase text-secondary">Days</span>
          </div>

          <div class="hour countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word fw-bold text-uppercase text-secondary">Hours</span>
          </div>

          <div class="min countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word fw-bold text-uppercase text-secondary">Mins</span>
          </div>

          <div class="sec countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word fw-bold text-uppercase text-secondary">Sec</span>
          </div>
        </div>
      </div>
    </section> -->
    <!-- /.deal-timer -->


    <!-- <div class="mb-3 mb-xl-5 pb-1 pb-xl-5"></div> -->


    <!-- <section class="grid-banner container mb-3">
      <div class="row">
        <div class="col-md-6">
          <div class="grid-banner__item grid-banner__item_rect position-relative mb-3">
            <div class="background-img" style="background-image: url('client/images/banner_1.jpg');"></div>
            <div class="content_abs content_bottom content_left content_bottom-lg content_left-lg">
              <h6 class="text-uppercase text-white fw-medium mb-3">Starting At $19</h6>
              <h3 class="text-white mb-3">Women's T-Shirts</h3>
              <a href="shop1.html" class="btn-link default-underline text-uppercase text-white fw-medium">Shop Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="grid-banner__item grid-banner__item_rect position-relative mb-3">
            <div class="background-img" style="background-image: url('client/images/banner_2.jpg');"></div>
            <div class="content_abs content_bottom content_left content_bottom-lg content_left-lg">
              <h6 class="text-uppercase fw-medium mb-3">Starting At $39</h6>
              <h3 class="mb-3">Men's Sportswear</h3>
              <a href="shop1.html" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section> -->


    <!-- <div class="mb-5 pb-1 pb-xl-4"></div> -->


    <!-- <section class="products-carousel container">
      <h2 class="section-title text-uppercase text-center mb-4 pb-xl-2 mb-xl-4">Limited <strong>Edition</strong></h2>

      <div id="product_carousel" class="position-relative">
        <div class="swiper-container js-swiper-slider"
          data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#product_carousel .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#product_carousel .products-carousel__next",
              "prevEl": "#product_carousel .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 1,
                "spaceBetween": 30
              }
            }
          }'>
          <div class="swiper-wrapper">
            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="client/images/home/demo1/product-0-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Hub Accent Mirror</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="client/images/home/demo1/product-1-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Hosking Blue Area Rug</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>
                <div class="product-card__review d-flex align-items-center">
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="client/images/home/demo1/product-2-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Hanneman Pouf</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="product1_simple.html">
                  <img loading="lazy" src="client/images/home/demo1/product-3-1.jpg" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                </a>
                <button class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="product1_simple.html">Cushion Futon Slipcover</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_heart" /></svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_prev_md" /></svg>
        </div>
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><use href="#icon_next_md" /></svg>
        </div>

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
       
      </div>

    </section> -->

    <!-- <section class="instagram container">
      <h2 class="section-title text-uppercase text-center mb-4 pb-xl-2 mb-xl-4">@UOMO</h2>

      <div class="row row-cols-3 row-cols-md-4 row-cols-xl-6">
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta1.jpg" width="230" height="230" alt="Insta image 1">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta2.jpg" width="230" height="230" alt="Insta image 2">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta3.jpg" width="230" height="230" alt="Insta image 3">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta4.jpg" width="230" height="230" alt="Insta image 4">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta5.jpg" width="230" height="230" alt="Insta image 5">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta6.jpg" width="230" height="230" alt="Insta image 6">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta7.jpg" width="230" height="230" alt="Insta image 7">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta8.jpg" width="230" height="230" alt="Insta image 8">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta9.jpg" width="230" height="230" alt="Insta image 9">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta10.jpg" width="230" height="230" alt="Insta image 10">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta11.jpg" width="230" height="230" alt="Insta image 11">
          </a>
        </div>
        <div class="instagram__tile">
          <a href="https://instagram.com/" target="_blank" class="position-relative overflow-hidden d-block effect overlay-plus">
            <img loading="lazy" class="instagram__img" src="client/images/instagram/insta12.jpg" width="230" height="230" alt="Insta image 12">
          </a>
        </div>
      </div>
    </section>/.instagram container -->


    <div class="mb-4 pb-4 pb-xl-5 mb-xl-5"></div>


    <section class="service-promotion container mb-md-4 pb-md-4 mb-xl-5">
      <div class="row">
        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shipping" /></svg>
          </div>
          <h3 class="service-promotion__title h5 text-uppercase">Giao hàng nhanh và miến phí vận chuyển</h3>
          <p class="service-promotion__content text-secondary">Giao hàng nhanh và miến phí vận chuyển</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_headphone" /></svg>
          </div>
          <h3 class="service-promotion__title h5 text-uppercase">Hỗ trợ 24/7</h3>
          <p class="service-promotion__content text-secondary">Luôn hỗ trợ mọi người 24/7</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shield" /></svg>
          </div>
          <h3 class="service-promotion__title h5 text-uppercase">Hoàn tiền</h3>
          <p class="service-promotion__content text-secondary">Chúng tôi hoàn tiền nếu sản phẩm lỗi</p>
        </div><!-- /.col-md-4 text-center-->
      </div><!-- /.row -->
    </section><!-- /.service-promotion container -->
  </main>


</div>
<?php include '../views/client/layout/footer.php' ?>