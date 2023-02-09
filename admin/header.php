<?php 
  $users = call_user_func_array('array_merge', $listUsers);
  extract($users);
?>

<!DOCTYPE html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../views/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/style.css">
    <link rel="stylesheet" href="../views/css/index.css">
        <!-- plugins:css -->
    <link rel="stylesheet" href="../views/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../views/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../views/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../views/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../views/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../views/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../views/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../views/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="../uploads/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="../uploads/images/logo.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../<?php echo $img?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo ucfirst($tendn)?></h5>
                  <span><?php echo $typeAcc = $auth == 1 ? "admin" : ""?></span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-shape-outline"></i>
              </span>
              <span class="menu-title">Danh mục</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-1" href="#!category"> <i class="mdi mdi-circle-edit-outline"></i><span>Quản lí danh mục</span></a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <span class="menu-icon">
                <i class="mdi mdi-view-compact text-success"></i>
              </span>
              <span class="menu-title">Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-1" href="#!category"> <i class="mdi mdi-circle-edit-outline"></i><span>Quản lí Sản Phẩm</span></a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="#!customer">
              <span class="menu-icon">
                <i class="mdi mdi-account-supervisor"></i>
              </span>
              <span class="menu-title">Khách hàng</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="#!binhluan">
              <span class="menu-icon">
                <i class="mdi mdi-comment"></i>
              </span>
              <span class="menu-title">Bình luận</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="#!thongke">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Thống kê</span>
            </a>
          </li>
          
        </ul>
      </nav>

      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../views/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" style="background: #191c24;">
                  <input type="text" class="form-control w-100 border-0" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success px-1 d-flex align-items-center" href="../index.php"><i class="mdi mdi-exit-to-app"></i><span>Thoát Quản Trị</span></a>
              </li>

              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Thông báo</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <!-- Ảnh thông báo -->
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Tiêu đề thông báo</p>
                      <p class="text-muted ellipsis mb-0" style="height: 15px;"> Nội dung thông báo </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="text-decoration-none" href="#!"><p class="p-3 mb-0 text-center">Hiển thị tất cả thông báo</p></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../<?php echo $img?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo ucfirst($tendn)?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->