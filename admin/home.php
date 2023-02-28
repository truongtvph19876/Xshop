<?php
$listdanhmuc = loadListAll_danhmuc();

$listSanPham = loadListAll_sanpham();

$listUsers = getListUsers();

$listComments = loadComments();

$slides = getSlides();


$req = isset($_GET['act']) ? $_GET['act'] : "";

if ($req) {
  $array = explode('-', $req);
  $act = $array[0];
  $id = $array[1];

  switch ($act) {
    case 'xoa':
      deleteSlide($id);
      header("location: index.php");
      break;
    
    default:
      # code...
      break;
  }
}

if (isset($_POST['ap_dung'])) {

  $array = array_merge($_POST, $_FILES);
  // echo '<pre>';
  // print_r($array);
  // echo '</pre>';

  $newArr =[];
  foreach($array as $key => $value) {
    $tmp = explode('-', $key);
    if (isset($tmp[0], $tmp[1])) {

      $newArr[$tmp[0]] [$tmp[1]] = $value;
    }
  }
  // echo '<pre>';
  // print_r($newArr);
  // echo '</pre>';

  updatMultipleSlides($newArr);
  header("location: index.php");
}

if (isset($_POST['them_slide'])) {

  $info = $_POST['info-new'];
  $error = [];
  $allowImg = ['png', 'jpg', 'jpeg', 'gif'];

  if (empty($_FILES['img-new']['name'])) {
    $error['img-new'] = 'Vui lòng chọn ảnh';
  } else {
    if (!in_array(pathinfo($_FILES['img-new']['name'], PATHINFO_EXTENSION), $allowImg)) {
      $error['img-new'] = 'Ảnh không đúng định dạng';
    }
  }

  if (empty($error)) {
    $target = 'uploads/images/slideImg/' . $_FILES['img-new']['name'];
    move_uploaded_file($_FILES['img-new']['tmp_name'], '../'. $target);
    insertSlide($target, $info);
    header("location: index.php");
  }
}

// de xuat san pham
if (isset($_POST['san_pham_de_xuat'])) {
  // kiểm tra các sản phẩm có yêu cầu kích hoạt
  foreach ($_POST as $key => $value) {
    if (is_numeric($key)) {
      $sql = "UPDATE sanpham SET 
          `kich_hoat` = 1
          WHERE `id` = '$key'";
          // echo $sql;
          pdo_execute($sql);
    }
  }

}
// xoa de xuat san pham
if (isset($_POST['xoa_de_xuat'])) {

  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';
  $boxSanpham = [];
  $boxSanphamChecked = [];

  foreach ($_POST as $key => $value) {
    // lấy ra các sản phẩm được check
    if (is_numeric($key)) {
      $boxSanphamChecked[$key] = $value;
    } else {
      // Lấy ra các sản phẩm được hiển thị
      $array = explode('-', $key);
      $k = $array[0];
      $v = isset($array[1]) ? $array[1] : '';
      $boxSanpham[$v] = $k;
    }

  }

  // so sánh các sản phẩm hiển thị và các sản phẩm được check
  foreach ($boxSanpham as $key => $value) {
    
    // kiểm tra các trường không được check(chỉ kiểm tra các trường có id sản phẩm)
    if (!isset($boxSanphamChecked[$key]) && is_numeric($key)) {
        $sql = "UPDATE sanpham SET 
          `kich_hoat` = 0
          WHERE `id` = '$key'";
          // echo $sql;
          pdo_execute($sql);
    }
  }
  
}

?>

<div class="container">
  <div class="row">
    <div class="col mt-3" style="margin: 0 -12px 0 0; padding: 0px;">
      <div class="row">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh mục</h5>
              <p class="card-text">
                <?php echo count($listdanhmuc) ?> Danh mục
              </p>
              <a href="index.php?act=listdm" class="btn btn-primary">Chi tiết</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hàng hóa</h5>
              <p class="card-text">
                <?php echo count($listSanPham) ?> Sản phẩm
              </p>
              <a href="index.php?act=listsp" class="btn btn-primary">Chi tiết</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Khách hàng</h5>
              <p class="card-text">
                <?php echo count($listUsers) ?> Khách hàng
              </p>
              <a href="index.php?act=dskh" class="btn btn-primary">Chi tiết</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bình luận</h5>
              <p class="card-text">
                <?php echo count($listComments) ?> Bình luận
              </p>
              <a href="index.php?act=dsbl" class="btn btn-primary">Chi tiết</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="d-flex gap-2">
    <div class="col-sm-6 relative overflow-hidden">
      <h1>Quản lí slideshow</h1>
      <!-- quản lí slides -->
      <div class="slides" style="height:300px;">
        <!-- slides -->
        <!-- slides -->
        <?php
        foreach ($slides as $slide):
          extract($slide);

          ?>
          <div class="slide">
            <p class="slide-info text-light h1 text-nowrap">
              <?php echo $info ?>
            </p>
            <img src="../<?php echo $img ?>" alt="">
          </div>
          <?php
        endforeach;
        ?>
        <div class="dots">

        </div>
      </div>
      <!-- button slide -->

      <div class="slide-button">
        <a class="slide_prev_btn">
          <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.5 9L10.5 12L13.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
            <path
              d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
              stroke="white" stroke-width="1.5" />
          </svg>
        </a>
        <!-- next -->
        <a class="slide_next_btn">
          <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.5 9L13.5 12L10.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round" />
            <path
              d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
              stroke="white" stroke-width="1.5" />
          </svg>
        </a>
      </div>
    </div>

    <!-- images -->
    <div class="col-sm-6">
      <h1>Slide hiện tại</h1>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-wrap gap-1">

          <?php foreach ($slides as $slide):
            extract($slide);
            ?>
            <div class="slide-item position-relative">
              <img class="position-absolute slide-item" data-img="img-<?php echo $id ?>" src="../<?php echo $img ?>"
                alt="">
              <input class="d-none" type="file" name="image-<?=$id?>" id="img-<?php echo $id?>" data-img="img-<?php echo $id ?>">
              <textarea class="position-absolute" name="info-<?php echo $id ?>" cols="20" rows="3"
                style="display:none; top:20px;"><?php echo $info?></textarea>
              <div class="position-absolute start-0 px-2 bg-info pointer rounded-bottom info-btn"
                data="info-<?php echo $id ?>">Info</div>
              <label class="position-absolute bottom-0 start-0 px-2 bg-primary rounded-top text-white text-nowrap pointer"
                for="img-<?php echo $id?>" data-img="img-<?php echo $id ?>">Thay thế</label>
              <a type="submit" href="index.php?act=xoa-<?=$id?>" onclick= "confirm('Xác nhận xóa')"
                class="position-absolute bottom-0 end-0 px-2 bg-danger rounded-top text-white text-nowrap pointer border-0">Xóa</a>
            </div>
          <?php endforeach; ?>
        </div>

        <button class="btn btn-primary mt-1" name="ap_dung">Áp dụng</button>
        <hr>
        <div>
          <input type="file" name="img-new" class="form-control mt-3">
          <span class="text-danger"><?php echo $error = !empty($error['img-new']) ? $error['img-new'] : ""?></span>
          <textarea class="px-2" name="info-new" cols="70" rows="4" placeholder="Nhập info"></textarea>
          <button class="btn btn-primary mt-1" name="them_slide">Thêm mới</button>
        </div>
        <div>
        </div>
      </form>
    </div>
  </div>
  
            
  <?php
  // Load các sản phẩm được kích hoạt
    $listSanPham = loadListAll_sanpham('', 0, -1, -1, 1);
    $default_page = 1;
    $per_page = 4;
    $numberOfPage = 0;
    $countProd = count($listSanPham);
       
    if ($countProd % $per_page > 0) {
        $numberOfPage = ceil($countProd /  $per_page);
    } else {
        $numberOfPage = $countProd / $per_page;
    }
    
    
    $page_btn = '';
    for ($i=0; $i < $numberOfPage; $i++) { 
        $page = $i + 1;
        $page_btn .= "<a href='index.php?page_kichhoat=$page' class='btn btn-primary'>$page</a>";
    }
       
        $pages = isset($_GET['page_kichhoat']) ? $_GET['page_kichhoat'] : $default_page;
        $limit = $per_page;
        $offset = $pages > 1 ? $pages * $per_page - $per_page : 0;
        
        $listSanPham = loadListAll_sanpham('', 0, $limit, $offset, 1);
  ?>
  <hr>
  <!-- Sản phẩm đề xuất -->
  <h1 class="">Sản phẩm đề xuất</h1>
  <hr>
  <div>
    <h3>Sản phẩm đang được hiển thị</h3>
    <span class="text-danger"></span>
    <hr>
    <form action="" method="post">
      <table class="table table-striped">
        <thead>
          <tr>
              <td><input type="checkbox" checked id="all-checkbox"></td>
              <td>ID</td>
              <td class="text-nowrap">Tên Sản Phẩm</td>
              <td>Giá</td>
              <td class="text-nowrap">Số lượng</td>
              <td>Ảnh Sản Phẩm</td>
              <td>Mô Tả Sản Phẩm</td>
              <td class="text-nowrap">Lượt xem</td>
              <td>Hãng</td>
          </tr>
        </thead>
          <tbody>
          <?php
            
           foreach ($listSanPham as $sanpham):

              extract($sanpham);
              if (is_file($img)) {
                  $image = "<img src='$img' width='120px' height='120px' alt=''>";
              } else {
                  $image ="<img src='' width='120px' height='120px' alt='Không tìm thấy ảnh'>";
              }
          ?>
          <tr>
              <td><input type="checkbox" data="1" checked name="<?php echo $id?>"></td>
              <input type="hidden" name="sp-<?php echo $id?>">
              <td><?php echo $id?></td>
              <td><?php echo $tensp?></td>
              <td><?php echo $price?></td>
              <td><?php echo $soluong?></td>
              <td><?php echo $image?></td>
              <td><div style="height: 95px; overflow:hidden;"><?php echo $mota?></div></td>

              <td><?php echo $luotxem?></td>
              <td><?php echo $loai?></td>
          </tr>
          <?php endforeach?>
          </tbody>
        </table>
        <button class="btn btn-primary mt-1" name="xoa_de_xuat">Áp dụng</button>
      <div class="d-flex gap-2 justify-content-center">
        <?php 
            echo $page_btn;
        ?>
      </div>
      </form>
            
      <hr>
      <form action="" method="post">
      <h3>Sản phẩm khác</h3>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
              <td><input type="checkbox" id="all-checkbox-2"></td>
              <td>ID</td>
              <td class="text-nowrap">Tên Sản Phẩm</td>
              <td>Giá</td>
              <td class="text-nowrap">Số lượng</td>
              <td>Ảnh Sản Phẩm</td>
              <td>Mô Tả Sản Phẩm</td>
              <td class="text-nowrap">Lượt xem</td>
              <td>Hãng</td>
            </tr>
          </thead>
          <tbody>
            <?php

// load các sản phẩm không được kích hoạt
          $listSanPham = loadListAll_sanpham('', 0, -1, -1, 0);
          $default_page = 1;
          $per_page = 4;
          $numberOfPage = 0;
          $countProd = count($listSanPham);

          if ($countProd % $per_page > 0) {
              $numberOfPage = ceil($countProd /  $per_page);
          } else {
              $numberOfPage = $countProd / $per_page;
          }


          $page_btn = '';
          for ($i=0; $i < $numberOfPage; $i++) { 
              $page = $i + 1;
              $page_btn .= "<a href='index.php?page_khongkichhoat=$page' class='btn btn-primary'>$page</a>";
          }
       
          $pages = isset($_GET['page_khongkichhoat']) ? $_GET['page_khongkichhoat'] : $default_page;
          $limit = $per_page;
          $offset = $pages > 1 ? $pages * $per_page - $per_page : 0;
        
          $listSanPham = loadListAll_sanpham('', 0, $limit, $offset, 0);
           foreach ($listSanPham as $sanpham):
              extract($sanpham);
              if ($kich_hoat == 1) continue;
              if (is_file($img)) {
                  $image = "<img src='$img' width='120px' height='120px' alt=''>";
              } else {
                  $image ="<img src='' width='120px' height='120px' alt='Không tìm thấy ảnh'>";
              }
          ?>
          <tr>
              <td><input type="checkbox" data="2" name="<?php echo $id?>"></td>
              <td><?php echo $id?></td>
              <td><?php echo $tensp?></td>
              <td><?php echo $price?></td>
              <td><?php echo $soluong?></td>
              <td><?php echo $image?></td>
              <td><div style="height: 95px; overflow:hidden;"><?php echo $mota?></div></td>

              <td><?php echo $luotxem?></td>
              <td><?php echo $loai?></td>
          </tr>
          <?php endforeach?>
          </tbody>
      </table>
      <div class="d-flex gap-2 justify-content-center">
        <?php 
            echo $page_btn;
        ?>
      </div>
      <button class="btn btn-primary mt-1" name="san_pham_de_xuat">Áp dụng</button>
    </form>
  </div>
</div>

<script>
  document.querySelectorAll(".info-btn").forEach(element => {
    element.addEventListener("click", () => {
      let textarea = document.querySelector("textarea[name=" + element.getAttribute("data") + "]");
      if (textarea.style.display == "none") {
        textarea.style.display = "block";
      } else {
        textarea.style.display = "none";
      }
    })
  });

let inputs = document.querySelectorAll('input[data-img]');

inputs.forEach(input => {
  input.addEventListener("change", () => {
    let [file] = input.files
    // console.log(file);
      if (file) {
        document.querySelector("img[data-img="+input.getAttribute("data-img")+"]").src = URL.createObjectURL(file);
      }
  });
});

</script>