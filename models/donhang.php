<?php
    function loadAllOrders(){
        $sql="SELECT id_don_hang,ten_trang_thai,ho_va_ten,email,so_dien_thoai,dia_chi,trang_thai_thanh_toan,ngay_dat_hang,tong_thanh_tien 
        FROM donhang JOIN trangthai ON donhang.id_trangthai=trangthai.id_trang_thai 
        JOIN thanhtoan ON donhang.thanh_toan=thanhtoan.id_thanh_toan";
        $orders=pdo_query($sql);
        return $orders;
    }
    function statusOrder($id_don_hang){
        $sql="SELECT id_trangthai FROM donhang WHERE id_don_hang=$id_don_hang";
        $order=pdo_query_one($sql);
        return $order;
    }
    function loadAllStatusOrders(){
        $sql="SELECT * FROM trangthai";
        $status=pdo_query($sql);
        return $status;
    }
    function updateStatusOrder($id_don_hang,$id_trangthai){
        $sql="UPDATE donhang SET id_trangthai=$id_trangthai WHERE id_don_hang=$id_don_hang";
        pdo_execute($sql);
    }
    function getAllOrdersDetails($id_don_hang){
        $sql="SELECT hinh_anh,ten_san_pham,ten_mau_sac,ten_kich_co,chitietdonhang.gia,chitietdonhang.so_luong,thanh_tien FROM chitietdonhang 
        JOIN bienthe ON bienthe.id_bien_the=chitietdonhang.id_bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        WHERE id_donhang=$id_don_hang";
        $ordersDetails=pdo_query($sql);
        return $ordersDetails;
    }
    function loadAllOrdersByPhone($so_dien_thoai){
        $sql="SELECT id_don_hang,id_trangthai,ho_va_ten,so_dien_thoai,dia_chi,email,trang_thai_thanh_toan,ten_trang_thai,tong_thanh_tien FROM donhang 
        JOIN trangthai ON trangthai.id_trang_thai=donhang.id_trangthai 
        JOIN thanhtoan ON thanhtoan.id_thanh_toan=donhang.thanh_toan 
        WHERE so_dien_thoai=$so_dien_thoai";
        $orders=pdo_query($sql);
        return $orders;
    }
    function loadAllOrdersDetailsByIdOrder($id_don_hang){
        $sql="SELECT id_donhang,tong_thanh_tien,hinh_anh,chitietdonhang.so_luong,chitietdonhang.gia,thanh_tien,ten_mau_sac,ten_kich_co,ten_san_pham FROM chitietdonhang 
        JOIN donhang ON donhang.id_don_hang=chitietdonhang.id_donhang 
        JOIN bienthe ON chitietdonhang.id_bienthe=bienthe.id_bien_the 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        WHERE id_donhang=$id_don_hang";
        $orders=pdo_query($sql);
        return $orders;
    }
    function cancelOrder($id_don_hang,$id_trangthai){
        $sql="UPDATE donhang SET id_trangthai=$id_trangthai WHERE id_don_hang=$id_don_hang";
        pdo_execute($sql);
    }
    function getNoteOrder($id_don_hang){
        $sql="SELECT ghi_chu FROM donhang WHERE id_don_hang=$id_don_hang";
        $note=pdo_query($sql);
        return $note;
    }
?>