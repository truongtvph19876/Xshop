<?php 

    if (isset($_POST['themmoi']) && $_POST['themmoi']){
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
        $allow_img = ['png', 'jpg', 'jpeg', 'gif'];
        if (empty($_FILES['image']['name'])) {
           $error['image'] = $messageEmpty;
        } else {
            if (!in_array(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION),$allow_img)) {
                $error['image'] = "Định dạng ảnh không đúng";
            } else if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
                $error['image'] = "Dung lượng không được vượt quá 2MB";
            }
        }
        $image = "../uploads/images/". $_FILES['image']['name'];
        $isUploadfile = move_uploaded_file($_FILES['image']['tmp_name'], $image);
        if (!($isUploadfile)) {
           $error['image'] = $messageEmpty;
        }
        if (empty($soluong)) {
            $error['soluong'] = "Truong nay khong duoc de trong";
        } else {
            if (!is_numeric($soluong)) {
                $error['soluong'] = "vui lòng nhập số";
            } else if($soluong < 0) {
                $error['soluong'] = "Số lượng phải lớn hơn hoặc bằng 0";
            }
        }
        if (empty($danhmuc)) {
            $error['danhmuc'] = $messageEmpty;
        }

        if (empty($error)) {
            $sanpham = [
                "tensp" => $tensp,
                "gia" => $gia,
                "soluong" => $soluong,
                "dirFile" => $image,
                "mota" => $mota,
                "danhmuc" => $danhmuc

            ];
            insert_sanpham($sanpham);
            $thongbao = "Thêm sản phẩm thành công";
        }


    }
?>

<div class="container">
<h1 class="row ">Thêm Sản Phẩm</h1>
<form action="" enctype="multipart/form-data" method = "post">
  <div class="row">
    <div class="col">
        <label class="form-label">Mã Sản Phẩm</label>
      <input type="text" class="form-control" placeholder="Mã sản phẩm" disabled>
    </div>
    <div class="col">
        <label class="form-label">Tên Sản Phẩm</label>
      <input type="text" name="tensp" class="form-control" placeholder="Tên sản phẩm">
      <span class="text-danger"><?php echo $message = isset($error['tensp']) && !empty($error['tensp']) ? $error['tensp'] : ""?></span>
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

  <div class="row align-items-end">
    <div class="col">
        <label class="form-label">Giá sản phẩm</label>
      <input type="number" name="gia" class="form-control" placeholder="Giá sản phẩm">
      <span class="text-danger"><?php echo $message = isset($error['gia']) && !empty($error['gia']) ? $error['gia'] : ""?></span>
    </div>
    <div class="col">
        <label for="form-lable">Danh mục</label>
    <select name="danhmuc" class="form-select">
                <option value="">Chọn</option>
                <?php 
                    foreach($listdanhmuc as $danhmuc):
                        extract($danhmuc);
                ?>
                    <option value="<?php echo $id?>"><?php echo $name?></option>
                <?php endforeach?>
            </select>
            <span class="text-danger"><?php echo $message = isset($error['danhmuc']) && !empty($error['danhmuc']) ? $error['danhmuc'] : ""?></span>
    </div>

            <div class="mb-3">
                <label class="form-label">Mô Tả Sản Phẩm</label>
                <textarea name="mota" class="form-control" cols="30" rows="5"></textarea>
                <span class="text-danger"><?php echo $message = isset($error['mota']) && !empty($error['mota']) ? $error['mota'] : ""?></span>
            </div>
            <div class="row mb10">
                <div>
                <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm Mới">
                <input class="btn btn-danger" type="reset" value="Nhập lại">
                <a href="index.php?act=listsp" class="btn btn-info">Danh sách</a>
                </div>
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
