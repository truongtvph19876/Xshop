<?php 

    $keyword = '';
    if (isset($_POST['keyword']) && $_POST['keyword']) {
        $keyword = $_POST['keyword'];
    } else {
        $keyword = isset($_GET['k']) ? $_GET['k'] : '';
    }

    $loai = 0;
    if (isset($_POST['loai']) && $_POST['loai']) {
        $loai = $_POST['loai'];
    } else {
        $loai = isset($_GET['loai']) ? $_GET['loai'] : '';
    }

    
    $listSanPham = loadListAll_sanpham($keyword, $loai);
    
    $default_page = 1;
    $per_page = 5;
    $numberOfPage = 0;
    $countProd = count($listSanPham);

    if ($countProd % $per_page > 0) {
        $numberOfPage = ceil($countProd /  $per_page);
    } else {
        $numberOfPage = $countProd / $per_page;
    }
    
    
    $page_btn = '';
    for ($i=0; $i < $numberOfPage; $i++) { 
        $page = $i + 1;
        $page_btn .= "<a href='index.php?act=listsp&page=$page&loai=$loai&k=$keyword' class='btn btn-primary'>$page</a>";
    }

        $pages = isset($_GET['page']) ? $_GET['page'] : $default_page;
        $limit = $per_page;
        $offset = $pages > 1 ? $pages * $per_page - $per_page : 0;
        
        $listSanPham = loadListAll_sanpham($keyword, $loai, $limit, $offset);
?>

<form action="" method="post">
    <h2>Lọc sản phẩm</h2>
    <div class="input-group mb-3 row w-50">
    <input type="text" name="keyword" class="form-control w-50" placeholder="Nhập tên sản phẩm cần tìm">

    <select class="form-select" name="loai">
    <option selected value="0">Tất cả</option>
    <?php 
        foreach($listdanhmuc as $danhmuc):
            extract($danhmuc);
    ?>
        <option value="<?php echo $id?>"><?php echo $name?></option>
    <?php endforeach?>
    </select>


    <button class="btn btn-primary" name="loc">Lọc</button>
    </div>

</form>

<table class="table table-striped">
    <thead>
        <tr>
            <td><input type="checkbox" id="all-checkbox"></td>
            <td>ID</td>
            <td class="text-nowrap">Tên Sản Phẩm</td>
            <td>Giá</td>
            <td class="text-nowrap">Số lượng</td>
            <td>Ảnh Sản Phẩm</td>
            <td>Mô Tả Sản Phẩm</td>
            <td class="text-nowrap">Lượt xem</td>
            <td>Hãng</td>
            <td colspan="2"><a href="index.php?act=addsp" class="btn btn-info text-nowrap">Nhập thêm</a></td>
        </tr>
    </thead>
    <tbody>
        <?php
         foreach ($listSanPham as $sanpham):
            extract($sanpham);
            $suadm = "index.php?act=updatesp&id=$id";
            $xoadm = "index.php?act=deletesp&id=$id";
            if (is_file($img)) {
                $image = "<img src='$img' width='150px' height='150px' alt=''>";
            } else {
                $image ="<img src='' width='200px' height='100px' alt='Không tìm thấy ảnh'>";
            }
        ?>
        <tr>
            <td><input type="checkbox" data="1" name="<?php echo $id?>"></td>
            <td><?php echo $id?></td>
            <td><?php echo $tensp?></td>
            <td><?php echo $price?></td>
            <td><?php echo $soluong?></td>
            <td><?php echo $image?></td>
            <td><div style="height: 95px; overflow:hidden;"><?php echo $mota?></div></td>
            
            <td><?php echo $luotxem?></td>
            <td><?php echo $loai?></td>
            <td>
                <a href="<?php echo $suadm?>" class="btn btn-success w-100 mt-2">Sửa</a>
                <a href="<?php echo $xoadm?>" class="btn btn-danger w-100 mt-2" onclick="return confirm('Xac nhan xoa')">Xóa</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>


</table>
<div class="d-flex gap-2 justify-content-center">
    <?php 
        echo $page_btn;
    ?>
</div>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>