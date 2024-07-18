<main class="main">
<section class="breadcrumb">
    <ul class="breadcrumb__list flex container">
    <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><a href="index.php?act=viewCart" class="breadcrumb__link">Giỏ hàng</a></li>
    <li><span class="breadcrumb__link">></span></li>
    <li><span class="breadcrumb__link">Thanh toán</span></li>
    </ul>
</section>
<section class="checkout section--lg">
    <div class="checkout__container container grid">
    <div class="checkout__group">
        <h3 class="section__title">Chi tiết đơn hàng</h3>

        <form action="index.php?act=checkoutConfirm" method="post" class="form grid">
        <input type="text" class="form__input" name='ho_va_ten' placeholder="Họ và tên" value="<?= $ten_nguoi_dung?>"><span class="error"><?= $errName?></span>

        <input type="text" class="form__input" name="so_dien_thoai" placeholder="Số điện thoại" value="<?= $so_dien_thoai?>"><span class="error"><?=$errPhone?></span>
        
        <input type="text" class="form__input" name="dia_chi" placeholder="Địa chỉ" value="<?= $dia_chi?>"><span class="error"><?= $errAddress?></span>

        <input type="text" class="form__input" name="email" placeholder="Email" value="<?= $email?>"><span class="error"><?= $errEmail?></span>

        <h3 class="checkout__title">Thông tin thêm</h3>

        <textarea name="ghi_chu" id="" cols="30" rows="10" placeholder="Ghi chú"
            class="form__input textarea"></textarea>

        <!-- </form> -->
    </div>

    <div class="checkout__group">
        <h3 class="section__title">Đơn hàng</h3>

        <table class="order__table">
        <tr>
            <th colspan="2">Sản phẩm</th>
            <th>Tổng</th>
        </tr>
        <?php 
            $priceOrders=0;
            foreach($_SESSION['myCart'] as $key => $cart) { 
                $priceOrders+=$cart[7];
            ?>
            
            <tr>
                <td>
                <img src="./uploads/<?= $cart[4] ?>" alt="productimgae" class="order__img ma">
                </td>

                <td>
                <h3 class="table__title"> <?= $cart[3] ?>
                </h3>
                <p class="table__quantity">x<?= $cart[2] ?></p>
                <p class="table__quantity">Màu: <?= $cart[6] ?></p>
                <p class="table__quantity">Cỡ: <?= $cart[5] ?></p>
                </td>

                <td>
                <span class="table__price">$<?= $cart[7]?></span>
                </td>

            </tr>

        <?php } ?>
        <tr>
            <td><span class="order__subtitle">Tổng đơn hàng</span></td>
            <td colspan="2"><span class="table__price">$<?= $priceOrders?></span></td>
        </tr>
        </table>

        <div class="payment__methods">
        <h3 class="checkout__title payment__title">Phương thức thanh toán</h3>
        <button type="submit" class="btn btn--md mb" name="thanhtoannhanhang">Thanh toán khi nhận hàng</button>
        <button type="submit" class="btn btn--md mb" name="vnpay">Thanh toán qua VNPAY</button>
        <!-- <button type="submit" class="btn btn--md mb" name="payUrl">Thanh toán qua MOMO</button> -->
        <!-- <div class="payment__option flex">
            <input type="radio" name="payment" value="1" class="payment__input" checked>
            <label for="" class="payment__label">Thanh toán khi nhận hàng</label>
        </div>

        <div class="payment__option flex">
            <input type="radio" name="payment" value="2" class="payment__input">
            <label for="" class="payment__label">Thanh toán qua VNPay</label>
        </div>

        <div class="payment__option flex">
            <input type="button" name="payUrl" value="2" class="payment__input">
            <label for="" class="payment__label">Thanh toán qua MoMo</label>
        </div> -->
        <!-- <input type="submit" name="checkoutConfirm" class="btn btn--md" value="Xác nhân thanh toán"> -->
        <!-- <button class="btn btn--md"><a href="#" class="checkoutConfirm">Xác nhận thanh toán</a></button> -->

        </div>
    </div>
    </form>
    </div>
</section>
</main>