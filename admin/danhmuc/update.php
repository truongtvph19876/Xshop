<?php 

    if (is_array($danhmuc)) extract($danhmuc);

    if (isset($_POST['capnhat'])) {
        $tenhang = $_POST['tenhang'];
        $error = [];

        if (empty($tenhang)) {
            $error['hang'] = "Trường này không được để trống";
        }

        if (empty($error)) {
            $sql = "UPDATE danhmuc 
                SET
                `name` = '$tenhang'
                WHERE `id` = $id";
            pdo_execute($sql);
            header("Location:index.php?act=listdm");
        }
    }
?>

<div class="container">

    <h1 class="row w-full">Cập Nhật Danh Mục Sản Phẩm</h1>

    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Mã Loại</label>
                <input type="text" name="id"  class="form-control" value="<?php echo $id?>" placeholder="" disabled>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label">Tên Hãng</label>
                    <input type="text" name="tenhang" class="form-control" value="<?php echo $name = !empty($name)? $name : ""?>" placeholder="Nhập tên loại">
                </div>
            </div>
            <div class="row mb10 mt-3">
                <div>
                <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                <input class="btn btn-danger" type="reset" value="Nhập Lại">
                <a href="index.php?act=listdm" class="btn btn-info">Danh Sách</a>
                </div>
            </div>
            <?php 
                
            ?>
        </form>
    </div>
</div>
