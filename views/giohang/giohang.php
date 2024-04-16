<main class="main">

<section class="breadcrumb">
  <ul class="breadcrumb__list flex container">
    <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><a href="index.php?act=shop" class="breadcrumb__link">Shop</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Giỏ hàng</span></li>
  </ul>
</section>

<?php if (count($_SESSION['myCart'])>0) { ?>
    <section class="cart section--lg container">
      <div class="table__container">
        <table class="table">
          <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Xóa</th>
          </tr>
    
          <?php
            $priceOrders=null;
            foreach($_SESSION['myCart'] as $key=>$value){
                $hinh="./uploads/".$value[4];
                $thanhtien=$value[2]*$value[1];
                $priceOrders+=$thanhtien;
    
                echo '
                <tr>
                <td>
                  <img src="'.$hinh.'" alt="" class="table__img ma">
                </td>
        
                <td>
                  <h3 class="table__title">'.$value[3].'</h3>
                  <span class="table_color">Màu sắc: '.$value[6].'</span><br>
                  <span class="table_size">Kích cỡ: '.$value[5].'</span>
                </td>
        
                <td><span class="table__price">$'.$value[1].'</span></td>
        
                <td><input type="number" min="1" step="1" value="'.$value[2].'" class="quantity" readonly></td>
        
                <td>
                  <span>
                    <div class="table__subtotal">$'.$thanhtien.'</div>
                  </span>
                </td>
        
                <td><a class="removeProduct" href="index.php?act=deleteProductInCart&idProductInCart='.$key.'"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                ';
            }
          ?>
    
        </table>
        <div class="totalProductPrice">
          <h3 class="totalPrice">Tổng thành tiền</h3>
          <span class="priceOrders">$<?=$priceOrders?$priceOrders:0?></span>
        </div>
      </div>
    
      <div class="cart__actions">
    
        <a href="index.php" class="btn flex btn--md">
          <i class="fa-solid fa-bag-shopping"></i> Tiếp tục mua hàng
        </a>
        <a href="<?= $priceOrders?'index.php?act=checkout':""?>" class="btn flex btn--md">
            <i class="fa-solid fa-box"></i> Đặt hàng
          </a>
      </div>
    
    </section>
    
  <?php }else{?>
    <section class="cart section--lg container emptyCart">
      <h3>Bạn chưa chọn sản phẩm nào</h3>
      <div class="imgEmpty">
        <img src="./assets/img/emptycart.png" alt="emptyImage">
      </div>
      <span>Hãy nhanh tay chọn ngay những sản phẩm yêu thích. </span><a class="back" href="index.php">Tiếp tục mua hàng</a>
      
    </section>

  <?php } ?>

</main>