<?php
    // include hoặc require tất cả các file có trên hệ thống (controllers/commons/models). Views ở trong controllers
    // require commons

    ob_start();
    
    // require controllers
    
    session_start();
    if(!isset($_SESSION['myCart'])){
        $_SESSION['myCart']=[];   
    }
    $countProducts=count($_SESSION['myCart']);
    // require models
    include_once './models/pdo.php';
    include_once './models/SanPham.php';
    include_once './models/giohang.php';
    include_once './models/danhMuc.php';
    include_once './models/taikhoan.php';
    // Điều hướng
    include_once './views/header.php';
    $products = loadAllPro();
    $danhMuc = loadAll_danhmuc();
    $hot = hot();

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
        case 'viewCart':
            include 'views/giohang/giohang.php';
            break;
        case 'addToCart':
            if(!isset($_GET['idbt'])){
                $id_sanpham=$_POST['id_sanpham'];
                $id_color=$_POST['id_mausac'];
                $id_size=$_POST['id_kichco'];
                $quantity=(int)$_POST['quantity'];
                $details=getVariantById($id_sanpham,$id_color,$id_size);
            }else{
                $id_bien_the=$_GET['idbt'];
                $details=getVariantByIdVar($id_bien_the);
                $quantity=1;
            }
            extract($details);
            $i=0;
            $isExist=false;
            // kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
            if(isset($_SESSION['myCart'])&&(count($_SESSION['myCart'])>0)){
                foreach($_SESSION['myCart'] as $product){
                    if($product[0]==$id_bien_the){
                        // thay đổi số lượng
                        $quantity+=$product[2];
                        $isExist=true;
                        // cập nhật lại số lượng sản phẩm trong giỏ hàng
                        $_SESSION['myCart'][$i][2]=$quantity;
                        $gia=$gia * ((100 - (int)$giam_gia)/100);
                        // cập nhật lại thành tiền
                        $thanhtien=$gia*$quantity;      
                        $_SESSION['myCart'][$i][7]=$thanhtien;
                        break;
                    }
                    $i++;
                }
            }
            if(!$isExist){
                $gia=$gia * ((100 - (int)$giam_gia)/100);
                $thanhtien=$gia*$quantity;
                $addProduct=[$id_bien_the,$gia,$quantity,$ten_san_pham,$hinh_anh,$ten_kich_co,$ten_mau_sac,$thanhtien];
                array_push($_SESSION['myCart'],$addProduct);
                // echo '<pre>';
                // print_r($_SESSION['myCart']);
                // die;
            }
            header('Location: index.php?act=viewCart');
            break;
        case 'checkout':
            $ten_nguoi_dung='';
            $so_dien_thoai='';
            $dia_chi='';
            $email='';
            if(isset($_SESSION['nguoidung'])){
                $ten_nguoi_dung=$_SESSION['nguoidung']['ho_va_ten'];
                $so_dien_thoai=$_SESSION['nguoidung']['so_dien_thoai'];
                $dia_chi=$_SESSION['nguoidung']['dia_chi'];
                $email=$_SESSION['nguoidung']['email'];
            }
            if(isset($_SESSION['myCart'])){
                $productPrice=$_SESSION['myCart'];  
                // echo "<pre>";
                // print_r($_SESSION['myCart']);die;
            }
            include 'views/giohang/checkout.php';
            break;
        case 'checkoutConfirm':
            
            break;
        case 'deleteProductInCart':
            if(isset($_GET['idProductInCart'])){
                // xoa mang session cart tu vi tri idCart va cat 1 phan tu
                array_splice($_SESSION['myCart'],$_GET['idProductInCart'],1);
            }else{
                $_SESSION['myCart']=[];
            }
            header('Location: index.php?act=viewCart');
            break;
        case 'dangky':
            $ten_dang_nhap = "";
            $email = "";
            $mat_khau = "";
            $ho_va_ten = "";
            $so_dien_thoai = "";
            $dia_chi = "";

            $errTenDangNhap = "";
            $errEmail = "";
            $errPass = "";
            $errName = "";
            $errSdt = "";
            $errDiaChi = "";

            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                // echo "<pre>";
                //  print_r($_POST);
                //  print_r($_FILES);
                //  die();
                // echo "</pre>";
                $ten_dang_nhap = $_POST["ten_dang_nhap"];
                $email = $_POST["email"];
                $mat_khau = $_POST["mat_khau"];
                $ho_va_ten = $_POST["ho_va_ten"];
                $so_dien_thoai = $_POST["so_dien_thoai"];
                $dia_chi = $_POST["dia_chi"];

                // print_r([$ten_dang_nhap,$email,$mat_khau,$ho_va_ten,$so_dien_thoai,$dia_chi]);
                // die();
                

                $isCheck = true;
                
                //xác thực địa chỉ email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isCheck = false;
                    $errEmail = 'Bạn không được để trống email';
                }
                // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay không
                if ($email && email_da_ton_tai($email)) {
                    $isCheck = false;
                    $errEmail = 'Email đã tồn tại trong hệ thống, vui lòng sử dụng email khác.';
                }

                // Kiểm tra tên đăng nhập
                if (!$ten_dang_nhap) {
                    $isCheck = false;
                    $errTenDangNhap = 'Bạn không được để trống tên đăng nhập';
                } else if (ten_dang_nhap_da_ton_tai($ten_dang_nhap)) {
                    $isCheck = false;
                    $errTenDangNhap = 'Tên đăng nhập đã tồn tại trong hệ thống, vui lòng chọn tên khác.';
                }

                if (!$so_dien_thoai) {
                    $isCheck = false;
                    $errSdt = 'Bạn không được để trống số điện thoại';
                } else if (sdt_da_ton_tai($so_dien_thoai)) {
                    $isCheck = false;
                    $errSdt = 'Số điện thoại đã tồn tại trong hệ thống, vui lòng chọn số điện thoại khác.';
                }

                if(!$mat_khau){
                    $isCheck = false;
                    $errPass = 'Bạn không được để trống pass';
                }
                if(!$ho_va_ten){
                    $isCheck = false;
                    $errName = 'Bạn không được để trống họ tên';
                }
                if(!$dia_chi){
                    $isCheck = false;
                    $errDiaChi = 'Bạn không được để trống địa chỉ';
                }
                if($isCheck){
                    insert_taikhoan($ten_dang_nhap,$email,$mat_khau,$ho_va_ten,$so_dien_thoai,$dia_chi);
                    $thongbao = "Đăng ký thành công";
                    // header('Location: index.php');
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
                // print_r($checkuser); die;

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
                        header('Location: index.php');
                    } else {
                        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
                    }
                }
            }
            include "views/taikhoan/dangnhap.php";
            break;

            case "quenmk":
                $ten_dang_nhap = "";
                $email = "";

                $errTenDangNhap = "";
                $errEmail = "";
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $ten_dang_nhap = $_POST["ten_dang_nhap"];
                    $email = $_POST["email"];

                    $isCheck = true;
                    if(!$ten_dang_nhap){
                        $isCheck = false;
                        $errTenDangNhap = 'Bạn không được để trống tên đăng nhập';
                    }
                    if(!$email){
                        $isCheck = false;
                        $errEmail = 'Bạn không được để trống pass';
                    }

                    if($isCheck){
                        $checkmail = checkemail($ten_dang_nhap,$email);
                        if (is_array($checkmail)) {
                            $thongbao = "Mật khẩu của bạn là: " . $checkmail['mat_khau'];
                        } else {
                            $thongbao = "Email này không tồn tại";
                        }
                    }

                }
                include "views/taikhoan/quenmk.php";
                break;
            case 'thoat':
                //xóa hết tất cả session
                session_unset();
                header('Location: index.php');
                break;
            
            
             // Chỉnh sửa tài khoản
        case 'edit_taikhoan':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                if(isset($_POST['id_nguoi_dung'], $_POST['ten_dang_nhap'], $_POST['email'],$_POST['ho_va_ten'], $_POST['so_dien_thoai'], $_POST['dia_chi'])) {
                    $id_nguoi_dung = $_POST['id_nguoi_dung'];
                    $ten_dang_nhap = isset($_POST['ten_dang_nhap']) ? $_POST['ten_dang_nhap'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $so_dien_thoai = isset($_POST['so_dien_thoai']) ? $_POST['so_dien_thoai'] : '';
                    $ho_va_ten = isset($_POST['ho_va_ten']) ? $_POST['ho_va_ten'] : '';
                    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : ''; 
                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir="./uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " đã Uploads.";
                    } else {
                        //echo "Không Uploads được file";
                    }                   
                    update_taikhoan($id_nguoi_dung,$ten_dang_nhap,$ho_va_ten,$hinh_anh,$email,$so_dien_thoai,$dia_chi);
                    $_SESSION['nguoidung'] = checkuser($ten_dang_nhap, $mat_khau);
                    $thongbao = "Chỉnh sửa tài khoản thành công!";
                    header('Location:index.php?act=edit_taikhoan');           
                }else{
                    echo 'Không update được';
                }
            }      
            include "views/taikhoan/updatetk.php";
            break;

            
            case "gioithieu":
                include "views/gioithieu.php";
                break;

           
        default:
            # code...
            break;
    }
    include_once './views/footer.php';

?>