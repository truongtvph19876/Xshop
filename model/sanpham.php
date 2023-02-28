<?php 
    function insert_sanpham($arr) {
        extract($arr);
        $sql = "INSERT INTO sanpham(`name`, `price`, `soluong`, `img`, `mota`, `iddm`) VALUES 
        ('$tensp', '$gia', '$soluong', '$dirFile','$mota', '$danhmuc')";
        pdo_execute($sql);
    }

    function delete_sanpham($id) {
        $sql = "DELETE FROM sanpham WHERE id = $id";
        pdo_execute($sql);
    }

    function loadSanphamWith($number) {
        $sql = "SELECT sp.id, sp.name, sp.price, sp.img, sp.mota 
        FROM sanpham as sp
        ORDER BY sp.id DESC
        LIMIT $number";

        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    
    function loadSanphamKichHoat($number = 0) {
        $sql = "SELECT sp.id, sp.name, sp.price, sp.img, sp.mota FROM sanpham as sp  WHERE kich_hoat = 1";
        $sql .= " ORDER BY sp.id DESC";
        $sql .= $number > 0 ? " LIMIT $number" : " LIMIT 12";

        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadSanphamYeuThich($number) {
        $sql = "SELECT * FROM sanpham as sp 
        ORDER BY sp.luotxem DESC
        LIMIT $number";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    
    function loadListAll_sanpham($key = '', $iddm = 0, $limit = -1, $offset = -1, $kichhoat = -1) {
        $sql = "SELECT sp.id, sp.name as tensp, sp.price, sp.soluong, sp.img, sp.mota, sp.luotxem, sp.kich_hoat, dm.name as loai, dm.id as iddm
        FROM sanpham as sp 
        JOIN danhmuc as dm ON `sp`.`iddm` = `dm`.`id`
        WHERE 1";
        
        $sql .= !empty($key) ? " AND sp.name like '%$key%'" : "";
        $sql .= $iddm > 0 ? " AND iddm = $iddm" : "";
        $sql .= $kichhoat >= 0 ? " AND kich_hoat = $kichhoat" : "";

        $sql .= $limit > 0 ? " LIMIT " . $limit . " OFFSET " . $offset : "";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function getProducts() {
        $sql = "SELECT sp.id, sp.name as tensp, sp.price, sp.soluong, sp.img, sp.mota, sp.luotxem, sp.kich_hoat, dm.name as loai, dm.id as iddm
        FROM sanpham as sp 
        JOIN danhmuc as dm ON `sp`.`iddm` = `dm`.`id`
        WHERE 1";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadListOne_sanpham($id) {
        $sql = "SELECT sp.id, sp.name as tensp, sp.price, sp.soluong, sp.img, sp.mota, sp.luotxem, dm.name as loai, dm.id as iddm
        FROM sanpham as sp 
        JOIN danhmuc as dm ON `sp`.`iddm` = `dm`.`id` 
        WHERE `sp`.`id` = '$id'
        ORDER BY `sp`.`id` DESC";
        $sanpham = pdo_query_one($sql);
        return $sanpham;
    }

    function increaseViews($id = 0) {
        $sql = $id > 0 
        
        ? "UPDATE sanpham 
            SET `luotxem` = `luotxem` + 1
            WHERE id = $id" 
        : "";
        
        pdo_execute($sql);
    }
?>