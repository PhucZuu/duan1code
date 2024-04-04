<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../assets/css/styles.css" />

  <link rel="shortcut icon" href="../assets/img/logo.svg" type="image/x-icon">

  <!-- <script src="https://cdn.tailwindcss.com"></script> -->

  <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">

  <title>Evara Website</title>
</head>

<body>
<header class="header">
    <div class="header__top">
      <div class="header__container container">
        <div class="header__contact">
          <span>+84 683 313 294</span>
          <span>Hà Nội</span>
        </div>
      </div>
    </div>

</header>
<main class="main">
    <div class="boxthank container">
        <div class="imgthank">
            <img src="../assets/img/tick.png" alt="">
        </div>
        <div class="thankforpurchase">
            <h3>Mua hàng thành công</h3>
            <span>Cảm ơn vì đã mua hàng của chúng tôi. Đơn hàng sẽ được giao đến bạn trong vài ngày tới.</span><br>
            <span>Bạn có thể theo dõi đơn hàng của mình trong <a class="followOrder" href="http://localhost/duan1code/index.php?act=theodoidonhang">Theo dõi đơn hàng</a></span>
        </div>
        <a class="btn btn--md btncontinue" href="http://localhost/duan1code/index.php">TIẾP TỤC MUA HÀNG</a>
    </div>
    <section class="newsletter section home__newsletter">
      <div class="newsletter__container container grid">
        <h3 class="newsletter__title flex">
          <img src="../assets/img/icon-email.svg" alt="" class="newsletter__icon">
          Đăng ký để nhận thông tin
        </h3>
        <p class="newsletter__description">
        ..và nhận phiếu giảm giá cho lần đầu mua hàng
        </p>

        <form action="" class="newsletter__form">
          <input type="text" class="newsletter__input" placeholder="Nhập email của bạn">
          <button type="submit" class="newletter__btn">Đăng ký</button>
        </form>
      </div>

    </section>
</main>

<footer class="footer container">
    <div class="footer__container grid">
      <div class="footer__content">
        <a href="index.html" class="footer__logo">
          <img src="../assets/img/logo.svg" alt="" class="footer__logo-img">
        </a>
        <h4 class="footer__subtitle">Liên hệ</h4>

        <p class="footer__description">
          <span> Địa chỉ:</span>
          Hai Ba Trung, Ha Noi
        </p>

        <p class="footer__description">
          <span> Điện thoại:</span>
          +84 000 000 000
        </p>

        <p class="footer__description">
          <span>Thời gian:</span>
          10:00 - 18:00, T2 - T7
        </p>

        <div class="footer__social">
          <h4 class="footer__subtitle">Theo dõi chúng tôi</h4>

          <div class="footer__social-links flex">
            <a href="">
              <img src="../assets/img/icon-facebook.svg" alt="" class="footer__social-icon">
            </a>

            <a href="">
              <img src="../assets/img/icon-twitter.svg" alt="" class="footer__social-icon">
            </a>

            <a href="">
              <img src="../assets/img/icon-instagram.svg" alt="" class="footer__social-icon">
            </a>

            <a href="">
              <img src="../assets/img/icon-pinterest.svg" alt="" class="footer__social-icon">
            </a>

            <a href="">
              <img src="../assets/img/icon-youtube.svg" alt="" class="footer__social-icon">
            </a>

          </div>
        </div>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Thông tin thêm</h3>

        <ul class="footer__links">
          <li><a href="" class="footer__link">Về chúng tôi</a></li>
          <li><a href="" class="footer__link">Thông tin giao hàng</a></li>
          <li><a href="" class="footer__link">Chính sách bảo mật</a></li>
          <li><a href="" class="footer__link">Điều khoản và điều kiện</a></li>
          <li><a href="" class="footer__link">Liên hệ với chúng tôi</a></li>
          <li><a href="" class="footer__link">Trung tâm hỗ trợ</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Tài khoản</h3>

        <ul class="footer__links">
          <li><a href="" class="footer__link">Đăng nhập</a></li>
          <li><a href="" class="footer__link">Xem giỏ hàng</a></li>
          <li><a href="" class="footer__link">Theo dõi đơn hàng</a></li>
          <li><a href="" class="footer__link">Hỗ trợ</a></li>
          <li><a href="" class="footer__link">Đặt hàng</a></li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Cổng thanh toán an toàn</h3>
        <img src="../assets/img/payment-method.png" alt="" class="payment__img">
      </div>

    </div>

    <div class="footer__bottom">
      <p class="copyright">&copy; 2024 Group 6. All right reserved</p>
      <span class="designer">Designer by Group 6</span>
    </div>

  </footer>
</body>
</html>