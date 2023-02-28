<?php 

$keyword = '';
if (isset($_POST['keyword']) && $_POST['keyword']) {
    $keyword = $_POST['keyword'];
} else {
    $keyword = isset($_GET['k']) ? $_GET['k'] : '';
}
    $listdanhmuc = loadListAll_danhmuc($keyword);

    $default_page = 1;
    $per_page = 5;
    $numberOfPage = 0;
    $countDanhmuc = count($listdanhmuc);

    if ($countDanhmuc % $per_page > 0) {
        $numberOfPage = ceil($countDanhmuc /  $per_page);
    } else {
        $numberOfPage = $countDanhmuc / $per_page;
    }
    
    
    $page_btn = '';
    for ($i=0; $i < $numberOfPage; $i++) { 
        $page = $i + 1;
        $page_btn .= "<a href='index.php?act=listdm&page=$page&k=$keyword' class='btn btn-primary'>$page</a>";
    }

        $pages = isset($_GET['page']) ? $_GET['page'] : $default_page;
        $limit = $per_page;
        $offset = $pages > 1 ? $pages * $per_page - $per_page : 0;
        
        $listdanhmuc = loadListAll_danhmuc($keyword, $limit, $offset);
?>

<form action="index.php?act=listdm" method="post">
    <h2>Lọc sản phẩm</h2>
    <div class="input-group mb-3 row w-50">
    <input type="text" name="keyword" class="form-control w-50" placeholder="Nhập tên sản phẩm cần tìm">
    <button class="btn btn-primary" name="loc">Tìm</button>
    </div>
</form>
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
            <td class=""><input type="checkbox" data="1" name="<?php echo $id?>"></td>
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
<div class="d-flex gap-2 justify-content-center">
    <?php 
        echo $page_btn;
    ?>
</div>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>