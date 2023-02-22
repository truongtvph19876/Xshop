<table class="table table-striped">
    <thead>
        <tr>
            <td><input type="checkbox" id="all-checkbox"></td>
            <td>Mã Loại</td>
            <td>Tên Hãng</td>
            <td colspan="2"><a href="index.php?act=adddm" class="btn btn-info">Nhập thêm</a></td>
            
        </tr>
    </thead>
    <tbody>
        <?php
         foreach ($listdanhmuc as $danhmuc):
            extract($danhmuc);
            $suadm = "index.php?act=updatedm&id=$id";
            $xoadm = "index.php?act=deletedm&id=$id";
        ?>
        <tr>
            <td class=""><input type="checkbox" name="<?php echo $id?>"></td>
            <td><?php echo $id?></td>
            <td><?php echo $name?></td>
            <td>
                <a href="<?php echo $suadm?>" class="btn btn-success">Sửa</a>
                <a href="<?php echo $xoadm?>" class="btn btn-danger" onclick="return confirm('Xác nhận xóa')">Xóa</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>

</table>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>