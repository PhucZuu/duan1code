<?php
function loadAll_thongke(){
    $sql = "SELECT 
    danhmuc.ten_danh_muc,
    danhmuc.id_danh_muc,
    COUNT(DISTINCT sanpham.id_san_pham) AS so_san_pham,
    MAX(bienthe.gia) AS gia_cao_nhat,
    MIN(bienthe.gia) AS gia_thap_nhat,
    AVG(bienthe.gia) AS gia_trung_binh,
    SUM(ctdh.so_luong) AS so_luong_ban,
    SUM(ctdh.thanh_tien) AS doanh_thu
FROM 
    danhmuc
INNER JOIN 
    sanpham ON danhmuc.id_danh_muc = sanpham.id_danhmuc
INNER JOIN 
    bienthe ON sanpham.id_san_pham = bienthe.id_sanpham
INNER JOIN 
    chitietdonhang ctdh ON bienthe.id_bien_the = ctdh.id_bienthe
INNER JOIN 
    donhang dh ON ctdh.id_donhang = dh.id_don_hang
WHERE 
    danhmuc.kich_hoat = 1
    AND sanpham.kich_hoat = 1
    AND dh.id_trangthai = 1
GROUP BY 
    danhmuc.id_danh_muc, danhmuc.ten_danh_muc;";
$listtke = pdo_query($sql);
return $listtke;
}

?>