<?php 

    $binhluan = loadComment($id);
    extract($binhluan);
    $user = getUser($iduser);
    extract($user);
    $product = loadListOne_sanpham($idpro);
    extract($product);
    // exxtract($binhluan);
    if (isset($_POST['capnhat'])) {
        $noidung = $_POST['noidung'];
        
        $sql = "UPDATE binhluan SET 
                `noidung` = '$noidung'
                WHERE `id` = '$id'";
        pdo_execute($sql);
        $thongbao = "Cập nhật thành công";
    }

?>

<div class="container row">
<h1 class="row ">Cập Nhật Tài Khoản</h1>
    <form action="" method="post" enctype="multipart/form-data" class="w-100">
            <div class="row w-100">
                <div class="col">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" value="<?php echo $id?>" placeholder="UID" disabled>
                    <div class="d-flex flex-column">
                <div class="col">
                    <label class="form-label">Người bình luận</label>
                    <input type="text" name="user" class="form-control" value="<?php echo $tendn?>" disabled>
                    <span class="text-danger"></span>
                </div>
                <div class="col">
                    <label class="form-label">Sản phẩm bình luận</label>
                    <input type="email" name="product" class="form-control" value="<?php echo $tensp?>" disabled>
                    <span></span>
                </div>
                <div class="col">
                    <label class="form-label">Ngày bình luận</label>
                    <input type="email" name="ngaybinhluan" class="form-control" value="<?php echo $ngaybinhluan?>" disabled>
                    <span></span>
                </div>
                </div>
                </div>
                <div class="col">
                    <label class="form-label">Nội dung</label>
                    <textarea name="noidung" class="form-control" cols="30" rows="10"  autofocus><?php echo $noidung?></textarea>
                    <span class="text-danger"></span>
                </div>
                
            </div>
            <div class="row w-100">

            <div class="row w-100">

            
            <div class="row my-4">
                <div>
                <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                <input class="btn btn-danger" type="reset" value="Nhập lại">
                <a href="index.php?act=dsbl" class="btn btn-info">Quay Lại</a>
                </div>
            </div>
           <span class="text-success"> <?php 
                echo $thongbao = !empty($thongbao) ? $thongbao : "";
            ?></span>
    </form>
    <script src="./views/js/app.js"></script>
</div>
