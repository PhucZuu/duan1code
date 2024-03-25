<?php
    // include hoặc require tất cả các file có trên hệ thống (controllers/commons/models). Views ở trong controllers
    // require commons
    

    // require controllers
    
    // require models
    include_once './models/pdo.php';
    include_once './models/SanPham.php';
    include_once './models/danhMuc.php';
    include_once './models/taikhoan.php';
    // Điều hướng
    include_once './views/header.php';
    session_start();

    $products = loadAllPro();
    $danhMuc = loadAll_danhmuc();

    $act= $_GET['act'] ?? '/';
    switch ($act) {
        case '/':
            $products=loadAllProducts();
            include_once './views/home.php';
            break;
        case 'shop':
            if (isset($_POST['keyword']) && ($_POST['keyword'] != 0)){
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
                // echo $iddm;
                // die();
            }else{
                $iddm = 0;
            }
            $products = loadAllPro3($keyword,$iddm);
            $tendm = load_ten_dm($iddm);
            include "views/sanpham.php";
            break;
            
        case 'details':
            if(isset($_GET['idpro']) && $_GET['idpro']>0){
                $id_sanpham = $_GET['idpro'];
                $colors=getAllColorsById($id_sanpham);
                if(isset($_GET['idcolor'])){
                    $id_color=$_GET['idcolor'];
                    $sizes=getAllSizesOfColor($id_sanpham,$id_color);
                }else{
                    $sizes=getAllSizesById($id_sanpham);
                }
                $onePro = loadOne_pro($id_sanpham);
                
                include_once './views/details.php';
                view($id_sanpham);
            }else{
                include_once './views/home.php';
            }
            

            break;
        case 'chooseColor':
            $id_sanpham=$_GET['idpro'];
            if(isset($_POST['colors'])){
                $id_color=$_POST['colors'];
                if(isset($_POST['sizes'])){
                    $id_size=$_POST['sizes'];
                    header("Location: index.php?act=details&idpro=$id_sanpham&idcolor=$id_color&idsize=$id_size");
                }else{
                    header("Location: index.php?act=details&idpro=$id_sanpham&idcolor=$id_color");
                }
            }
            
            break;
        case 'addToCart':
            
            break;
        case 'dangky':
            $ten_dang_nhap = "";
            $email = "";
            $mat_khau = "";

            $errTenDangNhap = "";
            $errEmail = "";
            $errPass = "";
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                // echo "<pre>";
                //  print_r($_POST);
                //  print_r($_FILES);
                //  die();
                // echo "</pre>";
                $ten_dang_nhap = $_POST["ten_dang_nhap"];
                $email = $_POST["email"];
                $mat_khau = $_POST["mat_khau"];

                // print_r([$ten_dang_nhap,$email,$mat_khau]);
                // die();
                

                $isCheck = true;
                if(!$ten_dang_nhap){
                    $isCheck = false;
                    $errTenDangNhap = 'Bạn không được để trống tên đăng nhập';
                }
                if(!$email){
                    $isCheck = false;
                    $errEmail = 'Bạn không được để trống email';
                }
                if(!$mat_khau){
                    $isCheck = false;
                    $errPass = 'Bạn không được để trống pass';
                }
                if($isCheck){
                    insert_taikhoan($ten_dang_nhap,$email,$mat_khau);
                    $thongbao = "Thêm dữ liệu thành công";
                }
            }
            include "views/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            $ten_dang_nhap = "";
            $mat_khau = "";

            $errTenDangNhap = "";
            $errPass = "";
            
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $ten_dang_nhap = $_POST["ten_dang_nhap"];
                $mat_khau = $_POST["mat_khau"];
                $checkuser = checkuser($ten_dang_nhap, $mat_khau);

                $isCheck = true;
                if(!$ten_dang_nhap){
                    $isCheck = false;
                    $errTenDangNhap = 'Bạn không được để trống tên đăng nhập';
                }
                if(!$mat_khau){
                    $isCheck = false;
                    $errPass = 'Bạn không được để trống pass';
                }
                
                if($isCheck){
                    if (is_array($checkuser)) {
                        $_SESSION['nguoidung'] = $checkuser;
                        $thongbao = "Đăng nhập thành công";
                        // header('Location: index.php');
                    } else {
                        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
                    }
                }
            }
            include "views/taikhoan/dangnhap.php";
            break;
        default:
            # code...
            break;
    }
    include_once './views/footer.php';

?>