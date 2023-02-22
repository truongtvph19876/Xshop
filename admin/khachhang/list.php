<?php 

    $keyword = '';
    $idUser = 0;
    if (isset($_POST['loc'])) {
        $keyword = $_POST['keyword'];
        $idUser = $_POST['idUser'];

    }
    $listUsers = getListUsers($idUser, $keyword);
?>

<form action="index.php?act=dskh" method="post">
    <h2>Tìm kiếm khách hàng</h2>


    <div class="input-group mb-3 row w-50">
    <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm khách hàng">

    <select class="form-select" name="idUser">
    <option selected value="0">Tất cả</option>
    <option value="1">Admin</option>
    <option value="2">Khách hàng</option>
    
    </select>


    <button class="btn btn-primary" name="loc">Tìm</button>
    </div>

</form>

<table class="table table-striped">
    <thead>
        <tr>
            <td><input type="checkbox" id="all-checkbox"></td>
            <td>ID</td>
            <td>Username</td>
            <td>Password</td>
            <td>Ảnh</td>
            <td>Email</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Loại</td>
            <td colspan="2"><a href="index.php?act=signin" class="btn btn-info">Tạo tài khoản</a></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $image = '';
         foreach ($listUsers as $user):
            extract($user);
            $suaUser = "index.php?act=updatekh&id=$id";
            $xoaUser = "index.php?act=deletekh&id=$id";
            $loai = $auth == 1 ? "Admin" : "User";
            if (is_file('../'. $img)) {
                $image = "<img class='rounded-circle' src='../$img' width='50px' height='50px' alt=''>";
            } else {
                $image ="<img class='rounded-circle' src='../uploads/customer/images.png' width='100px' height='50px' alt=''>";
            }
            
        ?>
        <tr>
            <td><input type="checkbox" name="<?php echo $id?>"></td>
            <td><?php echo $id?></td>
            <td><?php echo $tendn?></td>
            <td class="field-password">
                <input type="password" value="<?php echo $password?>" size="5" class="bg-transparent border-0 outline-0 w-25">
                <span class="pointer">
                <i class="fa-solid fa-eye"></i>
                </span>
            </td>
            <td><?php echo $image?></td>
            <td><?php echo $email?></td>
            <td><?php echo $address?></td>
            <td><?php echo $phone?></td>
            <td><?php echo $loai?></td>
            <td>
                <a href="<?php echo $suaUser?>" class="btn btn-success">Sửa</a>
                <a href="<?php echo $xoaUser?>" class="btn btn-danger" onclick="return confirm('Xác nhận xóa')">Xóa</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>

</table>
<a href="#!" class="btn btn-info">Chọn tất cả</a>
<a href="#!" class="btn btn-info">Bỏ chọn tất cả</a>
<a href="#!" class="btn btn-info">Xóa các mục đã chọn</a>

<script>
    let field_password = document.querySelectorAll('.field-password');
    field_password.forEach((field)=> {
        field.addEventListener('click', ()=> {
            let input = field.querySelector("input[type]");
            let show = field.querySelector("span");

            if(input.type == 'password'){
                input.type = 'text';
                show.innerHTML = "<i class='fa-solid fa-eye-slash'></i>";
            } else {
                input.type = 'password';
                show.innerHTML = "<i class='fa-solid fa-eye'></i>";
            }
        });
    });
</script>
