<?php
    include_once 'headeradmin.php';
    include_once 'boxdanhmuc.php';
    include_once '../models/pdo.php';
    include_once '../models/danhMuc.php';
    include_once '../models/SanPham.php';
    include_once '../models/taikhoan.php';
    include_once '../models/binhLuan.php';
    include_once '../models/thongKe.php';
    
    if(isset($_GET["act"])){
        $act = $_GET["act"];
        switch ($act){
            case 'adddm':
                $ten_danh_muc = '';
                $errIddm = '';
                $errTendm = '';

                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_danh_muc = $_POST['ten_danh_muc'];

                    $isCheck = true;
                    if(!$ten_danh_muc){
                        $isCheck = false;
                        $errTendm = 'Bạn không được để trống tên danh mục';
                    }
                    if($isCheck){
                        insert_danhmuc($ten_danh_muc);
                        $thongbao = "Thêm thành công";
                    }
                    
                }
                include "danhmuc/add.php";
                break;

            case 'listdm':
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if(isset($_GET['id_danh_muc'])&&(($_GET['id_danh_muc'])>0)){
                    $id_danh_muc = $_GET['id_danh_muc'];
                    delete_danhmuc($id_danh_muc);
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

                case 'suadm':
                    $id_danh_muc = '';
                    $ten_danh_muc = '';
                    $errIddm = '';
                    $errTendm = '';
                    if(isset($_GET['id_danh_muc'])&&(($_GET['id_danh_muc'])>0)){
                        $id_danh_muc = $_GET['id_danh_muc'];
                        // echo $id_danh_muc;
                        // die();
                        $dm = loadone_danhmuc($id_danh_muc);
                    }
                    include "danhmuc/update.php";
                    break;

                case 'updatedm':
                    $id_danh_muc = '';
                    $ten_danh_muc = '';
                    $errIddm = '';
                    $errTendm = '';
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id_danh_muc = $_POST['id_danh_muc'];
                        $ten_danh_muc = $_POST['ten_danh_muc'];

                        // echo '<pre>';
                        // print_r([$id_danh_muc,$ten_danh_muc]);
                        // echo '</pre>';

                        $isCheck = true;
                        if(!$ten_danh_muc){
                            $isCheck = false;
                            $errTendm = 'Bạn không được để trống tên danh mục';
                        }
                        if($isCheck){
                            update_danhmuc($id_danh_muc,$ten_danh_muc);
                            //thông báo đã thực thi xong
                            $thongbao = "Cập nhật thành công";
                            
                        }
                    }
                    $listdanhmuc = loadAll_danhmuc();
                    
                    include "danhmuc/update.php";
                    // include "danhmuc/list.php";
                    break;
                case 'listsp':
                    $listsp=loadAllPro();
                    include './sanpham/list.php';
                    break;
                case 'addsp':
                    $errNameProduct='';
                    $errImage='';
                    $errDescription='';
                    $allowed=['jpg','jpeg','png'];
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $check=true;
                        $id_danhmuc=$_POST['id_danhmuc'];
                        $ten_san_pham=$_POST['ten_san_pham'];
                        $hinh_anh=$_FILES['hinh_anh']['name'];
                        $mo_ta=$_POST['mo_ta'];
                        if($ten_san_pham==""){
                            $errNameProduct="Tên sản phẩm không được để trống";
                            $check=false;
                        }
                        if($hinh_anh==""){
                            $errImage="Hình ảnh sản phẩm không được để trống";
                            $check=false;
                        }else{
                            $img_ex=pathinfo($hinh_anh, PATHINFO_EXTENSION);
                            if(!in_array($img_ex,$allowed)){
                                $errImage="Không đúng định dạng ảnh";
                                $check=false;
                            }
                        }
                        if($mo_ta==""){
                            $errDescription="Mô tả sản phẩm không được để trống";
                            $check=false;
                        }
                        if($check){
                            $target_dir='../uploads/';
                            $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                            if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                insert_product($id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta);
                                $thongbao = "Thêm thành công";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }
                        }else{
                            $thongbao="Thêm thất bại";
                        }
                        
                    }
                    $listdanhmuc = loadAll_danhmuc();
                    include './sanpham/add.php';
                    break;
                case 'suasp':
                    $errNameProduct='';
                    $errImage='';
                    $errDescription='';
                    if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                        $sp=loadOneProduct($_GET['id_san_pham']);
                    }
                    $listdanhmuc=loadAll_danhmuc();
                    include ('sanpham/update.php');
                    break;
                case 'updatesp':
                    $errNameProduct='';
                    $errImage='';
                    $errDescription='';
                    $allowed=['jpg','jpeg','png'];
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $check=true;
                        $id_san_pham=$_POST['id_san_pham'];
                        $id_danhmuc=$_POST['id_danhmuc'];
                        $ten_san_pham=$_POST['ten_san_pham'];
                        $hinh_anh=$_FILES['hinh_anh']['name'];
                        $mo_ta=$_POST['mo_ta'];
                        // echo "<pre>";
                        // print_r([$id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta]);
                        // die;
                        if($ten_san_pham==""){
                            $errNameProduct="Tên sản phẩm không được để trống";
                            $check=false;
                        }
                        if($hinh_anh){
                            $img_ex=pathinfo($hinh_anh, PATHINFO_EXTENSION);
                            if(!in_array($img_ex,$allowed)){
                                $errImage="Không đúng định dạng ảnh";
                                $check=false;
                            }else{
                                $target_dir='../uploads/';
                                $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                } else {
                                    // echo "Sorry, there was an error uploading your file.";
                                }
                            }
                        }else{
                            $hinh_anh="";
                        }
                        if($mo_ta==""){
                            $errDescription="Mô tả sản phẩm không được để trống";
                            $check=false;
                        }
                        if($check){
                            update_product($id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta);
                            header('Location: index.php?act=listsp');
                        }else{
                            if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                                $sp=loadOneProduct($_GET['id_san_pham']);
                            }
                            $listdanhmuc=loadAll_danhmuc();
                            include 'sanpham/update.php';
                        }
                    }
                    
                    break;
                case 'xoasp':
                    //kiểm tra id có tồn tại ko để xóa
                    if(isset($_GET['id_san_pham'])&&(($_GET['id_san_pham'])>0)){
                        delete_product($_GET['id_san_pham']);
                    }
                    header('Location: index.php?act=listsp');
                case 'listbt':
                    if(isset($_GET['id_san_pham'])&&(($_GET['id_san_pham'])>0)){
                        $id_san_pham=$_GET['id_san_pham'];
                        $listVariant=loadAllVariant($id_san_pham);
                    }
                    include 'bienthe/list.php';
                    break;
                case 'addbt':
                    $errPrice='';
                    $errQuantity='';
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $check=true;
                        $id_sanpham=$_POST['id_sanpham'];
                        $id_kichco=$_POST['id_kichco'];
                        $id_mausac=$_POST['id_mausac'];
                        $gia=$_POST['gia'];
                        $so_luong=$_POST['so_luong'];
                        $giam_gia=$_POST['giam_gia'];
                        if($gia==""){
                            $errPrice="Giá sản phẩm không được để trống";
                            $check=false;
                        }
                        if($so_luong==""){
                            $errQuantity="Số lượng sản phẩm không được để trống";
                            $check=false;
                        }
                        if(!$giam_gia){
                            $giam_gia=0;
                        }
                        if($check){
                            insert_variant($id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia);
                            $thongbao="Thêm thành công";
                        }else{
                            $thongbao="Thêm thất bại";
                        }
                        // echo "<pre>";
                        // print_r([$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia]);
                        // die;
                    }
                    $id_sanpham=$_GET['id_san_pham'];
                    $sizes=loadAllSizes();
                    $colors=loadAllColors();
                    include 'bienthe/add.php';
                    break;
                case 'suabt':
                    $errPrice='';
                    $errQuantity='';
                    if(isset($_GET['id_bien_the'])&&($_GET['id_bien_the']>0)){
                        $variant=loadOne_variant($_GET['id_bien_the']);
                    }
                    $sizes=loadAllSizes();
                    $colors=loadAllColors();
                    include ('bienthe/update.php');
                    break;
                case 'updatebt':
                    $errPrice='';
                    $errQuantity='';
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $check=true;
                        $id_bien_the=$_POST['id_bien_the'];
                        $id_sanpham=$_POST['id_sanpham'];
                        $id_kichco=$_POST['id_kichco'];
                        $id_mausac=$_POST['id_mausac'];
                        $gia=$_POST['gia'];
                        $so_luong=$_POST['so_luong'];
                        $giam_gia=$_POST['giam_gia'];
                        if($gia==""){
                            $errPrice="Giá sản phẩm không được để trống";
                            $check=false;
                        }
                        if($so_luong==""){
                            $errQuantity="Số lượng sản phẩm không được để trống";
                            $check=false;
                        }
                        if(!$giam_gia){
                            $giam_gia=0;
                        }
                        if ($check) {
                            update_variant($id_bien_the,$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia);
                            header("Location: index.php?act=listbt&id_san_pham=$id_sanpham");
                        }else{
                            if(isset($_GET['id_bien_the'])&&($_GET['id_bien_the']>0)){
                                $variant=loadOne_variant($_GET['id_bien_the']);
                            }
                            $sizes=loadAllSizes();
                            $colors=loadAllColors();
                            include ('bienthe/update.php');
                        }
                        // echo "<pre>";
                        // print_r([$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia]);
                        // die;
                    }
                    break;
                case 'xoabt':
                    if(isset($_GET['id_bien_the'])&&($_GET['id_bien_the']>0)){
                        $variant=loadOne_variant($_GET['id_bien_the']);
                        extract($variant);
                        delete_variant($_GET['id_bien_the']);
                        header("Location: index.php?act=listbt&id_san_pham=$id_sanpham");
                    }
                    break;

                case "listtk":
                    $listtaikhoan = loadAll_taikhoan();
                    include "nguoidung/list.php";
                    break;
                case "suatk":
                    $ten_dang_nhap = "";
                    $email = "";
                    $mat_khau = "";
                    $ho_va_ten = "";
                    $hinh_anh = "";
                    $so_dien_thoai = "";
                    $dia_chi = "";

                    $errTenDangNhap = "";
                    $errEmail = "";
                    $errPass = "";
                    $errImage = "";
                    $errName = "";
                    $errSdt = "";
                    $errDiaChi = "";
                    if(isset($_GET['id_nguoi_dung'])&&(($_GET['id_nguoi_dung'])>0)){
                        $id_nguoi_dung = $_GET['id_nguoi_dung'];
                        $tk = loadone_taikhoan($id_nguoi_dung);
                        // print_r($tk);
                    }
                    include "nguoidung/update.php";
                    break;
                 

                case 'updatetk':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        if(isset($_POST['id_nguoi_dung'], $_POST['ten_dang_nhap'], $_POST['email'],$_POST['ho_va_ten'], $_POST['so_dien_thoai'], $_POST['dia_chi'])) {
                            $id_nguoi_dung = $_POST['id_nguoi_dung'];
                            $ten_dang_nhap = isset($_POST['ten_dang_nhap']) ? $_POST['ten_dang_nhap'] : '';
                            $email = isset($_POST['email']) ? $_POST['email'] : '';
                            $so_dien_thoai = isset($_POST['so_dien_thoai']) ? $_POST['so_dien_thoai'] : '';
                            $ho_va_ten = isset($_POST['ho_va_ten']) ? $_POST['ho_va_ten'] : '';
                            $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : ''; 
                            $vai_tro = isset($_POST['vai_tro']) ? $_POST['vai_tro'] : ''; 
                            $hinh_anh = $_FILES['hinh_anh']['name'];
                            $target_dir="./uploads/";
                            $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                            if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " đã Uploads.";
                            } else {
                                //echo "Không Uploads được file";
                            }                   
                            update_taikhoan_admin($id_nguoi_dung,$ten_dang_nhap,$ho_va_ten,$hinh_anh,$email,$so_dien_thoai,$dia_chi,$vai_tro);
                            // $_SESSION['nguoidung'] = checkuser($ten_dang_nhap, $mat_khau);
                            $thongbao = "Chỉnh sửa tài khoản thành công!";
                            header('Location: index.php?act=listtk');           
                        }else{
                            echo 'Không update được';
                        }
                    }      
                    // include "views/nguoidung/update.php";
                    break;

                case 'listbl':
                    $listbinhluan = loadAll_binhluan(0);
                    include 'binhluan/list.php';
                    break;
                case 'xoabl':
                    if(isset($_GET['id_binh_luan'])&&(($_GET['id_binh_luan'])>0)){
                        $id_binh_luan = $_GET['id_binh_luan'];
                        // echo $id_binh_luan; die;
                        delete_binhluan($id_binh_luan);
                    }
                    $listbinhluan = loadAll_binhluan(0);
                    include "binhluan/list.php";
                    break;
                case 'thongke':
                    $listtke = loadAll_thongke();
                    include "thongke/list.php";
                    break;
                case 'bieudo':
                    $listtke = loadAll_thongke();
                    include "thongke/bieudo.php";
                    break;
                case 'doanhthu':
                    $doanhthu =loadAll_doanhthu();
                    include "thongke/doanhthu.php";
                    break;
                case 'luotban':
                    $doanhthu =loadAll_doanhthu();
                    include "thongke/luotban.php";
                    break;
        }
    }
    else{
        include "homeadmin.php";
    }
    include_once 'footeradmin.php';
    


    
?>