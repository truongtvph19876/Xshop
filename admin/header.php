<!DOCTYPE html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../views/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/style.css">
    <link rel="stylesheet" href="../views/css/index.css">
    <link rel="stylesheet" href="../views/fontawesome-free-6.2.1-web/css/all.min.css">
</head>
<body>
  <div class="container">
    <h2 class="text-center">Quản trị XShop</h2>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark d-flex justify-content-between px-4">
      <ul class="navbar-nav text-white">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=listdm">Danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=listsp">Hàng hóa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=dskh">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=dsbl">Bình luận</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=thongke">Thống kê</a>
        </li>
        <?php
          if(isset($_SESSION["admin"]))
          {
            echo ' <li class="nav-item">
            <a class="nav-link" href="index.php?act=logout">Logout:'.$_SESSION["admin"].'</a>
          </li>';
          }
           
        ?>
       
      </ul>
      <div class="d-flex align-items-center gap-3">
        <div class="d-flex align-items-center gap-3">
          <p class="text-white m-0">Xin Chào</p>
          <img class="rounded-circle" width="40px" height="40px" src="../<?php echo $admin['img']?>" alt="">
        </div>
        <a href="../index.php" class="card-link btn btn-primary text-nowrap"><i class="fa-solid fa-right-from-bracket"></i> Thoát</a>
      </div>
    </nav>