<?php 
    function loadComments($idProd = 0) {
        $sql = "SELECT * FROM binhluan WHERE 1";
        $sql.= $idProd > 0 ? " AND idpro = $idProd" : "";
        $sql .= " ORDER BY ngaybinhluan DESC";
        $comments = pdo_query($sql);
        return $comments;
    }

    function deleteComments($id) {
        $sql = $id > 0 ? "DELETE FROM binhluan WHERE id = $id" : "";
        pdo_execute($sql);
    }

    function loadComment($id = 0) {
        $sql = $id> 0 ? "SELECT * FROM binhluan WHERE id = $id" : ""; 
        $binhluan = pdo_query_one($sql);
        return $binhluan;
    }

    function searchComments($keyword = '', $loai = 0, $limit = -1, $offset = -1) {
        $sql = "SELECT `binhluan`.`id` as `idbl`, `id_parent`, `noidung`, `iduser`, `idpro`, `ngaybinhluan` FROM binhluan";

        $sql .= $loai == 1 ? " WHERE id = '$keyword'" : "";

        $sql .= $loai == 2 ? " JOIN taikhoan ON  binhluan.iduser = taikhoan.id WHERE username LIKE '%$keyword%'" : "";
        
        $sql .= $loai == 3 || $loai == 0 ?  " WHERE noidung LIKE '%$keyword%'" : "";
        
        $sql .= $loai == 4 ? " JOIN sanpham ON  binhluan.idpro = sanpham.id WHERE name LIKE '%$keyword%'" : "";
        
        $sql .= $loai == 5 ? " WHERE ngaybinhluan LIKE '%$keyword%'" : "";

        $sql .= " ORDER BY ngaybinhluan DESC";

        $sql .= $limit > 0 ? " LIMIT " . $limit . " OFFSET " . $offset : "";

        $listComments = pdo_query($sql);
        return $listComments;
    }

    function getComments() {
        $conn = pdo_get_connection();
        $sql = "SELECT * FROM binhluan WHERE 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }


?>