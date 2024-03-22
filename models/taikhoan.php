<?php

    function insert_taikhoan($ten_dang_nhap,$email,$mat_khau){
        $sql = "INSERT INTO nguoidung(ten_dang_nhap,email,mat_khau)
                VALUES ('$ten_dang_nhap','$email','$mat_khau')";
        // echo $sql;
        pdo_execute($sql);
    }
    function checkuser($ten_dang_nhap, $mat_khau){
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap='".$ten_dang_nhap."' AND mat_khau='".$mat_khau."'";
        $us = pdo_query_one($sql);
        return $us;
    }
?>