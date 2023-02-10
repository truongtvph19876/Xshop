<!DOCTYPE html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../views/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/style.css">
    <link rel="stylesheet" href="../views/css/index.css">
</head>
<body>
  <div class="container">
    <h2 class="text-center">Admin</h2>
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
      <a href="../index.php" class="btn btn-primary">Thoát</a>
    </nav>