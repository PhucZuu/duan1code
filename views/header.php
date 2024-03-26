<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="./assets/css/styles.css" />

  <link rel="shortcut icon" href="./assets/img/logo.svg" type="image/x-icon">

  <title>Evara Website</title>
</head>

<body>
  <header class="header">
    <div class="header__top">
      <div class="header__container container">
        <div class="header__contact">
          <span>+000 000 0000</span>
          <span>Hà Nội</span>
        </div>
        <p class="header__alert-news">
        </p>
        <a href="index.php?act=dangnhap" class="header__top-action">
          Đăng nhập
        </a>
      </div>
    </div>

    <nav class="nav container">
      <a href="index.php" class="nav__logo">
        <img src="./assets/img/logo.svg" alt="" class="nav__logo-img">
      </a>

      <div class="nav__menu" id="nav-menu">
        <div class="nav__menu-top">
          <!-- LOGO -->
          <a href="index.php" class="nav__menu-logo">
            <img src="./assets/img/logo.svg" alt="">
          </a>

          <div class="nav__close" id="nav-close">
            <i class="fa-solid fa-circle-xmark"></i>
          </div>
        </div>

        <!-- DANH MỤC -->
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link active-link">Trang chủ</a>
          </li>

          <li class="nav__item">
            <a href="index.php?act=shop" class="nav__link">Shop</a>
          </li>

          <li class="nav__item">
            <a href="" class="nav__link">Tài khoản</a>
          </li>

          <li class="nav__item">
            <a href="index.php?act=dangky" class="nav__link">Đăng ký</a>
          </li>
        </ul>
        
        <!-- THANH TÌM KIẾM -->
        <div class="header__search">
        <form action="index.php?act=shop" method="post">
            <input type="text" class="form__input" placeholder="Tìm kiếm sản phẩm..." name="keyword">

            <button class="search__btn">
              <img src="./assets/img/search.png" alt="">
            </button>
            <!-- <input type="submit" name="timkiem" value="tìm kiếm"> -->
          </form>
        </div>
      </div>

      <div class="header__user--actions">
        <a href="index.php?act=viewCart" class="header__action-btn">
          <img src="./assets/img/icon-cart.svg" alt="">
          <span class="count"><?= $countProducts?></span>
        </a>

        <div class="header__action-btn nav__toggle" id="nav-toggle">
          <img src="./assets/img/menu-burger.svg" alt="">
        </div>
      </div>
    </nav>
  </header>
  <!-- END HEADER -->


 