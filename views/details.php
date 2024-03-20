<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <?php 
        extract($onePro); 
        ?>
        <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link"></span></li>
      </ul>
    </section>
    <section class="details section--lg">
    <?php 
    echo '
    <div class="details__container container grid ac">
    <div class="details__group">
      <img src="./uploads/'.$hinh_anh.'" alt="" class="details__img" id="details" onmouseout="imgOut()"
        onmouseover="imgOver()">
    </div>

    <div class="details__group">
      <h3 class="details__title">'.$ten_san_pham.'</h3>

      <div class="details__price flex">
        <span class="new__price">$116</span>
        <span class="old__price">$190</span>
        <span class="save__price">25% Off</span>
      </div>

      <p class="short__description">
        '.$mo_ta.'
      </p>

      <ul class="product__list">
        <li class="list__item flex">
          <i class="fa-solid fa-crown"></i>1 Year AL Jazeera Brand Warranty
        </li>

        <li class="list__item flex">
          <i class="fa-solid fa-arrows-rotate"></i>30 Day Return Policy
        </li>

        <li class="list__item flex">
          <i class="fa-regular fa-credit-card"></i>Card on Delivery available
        </li>
      </ul>

      <div class="details__color flex">
        <span class="details__color-title">Color</span>

        <ul class="color__list">
          <li>
            <a href="#" class="color__link" style="background-color: hsl(37, 100%, 65%);"></a>
          </li>

          <li>
            <a href="#" class="color__link" style="background-color: hsl(353, 100%, 67%);"></a>
          </li>

          <li>
            <a href="#" class="color__link" style="background-color: hsl(49, 100%, 60%);"></a>
          </li>

          <li>
            <a href="#" class="color__link" style="background-color: hsl(304, 100%, 78%);"></a>
          </li>

          <li>
            <a href="#" class="color__link" style="background-color: hsl(126,61%, 52%);"></a>
          </li>
        </ul>
      </div>

      <div class="details__size flex">
        <span class="details__size-title">Size</span>

        <ul class="size__list">
          <li>
            <a href="#" class="size__link size-active">M</a>
          </li>

          <li>
            <a href="#" class="size__link">L</a>
          </li>

          <li>
            <a href="#" class="size__link">XL</a>
          </li>

          <li>
            <a href="#" class="size__link">XXL</a>
          </li>
        </ul>
      </div>

      <div class="details__action">
        <input type="number" name="" id="" class="quantity" value="3">

        <a href="#" class="btn btn-sm">Add to Cart</a>

        <!-- <a href="#" class="details__action-btn details__action-btn--color">
          <i class="fa-solid fa-heart"></i>
        </a> -->
      </div>

      

    </div>
  </div>';
    ?>
    </section>
    <!-- BÌNH LUẬN -->
    <section class="details__tab container">
      <div class="detail__tabs">
        <span class="detail__tab active-tab">
          Bình luận
        </span>
      </div>

      <div class="details__tabs-content">
        <div class="details__tab-content active-tab">
          <div class="cart__comment">
            <div class="comments">
              <div class="comment">
                <div class="avatar"><img src="/assets/img/avatar-1.jpg" alt="Avatar"></div>
                <div class="comment-content">
                  <div class="comment-header">
                    <span class="username">John Doe</span>
                    <span class="timestamp">2 hours ago</span>
                  </div>
                  <p class="comment-text">This is a comment on the post. It's really interesting!</p>
                </div>
              </div>
              <div class="comment">
                <div class="avatar"><img src="/assets/img/avatar-3.jpg" alt="Avatar"></div>
                <div class="comment-content">
                  <div class="comment-header">
                    <span class="username">Kim Doe</span>
                    <span class="timestamp">3 hours ago</span>
                  </div>
                  <p class="comment-text">This is a comment on the post. It's really interesting! It's really interesting! It's really interesting! It's really interesting!
                    It's really interesting! It's really interesting! It's really interesting!
                  </p>
                </div>
              </div>
              <div class="comment">
                <div class="avatar"><img src="/assets/img/avatar-2.jpg" alt="Avatar"></div>
                <div class="comment-content">
                  <div class="comment-header">
                    <span class="username">Emma Stone</span>
                    <span class="timestamp">2 weeks ago</span>
                  </div>
                  <p class="comment-text">This is a comment on the post. It's really interesting!</p>
                </div>
              </div>
            </div>
            <form action="" class="comment__form form grid">
              <div class="form__group">
                <input type="text" class="form__input" placeholder="Viết bình luận">
                <div class="form__btn">
                  <button class="btn flex btn--sm">
                    <i class="fa-solid fa-comment"></i> Gửi
                  </button>
                </div>
              </div>
            </form>
            
          </div>

        </div>

    </section>

    <!-- SẢN PHẨM LIÊN QUAN -->
    <section class="products container section--lg">
      <h3 class="section__title"><span>Sản phẩm</span> cùng loại</h3>
      <div class="products__container grid">

        <!-- sẢN PHẨM -->
      <?php 
      foreach ($othersPro as $others){
        extract($others);
        $linkPro = "index.php?act=details&idpro=".$id_san_pham;
      echo '
      <div class="product__item">
      <div class="product__banner">
        <a href="'.$linkPro.'" class="product__imgaes">
          <!-- ẢNH CHÍNH -->
          <img src="./uploads/'.$hinh_anh.'" alt="" class="product__img defaule">
          <!-- ẢNH HOVER -->
          <img src="./uploads/'.$hinh_anh.'" alt="" class="product__img hover">
        </a>

        <!-- ICON HOVER -->
        <!-- <div class="producut__actions">
          <a href="#" class="action__btn" aria-lable="Quick View">
            <i class="fa-regular fa-eye"></i>
          </a>

          <a href="#" class="action__btn" aria-lable="Add to Wishlist">
            <i class="fa-solid fa-heart"></i>
          </a>

          <a href="#" class="action__btn" aria-lable="Compare">
            <i class="fa-solid fa-shuffle"></i>
          </a>
        </div> -->

        <!-- SALE/HOT -->
        <div class="product__badge light-pink">Hot</div>
      </div>

      <div class="product_content">
        <span class="product__category">Clothing</span>
        <a href="details.html">
          <h3 class="product__title">Colorful Pattern Shirts</h3>
        </a>
        
        <div class="product__price flex">
          <span class="new__price">$238.85</span>
          <span class="old__price">$240.8</span>
        </div>

        <!-- THÊM VÀO GIỎ -->
        <a href="#" class="action__btn cart__btn" aria-lable="Add To Cart">
          <i class="fa-solid fa-shop"></i>
        </a>
      </div>
    </div>
      ';}
      ?>


      </div>
    </section>

  </main>