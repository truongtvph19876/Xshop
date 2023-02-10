
<?php 
    session_start();
    require_once './views/header.php';
    include './model/pdo.php';
    include './model/sanpham.php';
    include './model/danhmuc.php';
    include './model/nguoidung.php';
    include './model/binhluan.php';

    $listSanpham = loadSanphamWith(12);
    $listSanphamYeuThich = loadSanphamYeuThich(10);
    $listDanhmuc = loadDanhmucWidth(10);
    $listUsers = getListUsers();
    if (isset($_GET['act']) && $_GET['act']){
        $act = $_GET['act'];

        switch ($act) {
            case 'sanpham':
                
                $id = isset($_GET['id']) && $_GET['id'] > 0 ? $_GET['id'] : 0;
                $keyword = isset($_POST['keyword']) && !empty($_POST['keyword']) ? $_POST['keyword'] : '';
                $listSanpham = loadListAll_sanpham($keyword, $id);
                include './views/sanpham.php';
                break;
            case 'chitietsp':
                $id = $_GET['id'];
                $sanpham = loadListOne_sanpham($id);
                extract($sanpham);
                $idSPLQ = $id;
                $sanphamLienQuan = loadListAll_sanpham('', $iddm);
                increaseViews($_GET['id']);
                include './views/chitietsp.php';
                break;
            case 'gioithieu':
                include './views/gioithieu.php';
                break;
            case 'lienhe':
                include './views/lienhe.php';
                break;

            case 'register':
                include './views/taikhoan/register.php';
                break;
            
            
            case 'dangxuat':
                unset($_SESSION['isUser']);
                unset($_SESSION['username']);
                require_once './views/home.php';
                break;
            case 'capnhattaikhoan':
                $id = $_GET['user'];
                $user = getUser($id);
                extract($user);
                include './views/taikhoan/update.php';
                break;
            case 'quenmk':
                
                include './views/taikhoan/quenmk.php';
                break;
        

            default:
                    require_once './views/home.php';
                break;
        }
    } else {
        require_once './views/home.php';
    }

    require_once './views/footer.php';
?>

