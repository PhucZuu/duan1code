<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <?php 
        extract($onePro); 
        $othersPro = loadOthers_pro($id_sanpham,$id_danhmuc);
        
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
        <span class="new__price">$'.($giam_gia==0?$gia:($gia * ((100 - $giam_gia) / 100))).'</span>
        <span class="old__price">'.($giam_gia==0?"":"$".$gia).'</span>
        <span class="save__price">'.($giam_gia!=0?$giam_gia."% Off":"").'</span>
      </div>

      <p class="short__description">
        '.$mo_ta.'
      </p>

      <ul class="product__list">
        <li class="list__item flex">
          <i class="fa-solid fa-crown"></i>Thời trang độc quyền tại shop
        </li>

        <li class="list__item flex">
          <i class="fa-solid fa-arrows-rotate"></i>Chính sách đổi trả trong 30 ngày
        </li>

        <li class="list__item flex">
          <i class="fa-regular fa-credit-card"></i>Thanh toán trực tuyến
        </li>
      </ul>
      
      <div class="details__color flex">
        <span class="details__color-title">Màu sắc</span>

        <ul class="color__list">';
          foreach($colors as $color){
            extract($color); 
            echo '
              <li>
                <a href="#" class="color__link" style="background-color: '.$ma_mau.';"></a>
              </li>
            ';
          }
        echo '</ul>
      </div>';

      echo '
      <div class="details__size flex">
        <span class="details__size-title">Kích cỡ</span>
        
        <ul class="size__list">';
          foreach($sizes as $size){
            extract($size); 
            echo '
            <li>
              <a href="#" class="size__link">'.$ten_kich_co.'</a>
            </li>
            ';
          }
          

        echo '
      </div>

      <div class="details__action">
        <input type="number" name="" id="" class="quantity" min="1" step="1" value="1">

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
          
        </a>

        <!-- SALE/HOT -->
        <div class="product__badge light-pink">'.(empty($giam_gia) ? "Hot" : "-".$giam_gia."%").'</div>
      </div>

      <div class="product_content">
        <span class="product__category">'.$ten_danh_muc.'</span>
        <a href="details.html">
          <h3 class="product__title">'.$ten_san_pham.'</h3>
        </a>
        
        <div class="product__price flex">
          <span class="new__price">$'.($giam_gia==0?$gia:($gia * ((100 - $giam_gia) / 100))).'</span>
          <span class="old__price">' . (empty($giam_gia) ? "" :"$". $gia) . '</span>
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