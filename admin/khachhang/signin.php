<?php 
    

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $loai = $_POST['loaitk'];
        $error =[];
        $messageEmpty = 'Trường này không được để trống';
        if(empty($username)){
            $error['username'] = $messageEmpty;
        } else {
            foreach($listUsers as $user) {
                extract($user);
                if($username == $tendn) $error['username'] = 'Username đã tồn tại';
            }
        }
        if(empty($password)){
            $error['password'] = $messageEmpty;
        }else {
            if(strlen($password) < 3) {
                $error['password'] = 'Tối thiểu 3 ký tự';
            }
        }

        if ($loai == 0) {
            $error['loai'] = 'Vui lòng chọn loại tài khoản';
        }

        
        if(empty($error)) {
            $sql = "INSERT INTO taikhoan (`username`, `password`, `email`, `phone`, `auth`) VALUES
            ('$username', '$password', '$email', '$phone', '$loai')";
            pdo_execute($sql);
            header('Location: index.php?act=dskh');
        }
    }
?>

<style>
    body {
  background: #f1f1f1;

}

.card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('https://e1.pxfuel.com/desktop-wallpaper/581/154/desktop-wallpaper-backgrounds-for-login-page-login-page.jpg');
  background-size: cover;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

</style>

<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Đăng ký tài khoản</h5>
            <form action="" method="post">

              <div class="form-floating mb-3 w-75">
                <input type="text" name="username" class="form-control" id="floatingInputUsername" placeholder="myusername" autofocus>
                <label for="floatingInputUsername">Tên đăng nhập <span class="text-danger">*</span></label>
                <span class="text-danger"><?php echo $message = !empty($error['username']) ? $error['username'] : "";?></span>
              </div>

              <div class="form-floating mb-3 w-75">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Mật khẩu<span class="text-danger">*</span></label>
                <span class="text-danger"><?php echo $message = !empty($error['password']) ? $error['password'] : "";?></span>
              </div>
              
              <div class="form-floating mb-3 w-75">
                <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                <label for="floatingInputEmail">Email</label>
              </div>
              <div class="form-floating mb-3 w-75">
                <input type="text" name="phone" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                <label for="floatingInputEmail">Số điện thoại</label>
              </div>

              <div class="form-floating mb-3 w-75">
              <select name="loaitk" class="form-select">
                <option value="0" selected>Loại tài khoản</option>
                <option value="1">Admin</option>
                <option value="2">Khách hàng</option>
              </select>
              <span class="text-danger"><?php echo $message = !empty($error['loai']) ? $error['loai'] : "";?></span>
              </div>
              

              <div class="d-grid mb-2 w-50">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" name="register">Tạo</button>
              </div>

              <a class="d-block text-center mt-2 small" href="index.php?act=dskh">Quay lại</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>