<?php
    include_once 'headeradmin.php';
    include_once 'boxdanhmuc.php';
    include_once '../models/pdo.php';
    include_once '../models/danhMuc.php';
    
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
        }
    }
    else{
        include "homeadmin.php";
    }
    include_once 'footeradmin.php';
    include_once '../models/pdo.php';
    include_once '../models/danhMuc.php';


    
?>