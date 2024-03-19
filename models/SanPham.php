<?php
    function loadAllPro(){
        $sql= "SELECT id_san_pham,id_danhmuc,danhmuc.ten_danh_muc,ten_san_pham,hinh_anh,mo_ta,luot_xem,sanpham.kich_hoat FROM sanpham 
        JOIN danhmuc ON sanpham.id_danhmuc=danhmuc.id_danh_muc WHERE sanpham.kich_hoat=1";
        $list=pdo_query($sql);
        return $list;
    }
    function insert_product($id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta){
        $sql="INSERT INTO sanpham(id_danhmuc,ten_san_pham,hinh_anh,mo_ta) VALUES ('$id_danhmuc','$ten_san_pham','$hinh_anh','$mo_ta')";
        pdo_execute($sql);
    }
    function loadOne_pro($id_san_pham){
        $sql="SELECT * FROM sanpham WHERE id_san_pham=$id_san_pham";
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function update_product($id_san_pham,$id_danhmuc,$ten_san_pham,$hinh_anh,$mo_ta){
        if($hinh_anh){
            $sql="UPDATE sanpham SET id_danhmuc='$id_danhmuc',
                         ten_san_pham='$ten_san_pham',
                         hinh_anh='$hinh_anh',
                         mo_ta='$mo_ta' WHERE id_san_pham=$id_san_pham";
        }else{
            $sql="UPDATE sanpham SET id_danhmuc='$id_danhmuc',
                         ten_san_pham='$ten_san_pham',
                         mo_ta='$mo_ta' WHERE id_san_pham=$id_san_pham";
        }
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
?>