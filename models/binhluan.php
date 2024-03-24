<?php
    function insert_binhluan($noi_dung,$id_nguoidung,$id_sanpham,$ngay_binh_luan){
        $sql = "INSERT INTO binhluan (noi_dung, id_nguoidung, id_sanpham, ngay_binh_luan) 
        VALUES ('$noi_dung', '$id_nguoidung', '$id_sanpham', '$ngay_binh_luan')";
        pdo_execute($sql);
    }

    function loadAll_binhluan($idpro){
        $sql = "SELECT binhluan.id_binh_luan, 
        binhluan.noi_dung, 
        nguoidung.ho_va_ten, 
        nguoidung.hinh_anh, 
        binhluan.ngay_binh_luan
        FROM binhluan 
        JOIN nguoidung ON binhluan.id_nguoidung = nguoidung.id_nguoi_dung
        WHERE binhluan.id_sanpham = $idpro";
        $listbinhluan = pdo_query($sql);
        return $listbinhluan;
    }
?>