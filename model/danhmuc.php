<?php 
    function insert_danhmuc($tenloai, $tenhang) {
        $sql = "INSERT INTO danhmuc(`name`, `loaidm`) VALUES ('$tenloai', '$tenhang')";
        pdo_execute($sql);
    }

    function delete_danhmuc($id) {
        $sql = "DELETE FROM danhmuc WHERE id = $id";
        pdo_execute($sql);
    }
    function loadDanhmucWidth($number) {
        $sql = "SELECT * FROM danhmuc
        ORDER BY id DESC
        LIMIT $number";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }
    function loadListAll_danhmuc() {
        $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function loadListOne_danhmuc($id) {
        $sql = "SELECT * FROM danhmuc WHERE id =$id";
        $danhmuc = pdo_query_one($sql);
        return $danhmuc;
    }
?>