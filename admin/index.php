<?php 
    session_start();
    if (empty($_SESSION['idUser'] && $_SESSION['username'])) {
        header('Location:../index.php');
    }
    include '../model/pdo.php';
    include '../model/danhmuc.php';
    include '../model/sanpham.php';
    include '../model/nguoidung.php';
    include '../model/binhluan.php';
    //controller
    $admin = getUser($_SESSION['idUser']);
    require_once 'header.php';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                $listdanhmuc = loadListAll_danhmuc();
                include 'danhmuc/add.php';
                break;
            
            case 'listdm':
                $listdanhmuc = loadListAll_danhmuc();
                include 'danhmuc/list.php';
                break;
            
            case 'updatedm':
                $id = $_GET['id'];
                $danhmuc = loadListOne_danhmuc($id);
                include 'danhmuc/update.php';

                break;
            
            case 'deletedm':
                $id = $_GET['id'];
                delete_danhmuc($id);
                $listdanhmuc = loadListAll_danhmuc();
                include 'danhmuc/list.php';
                break;
            
            // san pham
            case 'addsp':
                $listdanhmuc = loadListAll_danhmuc();
                include 'sanpham/add.php';
                break;

            case 'listsp':
                $listdanhmuc = loadListAll_danhmuc();
                include 'sanpham/list.php';
                break;

            case 'updatesp':
                $id = $_GET['id'];
                $listdanhmuc = loadListAll_danhmuc();
                $sanpham = loadListOne_sanpham($id);
                
                include 'sanpham/update.php';
                break;

            case 'deletesp':
                $id = $_GET['id'];
                delete_sanpham($id);
                $listSanPham = loadListAll_sanpham("", 0);
                include 'sanpham/list.php';
                break;

            case 'dskh':
                $listUsers = getListUsers();
                include 'khachhang/list.php';
                break;
            case 'updatekh':
                $id = $_GET['id'];
                $user = getUser($id);
                extract($user);
                include 'khachhang/update.php';
                break;
            case 'deletekh':
                $id = $_GET['id'];
                $deleteUser = deleteUser($id);
                $listUsers = getListUsers();
                include 'khachhang/list.php';
                break;
            case 'signin':
                
                include 'khachhang/signin.php';
                break;
            case 'dsbl':
                
                $listComments = loadComments();
                include 'binhluan/list.php';
                break;
            case 'deletecm':
                $id = $_GET['id'];
                deleteComments($id);
                $listComments = loadComments();
                include 'binhluan/list.php';
                break;
            case 'updatecm':
                $id = $_GET['id'];
                
                include 'binhluan/updatecm.php';
                break;

            default:
                require_once 'home.php';
                break;
        }
    } else {
        require_once 'home.php';
    }

    require_once 'footer.php';
?>