<?php 
    

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cfpassword = $_POST['cfpassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
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

        if(empty($cfpassword)) {
            $error['cfpassword'] = $messageEmpty;
        } else {
            if(strcmp($cfpassword, $password)) $error['cfpassword'] = 'Mật khẩu không trùng khớp';
        }

        
        if(empty($error)) {
            $sql = "INSERT INTO taikhoan (`username`, `password`, `email`, `phone`, `auth`) VALUES
            ('$username', '$password', '$email', '$phone', 1)";
            pdo_execute($sql);
            header('Location: index.php');
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

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
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
            <form action="index.php?act=register" method="post">

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
                <input type="password" name="cfpassword" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password">
                <label for="floatingPasswordConfirm">Xác nhận mật khẩu<span class="text-danger">*</span></label>
                <span class="text-danger"><?php echo $message = !empty($error['cfpassword']) ? $error['cfpassword'] : "";?></span>
              </div>
              
              <div class="form-floating mb-3 w-75">
                <input type="email" name="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                <label for="floatingInputEmail">Email</label>
              </div>
              <div class="form-floating mb-3 w-75">
                <input type="text" name="phone" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                <label for="floatingInputEmail">Số điện thoại</label>
              </div>

              <div class="d-grid mb-2 w-50">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" name="register">Đăng ký</button>
              </div>

              <a class="d-block text-center mt-2 small" href="index.php">Bạn đã có tài khoản? Đăng nhập</a>

              <hr class="my-4">

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                  <i class="fab fa-google me-2"></i> Đăng nhập với Google
                </button>
              </div>

              <div class="d-grid">
                <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                  <i class="fab fa-facebook-f me-2"></i> Đăng nhập với Facebook
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>