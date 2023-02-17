<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XShop</title>
    <link rel="stylesheet" href="./views/css/index.css">
    <link rel="stylesheet" href="./views/css/chi_tiet_san_pham.css">
    <link rel="stylesheet" href="./views/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="./views/css/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./uploads/images/logo-mini.png" />
</head>

<body>
    <div id="wrapper">
        <!-- HEADER -->
        <header class="container-fluid mx-auto row bg-image align-items-center">
            <!-- logo -->
            <section class="col-2">
                <img srcset="./uploads/images/logo.png 2x" alt="">
            </section>
            <!-- navigation -->
            <nav class="col-5">
                <ul class="row nav fs-6 fw-bold">
                    <li class="col"><a class="" href="index.php">Trang chủ</a></li>
                    <li class="col"><a class="" href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li class="col"><a class="" href="index.php?act=lienhe">Liên hệ</a></li>
                    <li class="col"><a class="" href="#!">Góp ý</a></li>
                    <li class="col"><a class="" href="#!">Hỏi đáp</a></li>
                </ul>
            </nav>
            <!-- search -->
            <form action="index.php?act=sanpham" method="post" class="col-5">
                <div class="search">
                    <input name="keyword" placeholder="Tìm kiếm">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </header>
        <div class="space-cs"></div>
        