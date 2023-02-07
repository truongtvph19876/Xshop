<?php 

    $keyword = '';
    $iddm = 0;
    if (isset($_POST['loc'])) {
        $keyword = $_POST['keyword'];
        $iddm = $_POST['iddm'];
    }
    $listSanPham = loadListAll_sanpham($keyword, $iddm);
?>

<form action="" method="post">
    <h2>Lọc sản phẩm</h2>


    <div class="input-group mb-3 row w-50">
    <input type="text" name="keyword" class="form-control w-50" placeholder="Nhập tên sản phẩm cần tìm">

    <select class="form-select" name="iddm">
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
            <td>Chọn</td>
            <td>Mã Sản Phẩm</td>
            <td>Tên Sản Phẩm</td>
            <td>Giá Sản Phẩm</td>
            <td>Số lượng</td>
            <td>Ảnh Sản Phẩm</td>
            <td>Mô Tả Sản Phẩm</td>
            <td>Lượt xem</td>
            <td>Loại Sản Phẩm</td>
            <td colspan="2"><a href="index.php?act=addsp" class="btn btn-info">Nhap them</a></td>
        </tr>
    </thead>
    <tbody>
        <?php
         foreach ($listSanPham as $sanpham):
            extract($sanpham);
            $suadm = "index.php?act=updatesp&id=$id";
            $xoadm = "index.php?act=deletesp&id=$id";
            if (is_file($img)) {
                $image = "<img src='$img' width='200px' height='100px' alt=''>";
            } else {
                $image ="<img src='' width='200px' height='100px' alt='Không tìm thấy ảnh'>";
            }
        ?>
        <tr>
            <td><input type="checkbox" name="<?php echo $id?>"></td>
            <td><?php echo $id?></td>
            <td><?php echo $tensp?></td>
            <td><?php echo $price?></td>
            <td><?php echo $soluong?></td>
            <td><?php echo $image?></td>
            <td><div style="height: 95px; overflow:hidden;"><?php echo $mota?></div></td>
            
            <td><?php echo $luotxem?></td>
            <td><?php echo $loai?></td>
            <td>
                <a href="<?php echo $suadm?>" class="btn btn-success">Sua</a>
                <a href="<?php echo $xoadm?>" class="btn btn-danger" onclick="return confirm('Xac nhan xoa')">Xoa</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>

</table>
<a href="#!" class="btn btn-info">Chon tat ca</a>
<a href="#!" class="btn btn-info">Bo Chon tat ca</a>
<a href="#!" class="btn btn-info">Xoa cac muc da chon</a>