<?php
    include_once 'headeradmin.php';
    include_once 'boxdanhmuc.php';
    include_once '../models/pdo.php';
    include_once '../models/danhMuc.php';
    include_once '../models/SanPham.php';
    
    if(isset($_GET["act"])){
        $act = $_GET["act"];
        switch ($act){
            case 'adddm':
                //kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_danh_muc = $_POST['ten_danh_muc'];

                    insert_danhmuc($ten_danh_muc);

                    //thông báo đã thực thi xong
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;

            case 'listdm':
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                //kiểm tra id có tồn tại ko để xóa
                if(isset($_GET['id_danh_muc'])&&(($_GET['id_danh_muc'])>0)){
                    $id_danh_muc = $_GET['id_danh_muc'];
                    // echo $id_danh_muc;
                    delete_danhmuc($id_danh_muc);

                }

                // trong file pdo phần này có return kết quả trả về nền ta cần gán về 1 giá trị
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;

                case 'suadm':
                    //kiểm tra id có tồn tại ko để xóa
                    if(isset($_GET['id_danh_muc'])&&(($_GET['id_danh_muc'])>0)){
                        $id_danh_muc = $_GET['id_danh_muc'];
                        // echo $id_danh_muc;
                        // die();
                        $dm = loadone_danhmuc($id_danh_muc);
                    }
                    include "danhmuc/update.php";
                    break;

                case 'updatedm':
                    //làm như phần act ở trên
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id_danh_muc = $_POST['id_danh_muc'];
                        $ten_danh_muc = $_POST['ten_danh_muc'];

                        // echo '<pre>';
                        // print_r([$id_danh_muc,$ten_danh_muc]);
                        // echo '</pre>';


                        update_danhmuc($id_danh_muc,$ten_danh_muc);
                        //thông báo đã thực thi xong
                        $thongbao = "Cập nhật thành công";
                    }
                    $listdanhmuc = loadAll_danhmuc();
                    
                    include "danhmuc/list.php";
                    break;
                case 'listsp':
                    $listsp=loadAllPro();
                    include './sanpham/list.php';
                    break;
                case 'addsp':
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $id_danhmuc=$_POST['id_danhmuc'];
                        $ten_san_pham=$_POST['ten_san_pham'];
                        $hinh_anh=$_FILES['hinh_anh']['name'];
                        $mo_ta=$_POST['mo_ta'];
                        
                        if($hinh_anh){
                            $target_dir='../uploads/';
                            $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                            if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                                insert_product($id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta);
                                $thongbao = "Thêm thành công";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }
                        }else{
                            $thongbao = "Thêm thất bại";
                        }
                        
                    }
                    $listdanhmuc = loadAll_danhmuc();
                    include './sanpham/add.php';
                    break;
                case 'suasp':
                    if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                        $sp=loadOne_pro($_GET['id_san_pham']);
                    }
                    $listdanhmuc=loadAll_danhmuc();
                    include ('sanpham/update.php');
                    break;
                case 'updatesp':
                    $id_san_pham=$_POST['id_san_pham'];
                    $id_danhmuc=$_POST['id_danhmuc'];
                    $ten_san_pham=$_POST['ten_san_pham'];
                    $hinh_anh=$_FILES['hinh_anh']['name'];
                    $mo_ta=$_POST['mo_ta'];
                    // echo "<pre>";
                    // print_r([$id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta]);
                    // die;
                    if ($hinh_anh) {
                        $target_dir='../uploads/';
                        $target_file= $target_dir . basename($_FILES['hinh_anh']['name']);
                        if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                        } else {
                            // echo "Sorry, there was an error uploading your file.";
                        }
                    }else{
                        $hinh_anh="";
                    }
                    update_product($id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta);
                    header('Location: index.php?act=listsp');
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
                    if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                        $id_sanpham=$_POST['id_sanpham'];
                        $id_kichco=$_POST['id_kichco'];
                        $id_mausac=$_POST['id_mausac'];
                        $gia=$_POST['gia'];
                        $so_luong=$_POST['so_luong'];
                        $giam_gia=$_POST['giam_gia'];

                        if(!$giam_gia){
                            $giam_gia=0;
                        }
                        // echo "<pre>";
                        // print_r([$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia]);
                        // die;
                        insert_variant($id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia);
                        $thongbao="Thêm thành công";
                    }
                    $id_sanpham=$_GET['id_san_pham'];
                    $sizes=loadAllSizes();
                    $colors=loadAllColors();
                    include 'bienthe/add.php';
                    break;
                case 'suabt':
                    if(isset($_GET['id_bien_the'])&&($_GET['id_bien_the']>0)){
                        $variant=loadOne_variant($_GET['id_bien_the']);
                    }
                    $sizes=loadAllSizes();
                    $colors=loadAllColors();
                    include ('bienthe/update.php');
                    break;
                case 'updatebt':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id_bien_the=$_POST['id_bien_the'];
                        $id_sanpham=$_POST['id_sanpham'];
                        $id_kichco=$_POST['id_kichco'];
                        $id_mausac=$_POST['id_mausac'];
                        $gia=$_POST['gia'];
                        $so_luong=$_POST['so_luong'];
                        $giam_gia=$_POST['giam_gia'];

                        if(!$giam_gia){
                            $giam_gia=0;
                        }
                        // echo "<pre>";
                        // print_r([$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia]);
                        // die;
                        update_variant($id_bien_the,$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia);
                        header("Location: index.php?act=listbt&id_san_pham=$id_sanpham");
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
        }
    }
    else{
        include "homeadmin.php";
    }
    include_once 'footeradmin.php';
    


    
?>