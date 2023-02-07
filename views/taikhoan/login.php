<?php 
$idUser = 0;
    if(isset($_POST['login'])){
        $usernamelg = $_POST['usernamelg'];
        $passwordlg = $_POST['passwordlg'];
        
        $error = [];
        $isChecked = false;
        $messageEmpty = 'Trường này không được để trống';
        if(empty($usernamelg)){
            $error['username'] = $messageEmpty;
        } else{
            foreach ($listUsers as $user) {
                extract($user);
                if($usernamelg == $tendn && $password == $passwordlg) {
                    $_SESSION['idUser'] = $id;
                    
                    unset($error['check']);
                    break;
                } else {
                    $error['check'] = 'Mật khẩu không chính xác';
                }
            
            }
        }
        
        if(empty($password)) {
            $error['password'] = 'Mật khẩu không chính xác';
        }
        if(empty($error)){
            $_SESSION['username'] = $usernamelg;
            
        } else {
            $message = 'Tài khoản hoặc mật khẩu không chính xác';
        }   
    }
?>
<?php 
    $message = !empty($message) ? $message : "";
    if(!isset($_SESSION['username'])) {
        echo '
        <h2 class="top">Tài khoản</h2>
        <form action="index.php" method="post">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="usernamelg">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" name="passwordlg">
            <span class="text-danger">'.$message.'</span>
        </div>
        <div class="form-group">
            <input type="checkbox" name="" id="">
            <span class="note">Ghi nhớ tài khoản</span>
        </div>
        <input type="submit" name="login" value="Đăng nhập" class="login">
        <li>Chưa có tài khoản? <a href="index.php?act=register"> Đăng ký?</a></li>
        <li>Quên mật khẩu? <a href="index.php?act=quenmk"> Lấy lại ngay!</a></li>
    </form>';
    }  else {
        $UID = $_SESSION['idUser'];
        $defaultImg = './uploads/customer/images.png';
        $user = getUser($UID);
        extract($user);
        $admin = $auth;
        $quantri = $admin == 1 ? '<a href="admin/index.php" class="card-link">Quản trị</a>' : "";
        $img = empty($img) ? $defaultImg : $img;
        echo '
        <div class="card" style="">
  <div class="card-body">
    <div class="d-flex flex-column align-items-center">
    <img class="rounded-circle" src="'.$img.'" alt="" class="card-title" width="100px">
    <h6 class="card-subtitle mb-2 text-muted">'.$tendn.'</h6>
    </div>
    <p class="card-text">Email: <i>'.$email.'</i></p>
    <p class="card-text">Phone: <i>'.$phone.'</i></p>
    <p class="card-text">Address: <i>'.$address.'</i></p>
    <a href="index.php?act=capnhattaikhoan&user='.$id.'" class="card-link">Cập nhật</a>
    <a href="index.php?act=dangxuat" class="card-link">Đăng xuất</a>
    '.$quantri.'
  </div>
</div>
        ';
    }
?>

