<?php 
    function insert_danhmuc($tenhang) {
        $sql = "INSERT INTO danhmuc(`name`) VALUES ('$tenhang')";
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
    function loadListAll_danhmuc($keyword = '', $limit = -1, $offset = -1) {
        $sql = "SELECT * FROM danhmuc WHERE 1";
        $sql .= !empty($keyword) ? " AND `name` LIKE '%$keyword%'" : ""; 
        $sql .= " ORDER BY id DESC";
        $sql .= $limit > 0 ? " LIMIT " . $limit . " OFFSET " . $offset : "";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function loadListOne_danhmuc($id) {
        $sql = "SELECT * FROM danhmuc WHERE id =$id";
        $danhmuc = pdo_query_one($sql);
        return $danhmuc;
    }
?>