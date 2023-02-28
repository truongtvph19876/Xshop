<?php 
    
    $keyword = '';
    if (isset($_POST['keyword']) && $_POST['keyword']) {
        $keyword = $_POST['keyword'];
    } else {
        $keyword = isset($_GET['k']) ? $_GET['k'] : '';
    }

    $loai = 0;
    if (isset($_POST['loai']) && $_POST['loai']) {
        $loai = $_POST['loai'];
    } else {
        $loai = isset($_GET['loai']) ? $_GET['loai'] : '';
    }

    
    $listComments = searchComments($keyword, $loai);
    
    $default_page = 1;
    $per_page = 5;
    $numberOfPage = 0;
    $countComment = count($listComments);

    if ($countComment % $per_page > 0) {
        $numberOfPage = ceil($countComment /  $per_page);
    } else {
        $numberOfPage = $countComment / $per_page;
    }
    
    
    $page_btn = '';
    for ($i=0; $i < $numberOfPage; $i++) { 
        $page = $i + 1;
        $page_btn .= "<a href='index.php?act=dsbl&page=$page&loai=$loai&k=$keyword' class='btn btn-primary'>$page</a>";
    }

        $pages = isset($_GET['page']) ? $_GET['page'] : $default_page;
        $limit = $per_page;
        $offset = $pages > 1 ? $pages * $per_page - $per_page : 0;
        
        $listComments = searchComments($keyword, $loai, $limit, $offset);

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

            // $suaComment = "index.php?act=updatecm&id=$id";
            $xoaComment = "index.php?act=deletecm&id=$idbl";
            $xemComment = "../index.php?act=chitietsp&id=$idpro";
            $user = getUser($iduser);
            $sanpham = loadListOne_sanpham($idpro);
            
            
        ?>
        <tr>
            <td><input type="checkbox" data="1" name="<?php echo $idbl?>"></td>
            <td><?php echo $idbl?></td>
            <td><?php echo $noidung?></td>
            <td><?php echo $user['tendn']?></td>
            <td ><?php echo $sanpham['tensp']?> - id: <b><?php echo $idpro?></b></td>
            <td><?php echo $ngaybinhluan?></td>
            <td>
                
                <a href="<?php echo $xoaComment?>" class="btn btn-danger w-100 mt-1" onclick="return confirm('Xác nhận xóa')">Xóa</a>
                <a href="<?php echo $xemComment?>" class="btn btn-info w-100 mt-1">Xem</a>
            </td>
        </tr>
        <?php 
        endforeach?>
    </tbody>
    
</table>
<!-- page -->
<div class="d-flex gap-2 justify-content-center">
    <?php 
        echo $page_btn;
    ?>
</div>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>
