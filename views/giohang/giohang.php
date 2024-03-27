<main class="main">

<section class="breadcrumb">
  <ul class="breadcrumb__list flex container">
    <li><a href="index.html" class="breadcrumb__link">Home</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Shop</span></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Cart</span></li>
  </ul>
</section>


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
        viewCart();
      ?>

    </table>
  </div>

  <div class="cart__actions">

    <a href="index.php" class="btn flex btn--md">
      <i class="fa-solid fa-bag-shopping"></i> Tiếp tục mua hàng
    </a>
  </div>

  <div class="divider">
    <i class="fa-solid fa-fingerprint"></i>
  </div>

  <div class="cart__group grid">

    <div class="cart__total">
      <h3 class="section__title">Tổng giỏ hàng</h3>

      <table class="cart__total-table">
        <tr>
          <td><span class="card__total-title">Tổng thành tiền</span></td>
          <td><span class="card__total-price">$240.00</span></td>
        </tr>

        <tr>
          <td><span class="card__total-title">Phí vận chuyển</span></td>
          <td><span class="card__total-price">$10.00</span></td>
        </tr>

        <tr>
          <td><span class="card__total-title">Tổng</span></td>
          <td><span class="card__total-price">$250.00</span></td>
        </tr>
      </table>

      <a href="checkout.html" class="btn flex btn--md">
        <i class="fa-solid fa-box"></i> Đặt hàng
      </a>
    </div>
  </div>
</section>

</main>