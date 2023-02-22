<?php 
    extract($sanpham);

    if (isset($_POST['capnhat']) && $_POST['capnhat']){
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $image = $_FILES['image']['name'];
        $mota  = $_POST['mota'];
        $danhmuc = $_POST['danhmuc'];
        $soluong = $_POST['soluong'];

        $error =[];
        $messageEmpty = "Trường này không được để trống";
        if (empty($tensp)) {
            $error['tensp'] = $messageEmpty;
        }
        if (empty($gia)) {
            $error['gia'] = $messageEmpty;
        } else {
            if (!is_numeric($gia)) {
                $error['gia'] = "Vui lòng nhập số";
            } else if ($gia <=0 ) {
                $error['gia'] = "Giá sản phẩm phải lớn hơn 0";
            }
        }
        $allow_image = ['png', 'jpg', 'jpeg', 'gif'];
        $target = "";
        
        if (empty($_FILES['image']['name'])) {
           if (empty($img)) {
                $error['image'] = "Vui lòng chọn ảnh";
           } else $image = $img;
        } else {
            
            if (!in_array(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION),$allow_image)) {
                $error['image'] = "Định dạng ảnh không đúng";
            } else if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
                $error['image'] = "Dung lượng không vượt quá 2MB";
            } else {
                $image = "../uploads/images/" . $_FILES['image']['name'];
                $isUploadfile = move_uploaded_file($_FILES['image']['tmp_name'], $image);
                if (!($isUploadfile)) {
                    $error['image'] = "Upload ảnh thất bại";
                 }
            }
        }

        
        if (!is_numeric($soluong)) {
            $error['soluong'] = "vui lòng nhập số";
        }
        
        // if (empty($mota)) {
        //     $error['mota'] = "Truong nay khong duoc de trong";
        // }
        if (empty($danhmuc)) {
            $error['danhmuc'] = $messageEmpty;
        }

        if (empty($error)) {
            $sql = "UPDATE sanpham 
                    SET
                    `name` = '$tensp',
                    `price` = '$gia',
                    `soluong` = '$soluong',
                    `img` = '$image',
                    `mota` = '$mota',
                    `iddm` = '$danhmuc'
                    WHERE id = '$id'";
            pdo_execute($sql);
            $thongbao = "Thêm sản phẩm thành công";
            header("Location: index.php?act=listsp");
        }


    }
?>

<div class="container">
    <h1 class="row ">Cập Nhật Sản Phẩm</h1>
    <div class="row">
        <form class="w-100" action="" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
                    <label class="form-label">Mã Sản Phẩm</label>
                    <input type="text" class="form-control" value="<?php echo $id = !empty($id) ? $id : "" ?>" placeholder="Mã sản phẩm" disabled>
                </div>
                <div class="col">
                    <label class="form-label">Tên Sản Phẩm</label>
                    <input type="text" name="tensp" class="form-control" value="<?php echo $tensp = !empty($tensp) ? $tensp : "" ?>" placeholder="nhap ten san pham">
                    <span><?php echo $message = isset($error['tensp']) && !empty($error['tensp']) ? $error['tensp'] : ""?></span>
                </div>
            </div>

            <div class="row">
            <div class="col">
                <label for="formFile" class="form-label">Ảnh Sản Phẩm</label>
                <input class="form-control" type="file" name="image">
                <span class="text-danger"><?php echo $message = isset($error['image']) && !empty($error['image']) ? $error['image'] : ""?></span>
            </div>
            <div class="col">
                <label class="form-label">Số lượng</label>
                <input class="form-control" name="soluong" type="number" value="<?php echo $soluong = isset($soluong) ? $soluong : "" ?>">
                <span class="text-danger"><?php echo $message = isset($error['soluong']) && !empty($error['soluong']) ? $error['soluong'] : ""?></span>
            </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Giá sản phẩm</label>
                    <input type="number" name="gia" class="form-control" value="<?php echo $price = !empty($price) ? $price : "" ?>" placeholder="nhap gia san pham">
                    <span><?php echo $message = isset($error['gia']) && !empty($error['gia']) ? $error['gia'] : ""?></span>
                </div>
                <div class="col">
                    <label for="form-label" style="padding-bottom:8px">Danh mục</label>
                    <select name="danhmuc" class="form-select">
                        <option value="<?php echo $iddm = !empty($iddm) ? $iddm : "" ?>"><?php echo $loai = !empty($loai) ? $loai : "" ?></option>
                        <?php 
                            foreach($listdanhmuc as $danhmuc):
                                extract($danhmuc);
                                if ($id == $iddm) continue;
                        ?>
                            <option value="<?php echo $id?>"><?php echo $name?></option>
                        <?php endforeach?>
                    </select>
                    <span><?php echo $message = isset($error['danhmuc']) && !empty($error['danhmuc']) ? $error['danhmuc'] : ""?></span>
                </div>
            </div>

            <div class="row">
            
            <div class="mb-3 col">
                <label class="form-label">Lượt xem</label>
                <input class="form-control" name="luotxem" type="text" value="<?php echo $luotxem = isset($luotxem) ? $luotxem : "" ?>" disabled>
            </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả sản phẩm</label>
                <textarea name="mota" class="form-control" cols="30" rows="5" value="<?php echo $mota = !empty($mota) ? $mota : "" ?>"><?php echo $mota = !empty($mota) ? $mota : "" ?></textarea>
                <span><?php echo $message = isset($error['mota']) && !empty($error['mota']) ? $error['mota'] : ""?></span>
            </div>


            <div class="row mb10">
                <div>
                <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                <input class="btn btn-danger" type="reset" value="Nhập lại">
                <a href="index.php?act=listsp" class="btn btn-info">Danh sách</a>
                </div>
            </div>
            
            <?php 
                if (isset($thongbao) && !empty($thongbao)) {
                    echo $thongbao;
                }
            ?>
        </form>
        
    </div>
</div>
