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
        $sql = "SELECT * FROM sanpham JOIN bienthe ON sanpham.id_san_pham = bienthe.id_sanpham WHERE sanpham.kich_hoat=1";
        if($keyword != ""){
            $sql .= " and ten_san_pham like '%".$keyword."%'";
        }
        if($iddm > 0){
            $sql .= " AND id_danhmuc = '".$iddm."' ";
        }
        $sql .= " ORDER BY id_danhmuc desc";
        // echo $sql;
        // die();
        $list = pdo_query($sql);
        return $list;
    }

    function loadAllProducts(){
        $sql="SELECT DISTINCT id_sanpham,ten_san_pham,gia,hinh_anh,giam_gia,ten_danh_muc FROM bienthe JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN danhmuc ON danhmuc.id_danh_muc=sanpham.id_danhmuc WHERE sanpham.kich_hoat=1";
        $list = pdo_query($sql);
        return $list;
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
        $sql="SELECT ten_san_pham,gia,giam_gia,mo_ta,hinh_anh,id_danhmuc FROM bienthe JOIN sanpham ON bienthe.id_sanpham=sanpham.id_san_pham WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function getAllColorsById($id_sanpham){
        $sql="SELECT id_mausac,ten_mau_sac,ma_mau,id_mau_sac FROM bienthe JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query($sql);
        return $sanpham;
    }
    function getAllSizesById($id_sanpham){
        $sql="SELECT DISTINCT id_kichco,id_kich_co,ten_kich_co FROM bienthe JOIN kichco ON bienthe.id_kichco=kichco.id_kich_co WHERE id_sanpham=$id_sanpham";
        $sanpham=pdo_query($sql);
        return $sanpham;
    }
    function loadOthers_pro($id_sanpham,$id_danhmuc){
        $sql="SELECT DISTINCT ten_san_pham,hinh_anh,gia,giam_gia,id_sanpham,id_danhmuc,id_san_pham,ten_danh_muc FROM bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id_danh_muc 
        WHERE id_sanpham<>$id_sanpham AND id_danhmuc=$id_danhmuc";
        $list=pdo_query($sql);
        return $list;
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
?>