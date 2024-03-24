<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <?php 
        extract($onePro);
        // echo $id_sanpham; die();
        
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

      <form action="index.php?act=chooseColor&idpro='.$id_sanpham.'" method="post">

        <div class="details__color flex">
          <span class="details__color-title">Màu sắc</span>
          
          <ul class="color__list">';
          $id_color='';
            if(isset($_GET['idcolor'])){
              $id_color=$_GET['idcolor'];
            }
            foreach($colors as $color){
              extract($color); 
              echo '
                <li>
                  <input type="radio" '.($id_color==$id_mau_sac?"checked":"").' name="colors" onclick="return this.form.submit()" class="colors" value='.$id_mau_sac.'><label class="showColor" style="background-color:'.$ma_mau.';"></label>
                </li>
              ';
            }
          echo '</ul>
        </div>';

      echo '
      <div class="details__size flex">
        <span class="details__size-title">Kích cỡ</span>
        
        <ul class="size__list">';
          $id_size='';
          if(isset($_GET['idsize'])){
            $id_size=$_GET['idsize'];
          }
          foreach($sizes as $size){
            extract($size); 
            echo '
            <li>
              <input type="radio" name="sizes" '.($id_size==$id_kichco?"checked":"").' onclick="return this.form.submit()" value="'.$id_kichco.'" id=""><label>'.$ten_kich_co.'</label>
            </li>
            ';
          }
          

        echo '
        </form>
      </div>

      

      <div class="details__action">
      <form action="index.php" method="post">
        <input type="number" name="" id="" class="quantity" min="1" step="1" value="1">

        <a href="#" class="btn btn-sm"><input type="submit" value="" name="addToCart">Add to Cart</a>

      </div>
      </form>
      

    </div>
  </div>';
  
    ?>
    
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#binhluan").load("views/binhluan/form.php", {idpro: <?= $id_sanpham?>});
    });
    </script>


    <!-- BÌNH LUẬN -->
    <section class="details__tab container" id="binhluan">

    </section>

    <!-- SẢN PHẨM LIÊN QUAN -->
    <section class="products container section--lg">
      <h3 class="section__title"><span>Sản phẩm</span> cùng loại</h3>
      <div class="products__container grid">

        <!-- sẢN PHẨM -->
      <?php 
      $othersPro = loadOthers_pro($id_sanpham,$id_danhmuc);
      foreach ($othersPro as $others){
        extract($others);
        $variant_price_others = loadPriceVariantOthers($id_san_pham);
        $gia = $variant_price_others['gia'];
        $giam_gia = $variant_price_others['giam_gia'];
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