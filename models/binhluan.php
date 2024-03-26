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
                nguoidung.id_nguoi_dung, 
                nguoidung.hinh_anh, 
                binhluan.id_sanpham, 
                binhluan.ngay_binh_luan,
                sanpham.ten_san_pham
                FROM binhluan 
                JOIN nguoidung ON binhluan.id_nguoidung = nguoidung.id_nguoi_dung
                JOIN sanpham ON binhluan.id_sanpham = sanpham.id_san_pham
                WHERE 1";
        if($idpro > 0) $sql .= " AND binhluan.id_sanpham = $idpro";
        $sql .= " ORDER BY binhluan.ngay_binh_luan DESC"; 
        $listbinhluan = pdo_query($sql);
        return $listbinhluan;
    }

    function delete_binhluan($id_binh_luan){
        $sql = "DELETE FROM binhluan WHERE id_binh_luan=".$id_binh_luan;
        pdo_execute($sql);
    }
?>