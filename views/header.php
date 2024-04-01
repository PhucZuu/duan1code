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

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="./fontawesome-free/css/all.min.css">

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
          <?php
            if(isset($_SESSION['nguoidung'])){
              extract($_SESSION['nguoidung']);
              if($vai_tro == 1) {
          ?>
            <div class="relative" onclick="toggleDropdown()">
                <div class="flex mr-4">
                    <img class="mr-3" style="width:35px;height:35px;border-radius: 50%" src="./uploads/<?= $hinh_anh?>" alt="">
                    <p id="userDropdownButton" class="font-semibold text-green-400 cursor-pointer"><?= $ten_dang_nhap ?></p>
                </div>
                <ul id="userDropdownMenu" class="absolute hidden mt-2 py-2 w-32 bg-white rounded-md shadow-md z-10">
                    <div class="grid-cols-1">
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=editmk">Đổi mật khẩu</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=edit_taikhoan">Chỉnh sửa</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="admin/index.php">Đăng nhập vào admin</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=thoat">Đăng xuất</a>
                    </div>
                </ul>
            </div>
          <?php
            } else {
          ?>
              <div class="relative" onclick="toggleDropdown()">
                  <div class="flex mr-4">
                      <img class="mr-3" style="width:35px;height:35px;border-radius: 50%" src="./uploads/<?= $hinh_anh?>" alt="">
                      <p id="userDropdownButton" class="font-semibold text-green-400 cursor-pointer"><?= $ten_dang_nhap ?></p>
                  </div>
                  <ul id="userDropdownMenu" class="absolute hidden mt-2 py-2 w-32 bg-white rounded-md shadow-md z-10">
                      <div class="grid-cols-1">
                          <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=editmk">Đổi mật khẩu</a>
                          <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=edit_taikhoan">Chỉnh sửa</a>
                          <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=thoat">Đăng xuất</a>
                      </div>
                  </ul>
              </div>
          <?php
                  }
              } else {
                  ?>
                  <div class="m-7 mr-3 md:mr-7 md:m-0 flex ">
                      <a href="index.php?act=dangnhap"
                        class="flex text-2xl text-green-500 hover:text-cyan-400 hover:underline transition duration-400 ease-in place-items-center cursor-pointer">
                          <i class="fa-regular fa-user"></i>
                      </a>
                  </div>
                  <?php
              }
            ?>
      
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
            <a href="index.php?act=theodoidonhang" class="nav__link">Theo dõi đơn hàng</a>
          </li>

          <li class="nav__item">
            <a href="index.php?act=gioithieu" class="nav__link">Giới thiệu</a>
          </li>

          <!-- <li class="nav__item">
            <a href="index.php?act=dangky" class="nav__link">Đăng ký</a>
          </li> -->
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
          <?php
            if(isset($_SESSION['nguoidung'])){
              extract($_SESSION['nguoidung']);
          ?>
              <div class="relative" onclick="toggleDropdown()">
                <div class="flex mr-4">
                  <!-- <img class="mr-3" style="width:35px;height:35px;border-radius: 50%" src="./uploads/<?= $hinh_anh?>" alt=""> -->
                  <p id="navDropdownButton" class="font-semibold text-green-400 cursor-pointer"><img src="./assets/img/menu-burger.svg" alt=""></p>
                </div>
                <ul id="navDropdownMenu" class="absolute hidden mt-2 py-2 w-32 bg-white rounded-md shadow-md z-10">
                    <div class="grid-cols-1">
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?">Trang chủ</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=shop">Shop</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=theodoidonhang">Quản lý đơn hàng</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=gioithieu">Giới thiệu</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=dangky">Đăng ký</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=dangnhap">Đăng nhập</a>
                    </div>
                </ul>
              </div>
            <?php }else{ ?>
              <div class="relative" onclick="toggleDropdown()">
                <div class="flex mr-4">
                  <!-- <img class="mr-3" style="width:35px;height:35px;border-radius: 50%" src="./uploads/<?= $hinh_anh?>" alt=""> -->
                  <p id="navDropdownButton" class="font-semibold text-green-400 cursor-pointer"><img src="./assets/img/menu-burger.svg" alt=""></p>
                </div>
                <ul id="navDropdownMenu" class="absolute hidden mt-2 py-2 w-32 bg-white rounded-md shadow-md z-10">
                    <div class="grid-cols-1">
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?">Trang chủ</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=shop">Shop</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=theodoidonhang">Quản lý đơn hàng</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=gioithieu">Giới thiệu</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=dangky">Đăng ký</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-green-200 text-sm" href="index.php?act=dangnhap">Đăng nhập</a>
                    </div>
                </ul>
              </div>
              <?php } ?>
          <!-- <img src="./assets/img/menu-burger.svg" alt=""> -->
        </div>
      </div>
    </nav>
  </header>
  <!-- END HEADER -->


 