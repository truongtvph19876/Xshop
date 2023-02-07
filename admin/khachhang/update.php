<?php 
    $city = '';
    $district = '';
    $ward = '';
    $addr = $address;
    if (isset($_POST['capnhat'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $image = 'uploads/customer/';
        $city = $_POST['city'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        
        
        $messageEmpty = 'Trường này không được để trống';
        $error = [];
        if(empty($username)){
            $error['username'] = $messageEmpty;
        }
        if(empty($password)){
            $error['password'] = $messageEmpty;
        }else {
            if(strlen($password) < 3) {
                $error['password'] = 'Tối thiểu 3 ký tự';
            }
        }

        if(empty($addr) || !empty($city) || !empty($district) || !empty($ward)){
            $addr = !empty($city) ? '-'.$city : '';
            $addr .= !empty($district) ? '-'.$district : '';
            $addr .= !empty($ward) ? '-'.$ward : '';
        }
        if(empty($_FILES['img']['name'])) {
            $image = $img;
        } else {
            $image .= $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $image);
        }

        if(empty($error)){
            $sql = "UPDATE taikhoan SET 
                `username` = '$username',
                `password` = '$password',
                `email` = '$email',
                `img` = '$image',
                `address` = '$addr',
                `phone` = '$phone'
                WHERE `id` = '$id'
                ";
            pdo_execute($sql);
            $thongbao = 'Cập nhật thành công';
        }
    }

?>

<div class="container row">
<h1 class="row ">Cập Nhật Tài Khoản</h1>
    <form action="" method="post" enctype="multipart/form-data" class="w-100">
            <div class="row w-100">
                <div class="col">
                    <label class="form-label">UID</label>
                    <input type="text" class="form-control" value="<?php echo $id?>" placeholder="UID" disabled>
                </div>
                <div class="col">
                    <label class="form-label">Tên Đăng Nhập</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $tendn?>" placeholder="Tên đăng nhập" autofocus>
                    <span class="text-danger"><?php echo $message = !empty($error['username']) ? $error['username'] : "";?></span>
                </div>
                <div class="col">
                    <label class="form-label">Mật Khẩu</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password?>" placeholder="Mật khẩu">
                    <span class="text-danger"><?php echo $message = !empty($error['password']) ? $error['password'] : "";?></span>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email?>" placeholder="Email" autofocus>
                    <span></span>
                </div>
                <div class="col">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $phone?>" placeholder="Phone" autofocus>
                    <span></span>
                </div>
                <div class="col">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="img" class="form-control" value="<?php echo $img?>" placeholder="" autofocus>
                    <span></span>
                </div>
            </div>

            <div class="row w-100">
            <div class="col">
                    <label class="form-label">Tỉnh/Thành Phố</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $city?>" placeholder="Tỉnh/Thành Phố" autofocus>
                </div>
                <div class="col">
                    <label class="form-label">Quận/Huyện</label>
                    <input type="text" name="district" class="form-control" value="<?php echo $district?>" placeholder="Quận/Huyện" autofocus>
                </div>
                <div class="col">
                    <label class="form-label">Phường/Xã</label>
                    <input type="text" name="ward" class="form-control" value="<?php echo $ward?>" placeholder="Phường/Xã" autofocus>
                </div>
            </div>

            <!-- <div class="row w-100 py-4 px-2" >
                    <select class="form-select mb-3" id="city">
                      <option id="idcistis" value="" selected>Tỉnh / Thành Phố</option>           
                    </select>
                    
                    <select class="form-select mb-3" id="district">
                        <option value="" selected>Quận / Huyện</option>
                    </select>
                    
                    <select class="form-select mb-3" id="ward">
                        <option value="" selected>Xã / Phường</option>
                    </select>
            </div>   -->
            <div class="row my-4">
                <div>
                <input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                <input class="btn btn-danger" type="reset" value="Nhập lại">
                <a href="index.php?act=dskh" class="btn btn-info">Quay Lại</a>
                </div>
            </div>
           <span class="text-success"> <?php 
                echo $thongbao = !empty($thongbao) ? $thongbao : "";
            ?></span>
    </form>
    <script src="./views/js/app.js"></script>
</div>
