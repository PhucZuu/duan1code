<main class="main">
        <!-- BANNER -->
        <section class="home section--lg">
      <div class="home__container container grid">
        <div class="home__content">
          <span class="home__subtitle">Khuyến mãi hấp dẫn</span>
          <h1 class="home__title">Xu hướng thời trang <br>
            <span>Bộ sưu tập đặc biệt</span>
          </h1>
          <p class="home__description">Tiết kiệm nhiều hơn với phiếu giảm giá và giảm giá tới 20%</p>
          <a href="index.php?act=shop" class="btn">Shop Now</a>
        </div>

        <img src="./assets/img/home-img.png" alt="" class="home__img">
      </div>
    </section>
    <!-- FILTER -->
    <section class="products section container">
      <div class="tab__btns">
        <?php
        foreach ($danhMuc as $dm){
          extract($dm);
          // print_r($dm);
          // die();
          $linkdm = 'index.php?act=shop&iddm='.$id_danh_muc;
          echo '
          <a href="'.$linkdm.'"><span class="tab__btn active-tab">'.$ten_danh_muc.'</span></a>
          ';
        }
        ?>
      </div>
      
      <!-- DANH SÁCH SẢN PHẨM -->
      <div class=" tab__items">
          <div class="tab__item active-tab">
            <div class="products__container grid">
              <!-- SẢN PHẨM -->
              <?php
              // echo "<pre>";
              // print_r($products);
              // die;
              foreach ($products as $pro){
                extract($pro);
                $linkPro = "index.php?act=details&idpro=".$id_san_pham;
                $variant_price = loadPriceVariant($id_san_pham);
                $gia = $variant_price['gia'];
                $giam_gia = $variant_price['giam_gia'];
                echo '<div class="product__item">
                <div class="product__banner">
                  <a href="'.$linkPro.'" class="product__imgaes">
                    <!-- ẢNH CHÍNH -->
                    <img src="./uploads/'.$hinh_anh.'" alt="" class="product__img defaule">
                  </a>

                  <!-- SALE/HOT -->
                  <div class="product__badge light-pink">'.(empty($giam_gia) ? "Hot" : "-".$giam_gia."%").'</div>
                </div>

                <div class="product_content">
                  <span class="product__category">'.$ten_danh_muc.'</span>
                  <a href="'.$linkPro.'">
                    <h3 class="product__title">'.$ten_san_pham.'</h3>
                  </a>
                  
                  <div class="product__price flex">
                  <span class="new__price">$' . ($giam_gia == 0 ? $gia : $gia * ((100 - $giam_gia) / 100)) . '</span>
                  <span class="old__price">' . (empty($giam_gia) ? "" :"$". $gia) . '</span>
              </div>
              

                  <!-- THÊM VÀO GIỎ -->
                  <a href="#" class="action__btn cart__btn" aria-lable="Thêm vào giỏ hàng">
                    <i class="fa-solid fa-shop"></i>
                  </a>
                </div>
              </div>';
              }
              ?>
              
            </div>
          </div>
      </div>

    </section>