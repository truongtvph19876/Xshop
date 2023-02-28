
<div class="row">
    <h1>Thống kê sản phẩm theo loại</h1>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>Mã danh mục</td>
            <td>Tên danh mục</td>
            <td>Số lượng</td>
            <td>Gía cao nhất</td>
            <td>Gía thấp nhất</td>
            <td>Gía trung bình</td>
        </tr>
    </thead>
    <tbody>
        <?php
         foreach ($listtk  as $tk):
            extract($tk);
        ?>
        <tr>
            <td><?php echo $madm?></td>
            <td><?php echo $tendm?></td>
            <td><?php echo $countsp?></td>
            <td><?php echo $maxprice?></td>
            <td><?php echo $minprice?></td>
            <td><?php echo $avgprice?></td>
        </tr>
        <?php endforeach?>
    </tbody>

</table>
<a href="index.php?act=bieudo" class="btn btn-info">Biểu đồ danh mục</a>
