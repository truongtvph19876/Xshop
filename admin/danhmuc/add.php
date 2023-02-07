<?php 
$error = [];
if (isset($_POST['themmoi']) && $_POST['themmoi']){
    $tenloai = $_POST['tenloai'];
    $error = [];
    if (empty($tenloai)) {
        $error['loai'] = "Trường này không được để trống";
    }
    foreach ($listdanhmuc as $danhmuc) {
        extract($danhmuc);
        if (!strcasecmp($tenloai, $name)) {
            $error['loai'] = "Danh mục này đã tồn tại";
        }
    }
    if (empty($error)) {
        insert_danhmuc($tenloai);
        $thongbao = "Thêm mới thành công";
    }
    
}
?>

<div class="container">

    <h1 class="row w-full">Thêm Danh Mục Sản Phẩm</h1>

    <div class="row">
        <form action="index.php?act=adddm" method="post">
            <div class="mb-3">
                <label class="form-label">Mã Loại</label>
                <input type="text"  class="form-control" value="" placeholder="Mã loại" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Loại</label>
                <input type="text" name="tenloai" class="form-control" placeholder="Nhập tên loại">
                <span class="text-danger"><?php echo $message = isset($error['loai']) && !empty($error['loai']) ? $error['loai'] : ""?></span>
                <span class="text-success"><?php echo $message = isset($thongbao) && !empty($thongbao) ? $thongbao : ""?></span>
            </div>
            <div class="row mb10">
                <div>
                <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
                <input class="btn btn-danger" type="reset" value="Nhập Lại">
                <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
                </div>
            </div>
        </form>
    </div>
</div>
