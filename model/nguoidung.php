<?php 
    function getListUsers($id = 0, $keyword = '') {
        $sql = "SELECT `id`, `username` as `tendn`, `password`, `img`, email, `address`, phone, auth FROM taikhoan WHERE 1";
        $sql .= $id > 0 ? " AND `auth` ='$id'" : '';
        $sql .= !empty($keyword) ? " AND `username` like '%$keyword%'" : '';
        $listUser = pdo_query($sql);
        return $listUser;
    }

    function getUser($id = 0) {
        $sql = "SELECT `id`, `username` as `tendn`, `password`, `img`, email, `address`, phone, auth FROM taikhoan WHERE `id` = $id";
        $user = pdo_query_one($sql);
        return $user;
    }

    function deleteUser($id = 0) {
        $sql = "DELETE FROM taikhoan WHERE `id` = $id";
        $user = pdo_execute($sql);
        return "Xóa thành công";
    }

    function checkEmail($email) {
        $sql = "SELECT `id`, `username` as `tendn`, `password`, email FROM taikhoan WHERE `email` = '$email'";
        $user = pdo_query($sql);
        return $user;
    }

?>