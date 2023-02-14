<?php 
    if(isset($_POST['quenmk'])) {
        $username = $_POST['username'];
        $emailpost = $_POST['email'];
        $getpassword = '';
        $error = [];
        $message = '';

        $listUsers = checkEmail($emailpost);
        foreach($listUsers as $user) {
            extract($user);

            if(strcmp($username, $tendn) == 0 && strcmp($email, $emailpost) == 0) {
                $getpassword = $password;
                $message = 'Mật khẩu của bạn là: <b>'.$getpassword.'</b>';
                break;
            }
        }

        if ($getpassword == '') {
            $error['quenmk'] = 'Tài khoản hoặc email không đúng';
        }
           
    }
?>

<div class="container row">
<h1 class="row ">Quên mật khẩu</h1>
    <form action="" method="post" enctype="multipart/form-data" class="w-100">
            <div class="row w-100">
                <div class="col">
                    <label class="form-label">Tên Đăng Nhập</label>
                    <input type="text" name="username" class="form-control" value="" placeholder="Tên đăng nhập" autofocus>
                    <span class="text-danger"></span>
                </div>
                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="" placeholder="Email">
                    <span class="text-danger"></span>
                </div>
            </div>

            <div class="row my-4">
                <div>
                <input class="btn btn-primary" type="submit" name="quenmk" value="Gửi">
                <input class="btn btn-danger" type="reset" value="Nhập lại">
                <a href="index.php" class="btn btn-info">Quay Lại</a>
                </div>
            </div>
            <div class="row">
                <span class="text-success">
                    <?php echo $message = !empty($message) ? $message : "" ?>
                </span>
                <span class="text-danger">
                    <?php echo $error['quenmk'] = !empty($error['quenmk']) ? $error['quenmk'] : "" ?>
                </span>
            </div>
    </form>
</div>
