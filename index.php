<?php
    // include hoặc require tất cả các file có trên hệ thống (controllers/commons/models). Views ở trong controllers
    // require commons
    

    // require controllers
    
    // require models
    include_once './models/pdo.php';
    include_once './models/SanPham.php';
    include_once './models/danhMuc.php';
    // Điều hướng
    include_once './views/header.php';

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
            $dssp = loadAllPro3($keyword,$iddm);
            include "views/sanpham.php";
            break;
            
        case 'details':
            if(isset($_GET['idpro']) && $_GET['idpro']>0){
                $id_sanpham = $_GET['idpro'];
                $colors=getAllColorsById($id_sanpham);
                $sizes=getAllSizesById($id_sanpham);
                $onePro = loadOne_pro($id_sanpham);
                
                include_once './views/details.php';
            }else{
                include_once './views/home.php';
            }
            break;
        // case 'shop':
        //         $products=loadAllProducts();
        //         include_once './views/shop.php';
        //     break;
        default:
            # code...
            break;
    }
    include_once './views/footer.php';

?>