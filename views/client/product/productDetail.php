<?php include '../views/client/layout/header.php' ?>


<main>
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container">
        <div class="row">
            <div class="col-lg-7">
                <div class="product-single__media" data-media-type="vertical-thumbnail">
                    <div class="product-single__image">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($productDetail['galleries'] as $index => $gallery): ?>
                                    <div class="swiper-slide product-single__image-item">
                                        <img loading="lazy" class="h-auto" src="./images/product_gallery/<?= $gallery ?>" width="674" height="674" alt="">
                                        <a data-fancybox="gallery" href="./images/product_gallery/<?= $gallery ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_zoom" />
                                            </svg>
                                        </a>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_prev_sm" />
                                </svg></div>
                            <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_next_sm" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="product-single__thumbnail">
                        <div class="swiper-container">
                            <?php foreach ($productDetail['galleries'] as $index => $gallery): ?>

                                <div class="swiper-wrapper">
                                    <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto" src="./images/product_gallery/<?= $gallery ?>" width="104" height="104" alt=""></div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <form action="?act=addToCart-buyNow" method="post">
                    <div class="tp-product-details-wrapper">
                        <input type="hidden" name="product_id" value="<?= $productDetail['product_id'] ?>">

                        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                            <a href="?act=index" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium"><?= $productDetail['category_name'] ?></a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium"><?= $productDetail['product_name'] ?></a>


                        </div><!-- /.breadcrumb -->

                        <div class="product-single__prev-next d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                            <a href="product1_simple.html" class="text-uppercase fw-medium"><svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_prev_md" />
                                </svg><span class="menu-link menu-link_us-s">Prev</span></a>
                            <a href="product3_external.html" class="text-uppercase fw-medium"><span class="menu-link menu-link_us-s">Next</span><svg class="mb-1px" width="10" height="10" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_next_md" />
                                </svg></a>
                        </div><!-- /.shop-acs -->
                    </div>
                    <h1 class="product-single__name"><?= $productDetail['product_name'] ?></h1>
                    <div class="product-single__rating">
                        <div class="reviews-group d-flex">
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_star" />
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_star" />
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_star" />
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_star" />
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_star" />
                            </svg>
                        </div>
                        <span class="reviews-note text-lowercase text-secondary ms-1">0+ đánh giá</span>
                    </div>
                    <div class="product-single__price">
                        <span class="current-price price-variants"><?= number_format($productDetail['variant_price'] * 1000, 0, ',', '.')  ?> đ</span>
                        <span class="money price price-old sale-price-variants"><?= number_format($productDetail['variant_sale_price'] * 1000, 0, ',', '.')  ?> đ</span>
                        <input type="hidden" name="variant_id" id="variant_id">
                    </div>
                    <div class="product-single__short-desc">
                        <p><?= $productDetail['product_description'] ?> </p>
                    </div>
                    <?php
                    $uniqueColors = array_unique(array_column($productDetail['variants'], 'product_variant_color_code'));
                    $uniqueSizes = array_unique(array_column($productDetail['variants'], 'product_variant_size'));
                    ?>

                    <div class="product-single__swatches">

                        <div class="product-swatch text-swatches">
                            <label>Kích thước</label>

                            <div class="swatch-list">
                                <?php foreach ($uniqueSizes as $key => $size): ?>

                                    <input type="radio" name="size" class="btn-size" id="swatch-size-<?= $key + 1 ?>" data-size="<?= $size ?>">
                                    <label class="swatch js-swatch" for="swatch-size-<?= $key + 1 ?>"><?= $size ?></label>
                                <?php endforeach; ?>

                            </div>

                        </div>
                        <div class="product-swatch color-swatches">
                            <label>Màu</label>
                            <div class="swatch-list">
                                <?php foreach ($uniqueColors as $key => $color): ?>
                                    <input type="radio" name="color" class="btn-color" id="swatch-color-<?= $key + 1 ?>" data-color="<?= $color ?>">
                                    <label class="swatch swatch-color js-swatch" for="swatch-color-<?= $key + 1 ?>" style="color: <?= $color ?>"></label>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <h3 class="tp-product-details-action-title quantity-variants">Số lượng</h3>
                    <div class="product-single__addtocart">
                        <div class="qty-control position-relative">
                            <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                            <div class="qty-control__reduce">-</div>
                            <div class="qty-control__increase">+</div>
                        </div><!-- .qty-control -->
                        <button type="submit" class="btn btn-primary btn-addtocart" name="add_to_cart" data-aside="cartDrawer">Thêm vào giỏ hàng</button>
                        <button type="submit" name="buy_now" class="btn btn-primary btn-addtocart " name="buy_now" data-aside="cartDrawer">Mua ngay</button>

                    </div>
            </div>
            </form>
            <div class="product-single__addtolinks">
                <!-- <a href="?act=wishlist-add&product_id=<?= $productDetail['product_id'] ?>" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                        
                    </svg>Yêu Thích</a> -->
                <share-button class="share-button">
                    <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_sharing" />
                        </svg>
                        <span>Chia sẻ</span>
                    </button>
                    <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                        <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                        <div id="Article-share-template__main" class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                            <div class="field grow mr-4">
                                <label class="field__label sr-only" for="url">Link</label>
                                <input type="text" class="field__input w-full" id="url" value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health" placeholder="Link" onclick="this.select();" readonly="">
                            </div>
                            <button class="share-button__copy no-js-hidden">
                                <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z" fill="currentColor"></path>
                                </svg>
                                <span class="sr-only">Copy link</span>
                            </button>
                        </div>
                    </details>
                </share-button>
                <script src="js/details-disclosure.js" defer="defer"></script>
                <script src="js/share.js" defer="defer"></script>
            </div>

        </div>
        </div>
        <div class="product-single__details-tab">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab" href="#tab-additional-info" role="tab" aria-controls="tab-additional-info" aria-selected="false">Additional Information</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews (2)</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-description-tab">
          <div class="product-single__description">
            <h3 class="block-title mb-4">Sed do eiusmod tempor incididunt ut labore</h3>
            <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <div class="row">
              <div class="col-lg-6">
                <h3 class="block-title">Why choose product?</h3>
                <ul class="list text-list">
                  <li>Creat by cotton fibric with soft and smooth</li>
                  <li>Simple, Configurable (e.g. size, color, etc.), bundled</li>
                  <li>Downloadable/Digital Products, Virtual Products</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h3 class="block-title">Sample Number List</h3>
                <ol class="list text-list">
                  <li>Create Store-specific attrittbutes on the fly</li>
                  <li>Simple, Configurable (e.g. size, color, etc.), bundled</li>
                  <li>Downloadable/Digital Products, Virtual Products</li>
                </ol>
              </div>
            </div>
            <h3 class="block-title mb-0">Lining</h3>
            <p class="content">100% Polyester, Main: 100% Polyester.</p>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-additional-info" role="tabpanel" aria-labelledby="tab-additional-info-tab">
          <div class="product-single__addtional-info">
            <div class="item">
              <label class="h6">Weight</label>
              <span>1.25 kg</span>
            </div>
            <div class="item">
              <label class="h6">Dimensions</label>
              <span>90 x 60 x 90 cm</span>
            </div>
            <div class="item">
              <label class="h6">Size</label>
              <span>XS, S, M, L, XL</span>
            </div>
            <div class="item">
              <label class="h6">Color</label>
              <span>Black, Orange, White</span>
            </div>
            <div class="item">
              <label class="h6">Storage</label>
              <span>Relaxed fit shirt-style dress with a rugged</span>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
          <h2 class="product-single__reviews-title">Reviews</h2>
          <div class="product-single__reviews-list">
            <div class="product-single__reviews-item">
              <div class="customer-avatar">
                <img loading="lazy" src="../images/avatar.jpg" alt="">
              </div>
              <div class="customer-review">
                <div class="customer-name">
                  <h6>Janice Miller</h6>
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                  </div>
                </div>
                <div class="review-date">April 06, 2023</div>
                <div class="review-text">
                  <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                </div>
              </div>
            </div>
            <div class="product-single__reviews-item">
              <div class="customer-avatar">
                <img loading="lazy" src="../images/avatar.jpg" alt="">
              </div>
              <div class="customer-review">
                <div class="customer-name">
                  <h6>Benjam Porter</h6>
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><use href="#icon_star" /></svg>
                  </div>
                </div>
                <div class="review-date">April 06, 2023</div>
                <div class="review-text">
                  <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est…</p>
                </div>
              </div>
            </div>
          </div>
          <div class="product-single__review-form">
            <form name="customer-review-form">
              <h5>Be the first to review “Message Cotton T-Shirt”</h5>
              <p>Your email address will not be published. Required fields are marked *</p>
              <div class="select-star-rating">
                <label>Your rating *</label>
                <span class="star-rating">
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                  </svg>
                  <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z"/>
                  </svg>
                </span>
                <input type="hidden" id="form-input-rating" value="">
              </div>
              <div class="mb-4">
                <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Your Review" cols="30" rows="8"></textarea>
              </div>
              <div class="form-label-fixed mb-4">
                <label for="form-input-name" class="form-label">Name *</label>
                <input id="form-input-name" class="form-control form-control-md form-control_gray">
              </div>
              <div class="form-label-fixed mb-4">
                <label for="form-input-email" class="form-label">Email address *</label>
                <input id="form-input-email" class="form-control form-control-md form-control_gray">
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="remember_checkbox">
                <label class="form-check-label" for="remember_checkbox">
                  Save my name, email, and website in this browser for the next time I comment.
                </label>
              </div>
              <div class="form-action">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>





    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedColor = null;
        let selectedSize = null;

        const variants = <?= json_encode($productDetail['variants']) ?>;
        const colorButtons = document.querySelectorAll('.btn-color');
        const sizeButtons = document.querySelectorAll('.btn-size');

        // Khi người dùng chọn màu
        colorButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedColor = this.getAttribute('data-color'); // Lấy mã màu
                updateSize(); // Cập nhật kích thước khả dụng
                checkPrice(); // Hiển thị giá
            });
        });

        // Khi người dùng chọn size
        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedSize = this.getAttribute('data-size'); // Lấy size
                updateColor(); // Cập nhật màu khả dụng
                checkPrice(); // Hiển thị giá
            });
        });

        // Cập nhật màu khả dụng
        function updateColor() {
            colorButtons.forEach(button => {
                const color = button.getAttribute('data-color');
                const isAvailable = variants.some(variant =>
                    variant.product_variant_color_code === color &&
                    variant.product_variant_size === selectedSize
                );
                button.disabled = false; // Cho phép đổi màu
                button.style.opacity = isAvailable ? '1' : '0.1'; // Làm mờ nếu không khả dụng
            });
        }

        // Cập nhật kích thước khả dụng
        function updateSize() {
            sizeButtons.forEach(button => {
                const size = button.getAttribute('data-size');
                const isAvailable = variants.some(variant =>
                    variant.product_variant_color_code === selectedColor &&
                    variant.product_variant_size === size
                );
                button.disabled = false; // Cho phép đổi size
                button.style.opacity = isAvailable ? '1' : '0.1'; // Làm mờ nếu không khả dụng
            });
        }

        // Hiển thị giá và thông tin
        function checkPrice() {
            if (selectedColor && selectedSize) {
                const matchedVariant = variants.find(variant =>
                    variant.product_variant_color_code === selectedColor &&
                    variant.product_variant_size == selectedSize
                );
                if (matchedVariant) {
                    document.querySelector('.price-variants').textContent = formatPrice(matchedVariant.product_variant_price);
                    document.querySelector('.sale-price-variants').textContent = formatPrice(matchedVariant.product_variant_sale_price);
                    document.querySelector('.quantity-variants').textContent = `Số lượng: ${matchedVariant.product_variant_quantity}`;
                    document.getElementById('variant_id').value = matchedVariant.product_variant_id;
                } else {
                    resetPriceDisplay();
                }
            } else {
                resetPriceDisplay();
            }
        }

        // Đặt lại giá hiển thị
        function resetPriceDisplay() {
            document.querySelector('.price-variants').textContent = '';
            document.querySelector('.sale-price-variants').textContent = '';
            document.querySelector('.quantity-variants').textContent = 'Số lượng: 0';
            document.getElementById('variant_id').value = '';
        }

        // Định dạng giá tiền
        function formatPrice(price) {
            return new Intl.NumberFormat('vi-VN').format(price * 1000) + 'đ';
        }
    });
</script>

<?php include '../views/client/layout/footer.php' ?>