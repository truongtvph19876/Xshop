<?php 

    $keyword = '';
    $idUser = 0;
    if (isset($_POST['locbinhluan'])) {
        $keyword = $_POST['keyword'];
        $loai = $_POST['loai'];
        
        $listComments = searchComments($keyword, $loai);
    }
?>

<form action="index.php?act=dsbl" method="post">
    <h2>Tìm kiếm Bình luận</h2>


    <div class="input-group mb-3 row w-50">
    <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm bình luận">

    <select class="form-select" name="loai">
    <option selected value="0">Tìm kiếm theo</option>
    <option value="1">ID bình luận</option>
    <option value="2">Người bình luận</option>
    <option value="3">Nội dung</option>
    <option value="4">Sản phẩm</option>
    <option value="5">Ngày bình luận</option>
    
    </select>


    <button class="btn btn-primary" name="locbinhluan">Tìm</button>
    </div>

</form>

<table class="table table-striped">
    <thead>
        <tr>
            <td><input type="checkbox" id="all-checkbox"></td>
            <td>ID</td>
            <td>Nội dung</td>
            <td class="text-nowrap">Người bình luận</td>
            <td>Sản phẩm bình luận</td>
            <td>Thời gian</td>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $image = '';
         foreach ($listComments as $comment):
            extract($comment);
            $idCm = $id;
            // $suaComment = "index.php?act=updatecm&id=$id";
            $xoaComment = "index.php?act=deletecm&id=$id";
            $xemComment = "../index.php?act=chitietsp&id=$idpro";
            $user = getUser($iduser);
            extract($user);
            $sanpham = loadListOne_sanpham($idpro);
            extract($sanpham);
            
            
        ?>
        <tr>
            <td><input type="checkbox" name="<?php echo $id?>"></td>
            <td><?php echo $idCm?></td>
            <td><?php echo $noidung?></td>
            <td><?php echo $tendn?></td>
            <td ><?php echo $tensp?> - id: <b><?php echo $idpro?></b></td>
            <td><?php echo $ngaybinhluan?></td>
            <td>
                
                <a href="<?php echo $xoaComment?>" class="btn btn-danger w-100 mt-1" onclick="return confirm('Xác nhận xóa')">Xóa</a>
                <a href="<?php echo $xemComment?>" class="btn btn-info w-100 mt-1">Xem</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>

</table>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>
