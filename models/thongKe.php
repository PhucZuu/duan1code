<?php
function loadAll_thongke() {
    $sql = "SELECT 
        danhmuc.ten_danh_muc,
        danhmuc.id_danh_muc,
        COUNT(DISTINCT sanpham.id_san_pham) AS so_san_pham,
        MAX(bienthe.gia * ((100 - bienthe.giam_gia) / 100)) AS gia_cao_nhat,
        MIN(bienthe.gia * ((100 - bienthe.giam_gia) / 100)) AS gia_thap_nhat,
        SUM(DISTINCT bienthe.gia * ((100 - bienthe.giam_gia) / 100)) / COUNT(DISTINCT sanpham.id_san_pham) AS gia_trung_binh 
    FROM 
        danhmuc
    INNER JOIN 
        sanpham ON danhmuc.id_danh_muc = sanpham.id_danhmuc
    INNER JOIN 
        bienthe ON sanpham.id_san_pham = bienthe.id_sanpham
    WHERE 
        danhmuc.kich_hoat = 1
        AND sanpham.kich_hoat = 1
    GROUP BY 
        danhmuc.id_danh_muc, danhmuc.ten_danh_muc";
    $listtke = pdo_query($sql);
    return $listtke;
}


function loadAll_doanhthu($ngay,$thang,$nam){
    $sql = "SELECT 
            dm.ten_danh_muc,
            SUM(ctdh.so_luong) AS so_luong_ban,
            SUM(ctdh.thanh_tien) AS doanh_thu
        FROM 
            danhmuc dm
        INNER JOIN 
            sanpham sp ON dm.id_danh_muc = sp.id_danhmuc
        INNER JOIN 
            bienthe bt ON sp.id_san_pham = bt.id_sanpham
        INNER JOIN 
            chitietdonhang ctdh ON bt.id_bien_the = ctdh.id_bienthe
        INNER JOIN 
            donhang dh ON ctdh.id_donhang = dh.id_don_hang
        WHERE 
            dm.kich_hoat = 1
            AND sp.kich_hoat = 1
            AND dh.id_trangthai = 1
            AND YEAR(dh.ngay_dat_hang) = $nam
            AND MONTH(dh.ngay_dat_hang) = $thang";
if($ngay != "all"){
    $sql .= " AND DAY(dh.ngay_dat_hang) = $ngay";
}
$sql .= "  GROUP BY 
dm.id_danh_muc, dm.ten_danh_muc;";
    
    $doanhthu = pdo_query($sql);
    return $doanhthu;
}


function loadAll_luotban($ngay, $thang, $nam, $sort) {
    $sql = "SELECT sp.ten_san_pham,
        sp.id_san_pham,
        SUM(ctdh.so_luong) AS so_luong_ban,
        (SELECT SUM(bt.so_luong) 
         FROM bienthe bt 
         WHERE bt.id_sanpham = sp.id_san_pham) AS so_luong_con_lai,
        SUM(ctdh.thanh_tien) AS doanh_thu
    FROM chitietdonhang ctdh
    INNER JOIN bienthe bt ON ctdh.id_bienthe = bt.id_bien_the
    INNER JOIN sanpham sp ON bt.id_sanpham = sp.id_san_pham
    INNER JOIN donhang dh ON ctdh.id_donhang = dh.id_don_hang
    WHERE dh.thanh_toan = 1
    AND YEAR(dh.ngay_dat_hang) = $nam
    AND MONTH(dh.ngay_dat_hang) = $thang";
    if ($ngay != "all") {
        $sql .= " AND DAY(dh.ngay_dat_hang) = $ngay";
    }
    $sql .= " GROUP BY sp.ten_san_pham, sp.id_san_pham
    ORDER BY so_luong_ban $sort, doanh_thu $sort
    LIMIT 3";
    
    $luotban = pdo_query($sql);
    return $luotban;
}



function thang2($thang,$nam) {
    if($thang == 2)
    {return ($nam % 4 == 0 && ($nam % 100 != 0 || $nam % 400 == 0)) ? 29 : 28;}
    else{return 31;}
    
}
?>