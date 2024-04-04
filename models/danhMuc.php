<?php
    function insert_danhmuc($ten_danh_muc){
        $sql = "insert into danhmuc(ten_danh_muc) values('$ten_danh_muc')";
        pdo_execute($sql);
    }

    function loadAll_danhmuc(){
        $sql = "select * from danhmuc WHERE danhmuc.kich_hoat=1 order by id_danh_muc desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function delete_danhmuc($id_danh_muc){
        // load lên tất cả dữ liệu
        // $sql = "delete from danhmuc where id_danh_muc=".$id_danh_muc;
        $sql = "UPDATE danhmuc SET kich_hoat = 0 WHERE id_danh_muc = " . $id_danh_muc;
        pdo_execute($sql);
    }

    function loadone_danhmuc($id_danh_muc){
        //lấy dữ liệu của bản ghi về
        $sql = "select * from danhmuc where id_danh_muc=".$id_danh_muc;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($id_danh_muc,$ten_danh_muc){
        $sql = "update danhmuc set ten_danh_muc='".$ten_danh_muc."' where id_danh_muc=".$id_danh_muc;
        // echo $sql;
        // die();
        pdo_execute($sql);
    }
?>