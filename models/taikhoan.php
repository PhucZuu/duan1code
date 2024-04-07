<?php

    function insert_taikhoan($ten_dang_nhap,$email,$mat_khau,$ho_va_ten,$so_dien_thoai,$dia_chi){
        $sql = "INSERT INTO nguoidung(ten_dang_nhap,email,mat_khau,ho_va_ten,so_dien_thoai,dia_chi)
                VALUES ('$ten_dang_nhap','$email','$mat_khau','$ho_va_ten','$so_dien_thoai','$dia_chi')";
        // echo $sql;
        pdo_execute($sql);
    }
    function checkuser($ten_dang_nhap, $mat_khau){
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap='".$ten_dang_nhap."' AND mat_khau='".$mat_khau."'";
        $us = pdo_query_one($sql);
        return $us;
    }
    
    function email_da_ton_tai($email){
        $sql = "SELECT * FROM nguoidung WHERE email = '$email'";
        $em = pdo_query_one($sql);
        return $em;
    }
    function ten_dang_nhap_da_ton_tai($ten_dang_nhap) {
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = '$ten_dang_nhap'";
        $user = pdo_query_one($sql);
        return $user;
    }

    function sdt_da_ton_tai($so_dien_thoai) {
        $sql = "SELECT * FROM nguoidung WHERE so_dien_thoai = '$so_dien_thoai'";
        $user = pdo_query_one($sql);
        return $user;
    }

    function checkemail($ten_dang_nhap,$email){
        //lấy dữ liệu của bản ghi về
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = '$ten_dang_nhap' AND email='".$email."'";
        $mail = pdo_query_one($sql);
        return $mail;
    }

    
    function update_taikhoan($id_nguoi_dung,$ten_dang_nhap,$ho_va_ten,$hinh_anh,$email,$so_dien_thoai,$dia_chi){
        if($hinh_anh!=""){
            $sql = "UPDATE nguoidung SET ten_dang_nhap='".$ten_dang_nhap."', ho_va_ten='".$ho_va_ten."', hinh_anh='".$hinh_anh."', email='".$email."', so_dien_thoai='".$so_dien_thoai."', dia_chi='".$dia_chi."' WHERE id_nguoi_dung=".$id_nguoi_dung;

        }else{
            $sql = "UPDATE nguoidung SET ten_dang_nhap='".$ten_dang_nhap."', ho_va_ten='".$ho_va_ten."', email='".$email."', so_dien_thoai='".$so_dien_thoai."', dia_chi='".$dia_chi."' WHERE id_nguoi_dung=".$id_nguoi_dung;

        }
        pdo_execute($sql);
        echo $sql;
    }

    function loadAll_taikhoan(){
        $sql = "SELECT * FROM nguoidung WHERE nguoidung.kich_hoat=1 ORDER BY id_nguoi_dung DESC";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function loadone_taikhoan($id_nguoi_dung){
        $sql = "SELECT * FROM nguoidung WHERE id_nguoi_dung=".$id_nguoi_dung;
        $tk = pdo_query_one($sql);
        return $tk;
    }

    function update_taikhoan_admin($id_nguoi_dung,$vai_tro){
        $sql = "UPDATE nguoidung SET vai_tro='".$vai_tro."' WHERE id_nguoi_dung=".$id_nguoi_dung;
        echo $sql;
        // die();
        pdo_execute($sql);
    }

    function kiemTraMatKhauHienTai($id_nguoi_dung,$mat_khau){
        $sql = "SELECT * FROM nguoidung WHERE id_nguoi_dung = '$id_nguoi_dung' AND mat_khau = '$mat_khau'";
        $result = pdo_query_one($sql);
        if ($result) {
            return true; // Mật khẩu hiện tại chính xác
        } else {
            return false; // Mật khẩu hiện tại không chính xác
        }
    }

    function capNhatMatKhauMoi($id_nguoi_dung,$mat_khau_moi){
        $sql = "UPDATE nguoidung SET mat_khau = '$mat_khau_moi' WHERE id_nguoi_dung = '$id_nguoi_dung'";
        $mk = pdo_query_one($sql);
        return $mk;
    }

    function delete_taikhoan($id_nguoi_dung){
        // load lên tất cả dữ liệu
        // $sql = "DELETE FROM nguoidung WHERE id_nguoi_dung=".$id_nguoi_dung;
        $sql = "UPDATE nguoidung SET kich_hoat = 0 WHERE id_nguoi_dung = " . $id_nguoi_dung;
        pdo_execute($sql);
    }
   

?>