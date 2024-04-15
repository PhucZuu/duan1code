<main class="main">
    <section class="breadcrumb">
      <ul class="breadcrumb__list flex container">
        <?php 
        extract($onePro);
        // print_r($onePro); die();
        // echo $id_sanpham; die();
        // kiểm tra xem người dùng có chọn vào các thuộc tính sản phẩm
        $get_id_color=null;
        $get_id_size=null;
        if(isset($_GET['idcolor'])&&isset($_GET['idsize'])){
          $get_id_color=$_GET['idcolor'];
          $get_id_size=$_GET['idsize'];
        }
        ?>
        <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
        <li><span class="breadcrumb__link">></span></li>
        <?php
echo "<li><a href='index.php?act=shop&iddm=".$onePro['id_danhmuc']."' class='breadcrumb__link'>".$tendm."</a></li>";
?>
        <li><span class="breadcrumb__link">></span></li>
        <li><span class="breadcrumb__link"><?=$ten_san_pham ?></span></li>

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

      <form action="index.php?act=chooseColor&idpro='.$id_sanpham.'" method="post" id="form_color">

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
                  <input type="radio" '.($id_color==$id_mau_sac?"checked":"").' name="colors" onclick="return this.form.submit()" class="colors" value='.$id_mau_sac.'>
                  <label class="showColor" style="background-color:'.$ma_mau.';"></label>
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
              <input type="radio" class="sizes" name="sizes" '.($id_size==$id_kichco?"checked":"").' onclick="return this.form.submit()" value="'.$id_kichco.'" id="">
              <label class="showSize">'.$ten_kich_co.'</label>
            </li>
            ';
          }
          

        echo '
        </form>
      </div>

      

      <div class="details__action">
      
      <form action="index.php?act=addToCart" method="post">
        <input type="number" name="quantity" id="" class="quantity" min="1" max="10" step="1" value="1">
        <input type="hidden" name="id_sanpham" id="" class="quantity" min="1" step="1" value="'.$id_sanpham.'">
        <input type="hidden" name="id_mausac" id="" class="quantity" min="1" step="1" value="'.$get_id_color.'">
        <input type="hidden" name="id_kichco" id="" class="quantity" min="1" step="1" value="'.$get_id_size.'">
        <input type="submit" class="btn btn-sm" value="Thêm vào giỏ hàng" name="addToCart" '.($get_id_color?($get_id_size?"":"disabled"):"disabled").'>

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
      extract($hot);
      $hot_ids = hot();
      foreach ($othersPro as $others){
        extract($others);
        $variant_price_others = loadPriceVariantOthers($id_san_pham);
        $id_bien_the=$variant_price_others['id_bien_the'];
        $gia = $variant_price_others['gia'];
        $giam_gia = $variant_price_others['giam_gia'];
        $linkPro = "index.php?act=details&idpro=".$id_san_pham;
        $hott = "";
        $check = false;
        if (in_array($id_san_pham, $hot_ids)) {
          $hott = "Hot";
          $check = true;
        }else{
          $hott ="";
        }
      echo '
      <div class="product__item">
      <div class="product__banner">
        <a href="'.$linkPro.'" class="product__imgaes">
          <!-- ẢNH CHÍNH -->
          <img src="./uploads/'.$hinh_anh.'" alt="" class="product__img defaule">
          
        </a>

        <!-- SALE/HOT -->
        <div class="product__badge light-pink' . ($check == true ? '' : 'light-red hidden') . '">' . ($check == true ? $hott : '') . '</div>
      </div>

      <div class="product_content">
        <span class="product__category">'.$ten_danh_muc.'</span>
        <a href="'.$linkPro.'">
          <h3 class="product__title">'.$ten_san_pham.'</h3>
        </a>
        
        <div class="product__price flex">
        <span class="new__price">$' . ($giam_gia == 0 ? $gia : $gia * ((100 - $giam_gia) / 100)) . '</span>
        <span class="old__price">' . (empty($giam_gia) ? "" :"$". $gia) . '</span>
        <span class="discount">' . (empty($giam_gia) ? '' : "-".$giam_gia."%") . '</span>
    </div>

        <!-- THÊM VÀO GIỎ -->
        <a href="index.php?act=addToCart&idbt='.$id_bien_the.'" class="action__btn cart__btn" aria-lable="Thêm vào giỏ hàng">
          <i class="fa-solid fa-shop"></i>
        </a>
      </div>
    </div>
      ';}
      ?>


      </div>
    </section>
    
  </main>