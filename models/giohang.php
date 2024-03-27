<?php
    // lấy sản phẩm từ chi tiết
    function getVariantById($id_sanpham,$id_color,$id_size){
        $sql="SELECT bienthe.id_bien_the,gia,giam_gia,ten_san_pham,hinh_anh,ten_kich_co,ten_mau_sac FROM bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        WHERE id_sanpham=$id_sanpham AND id_mausac=$id_color AND id_kichco=$id_size";
        $variant = pdo_query_one($sql);
        return $variant;
    }
    // lấy sản phẩm từ index
    function getVariantByIdVar($id_bien_the){
        $sql="SELECT bienthe.id_bien_the,gia,giam_gia,ten_san_pham,hinh_anh,ten_kich_co,ten_mau_sac FROM bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        WHERE id_bien_the=$id_bien_the";
        $variant = pdo_query_one($sql);
        return $variant;
    }
?>