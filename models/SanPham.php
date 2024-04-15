<?php
    function loadAllPro(){
        $sql= "SELECT id_san_pham,id_danhmuc,danhmuc.ten_danh_muc,ten_san_pham,hinh_anh,mo_ta,luot_xem,sanpham.kich_hoat FROM sanpham 
        JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id_danh_muc WHERE sanpham.kich_hoat=1";
        $list=pdo_query($sql);
        return $list;
    }
    function loadAllPro2($keyword,$iddm=0){
        $sql = "SELECT * FROM sanpham WHERE 1";
        if($iddm > 0){
            $sql .= " AND id_danhmuc = '".$iddm."' ";
        }
        $sql .= " ORDER BY id_danhmuc desc";
        $list = pdo_query($sql);
        return $list;
    }
    function loadAllPro3($keyword="",$iddm=0){
        $sql = "SELECT id_san_pham,id_danhmuc,danhmuc.ten_danh_muc,ten_san_pham,hinh_anh,mo_ta,luot_xem,sanpham.kich_hoat FROM sanpham 
        JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id_danh_muc WHERE sanpham.kich_hoat=1";
        if($keyword != ""){
            $sql .= " and ten_san_pham like '%".$keyword."%'";
        }
        if($iddm > 0){
            $sql .= " AND id_danhmuc = '".$iddm."' ";
        }
        // $sql .= " ORDER BY id_danhmuc desc";
        // echo $sql;
        // die();
        $list = pdo_query($sql);
        return $list;
    }

    function load_ten_dm($iddm){
        if($iddm>0){
            //lấy dữ liệu của bản ghi về
            $sql = "select * from danhmuc where id_danh_muc=".$iddm;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $ten_danh_muc;
        }else{
            return "";
        }
    }

    function loadAllProducts(){
        $sql="SELECT DISTINCT id_san_pham,ten_san_pham,hinh_anh,ten_danh_muc FROM sanpham JOIN danhmuc ON danhmuc.id_danh_muc=sanpham.id_danhmuc WHERE sanpham.kich_hoat=1";
        $list = pdo_query($sql);
        return $list;
    }

    //lấy giá của sản phẩm biến thể
    function loadPriceVariant($idPro) {
        $sql = "SELECT id_bien_the,gia, giam_gia FROM bienthe WHERE id_sanpham=$idPro ORDER BY gia DESC";
        $variant = pdo_query_one($sql);
        return $variant;
    }
    function insert_product($id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta){
        $sql="INSERT INTO sanpham(id_danhmuc,ten_san_pham,hinh_anh,mo_ta) VALUES ('$id_danhmuc','$ten_san_pham','$hinh_anh','$mo_ta')";
        pdo_execute($sql);
    }
    function loadOneProduct($id_san_pham){
        $sql="SELECT * FROM sanpham WHERE id_san_pham=$id_san_pham";
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function loadOne_pro($id_sanpham){
        $sql="SELECT id_sanpham,ten_san_pham,gia,giam_gia,mo_ta,luot_xem,hinh_anh,id_danhmuc FROM bienthe JOIN sanpham ON bienthe.id_sanpham=sanpham.id_san_pham WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    // lấy ra màu
    function getAllColorsById($id_sanpham){
        $sql="SELECT DISTINCT id_mau_sac,ten_mau_sac,ma_mau FROM bienthe JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query($sql);
        return $sanpham;
    }
    // lấy size của color
    function getAllSizesOfColor($id_sanpham,$id_color){
        $sql="SELECT bienthe.*, ten_mau_sac, ten_kich_co FROM `bienthe` 
        JOIN mausac ON bienthe.id_mausac = mausac.id_mau_sac 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        WHERE bienthe.id_mausac=$id_color AND id_sanpham=$id_sanpham";
        $sanpham=pdo_query($sql);
        return $sanpham;
    }
    // Lấy ra size
    function getAllSizesById($id_sanpham){
        $sql="SELECT DISTINCT id_kichco,id_kich_co,ten_kich_co FROM bienthe JOIN kichco ON bienthe.id_kichco=kichco.id_kich_co WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query($sql);
        return $sanpham;
    }
    function loadOthers_pro($id_sanpham,$id_danhmuc){
        $sql="SELECT id_san_pham,ten_san_pham,hinh_anh,ten_danh_muc FROM sanpham JOIN danhmuc ON danhmuc.id_danh_muc=sanpham.id_danhmuc WHERE sanpham.kich_hoat=1 
        AND id_san_pham<>$id_sanpham AND id_danhmuc=$id_danhmuc LIMIT 4";
        $list=pdo_query($sql);
        return $list;
    }
    function loadPriceVariantOthers($id_sanpham){
        $sql = "SELECT id_bien_the,gia, giam_gia FROM bienthe WHERE id_sanpham=$id_sanpham ORDER BY gia DESC";
        $variant = pdo_query_one($sql);
        return $variant;
    }
    function update_product($id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta){
        if($hinh_anh!=""){
            $sql="UPDATE sanpham SET id_danhmuc='$id_danhmuc',
                         ten_san_pham='$ten_san_pham',
                         hinh_anh='$hinh_anh',
                         mo_ta='$mo_ta' WHERE id_san_pham=$id_san_pham";
        }else{
            $sql="UPDATE sanpham SET id_danhmuc='$id_danhmuc',
                         ten_san_pham='$ten_san_pham',
                         mo_ta='$mo_ta' WHERE id_san_pham=$id_san_pham";
        }
        // echo $sql;
        // die;
        pdo_execute($sql);
    }
    function delete_product($id_san_pham){
        $sql="UPDATE sanpham SET kich_hoat=0 WHERE id_san_pham=$id_san_pham";
        pdo_execute($sql);
    }
    function loadAllVariant($id_san_pham){
        $sql="SELECT id_bien_the,sanpham.ten_san_pham,id_sanpham,kichco.ten_kich_co,mausac.ten_mau_sac,gia,so_luong,giam_gia 
        FROM bienthe JOIN sanpham ON bienthe.id_sanpham=sanpham.id_san_pham 
        JOIN kichco ON bienthe.id_kichco=kichco.id_kich_co 
        JOIN mausac ON bienthe.id_mausac=mausac.id_mau_sac WHERE id_sanpham=$id_san_pham";
        $list=pdo_query($sql);
        return $list;
    }
    function loadAllSizes(){
        $sql="SELECT * FROM kichco";
        $list=pdo_query($sql);
        return $list;
    }
    function loadAllColors(){
        $sql="SELECT * FROM mausac";
        $list=pdo_query($sql);
        return $list;
    }
    function insert_variant($id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia){
        $sql="INSERT INTO bienthe(id_sanpham,id_kichco,id_mausac,gia,so_luong,giam_gia) VALUES 
        ('$id_sanpham','$id_kichco','$id_mausac','$gia','$so_luong','$giam_gia')";
        pdo_execute($sql);
    }
    function loadOne_variant($id_bien_the){
        $sql="SELECT * FROM bienthe WHERE id_bien_the=$id_bien_the";
        $variant=pdo_query_one($sql);
        return $variant;
    }
    function update_variant($id_bien_the,$id_sanpham,$id_kichco,$id_mausac,$gia,$so_luong,$giam_gia){
        $sql="UPDATE bienthe SET id_kichco='$id_kichco',
                                id_mausac='$id_mausac',
                                gia='$gia',
                                so_luong='$so_luong',
                                giam_gia='$giam_gia' WHERE id_bien_the='$id_bien_the'";
        pdo_execute($sql);
    }
    function delete_variant($id_bien_the){
        $sql="DELETE FROM bienthe WHERE id_bien_the=$id_bien_the";
        pdo_execute($sql);
    }

    function load_ten_danhmuc($iddm){
        $sql = "select * from danhmuc where id_danh_muc=".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        // print_r($dm);
        // die();
        return $ten_danh_muc;
    }

    function view($id_sanpham){
        $sql = "UPDATE sanpham SET luot_xem=luot_xem+1 WHERE id_san_pham=$id_sanpham";
        pdo_execute($sql);
    }
    
    function hot() {
        $sql = "SELECT id_san_pham
                FROM sanpham
                ORDER BY luot_xem DESC
                LIMIT 3;
                ";
        $hot = pdo_query($sql);
        $result = array();
        foreach ($hot as $row) {
            $result[] = $row['id_san_pham'];
        }
        return $result;
    }
    function updateQuantityProduct($id_bienthe,$so_luong){
        $sql="UPDATE bienthe SET so_luong=so_luong - $so_luong WHERE id_bien_the=$id_bienthe";
        pdo_execute($sql);
    }
?>