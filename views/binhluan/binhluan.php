<?php 
  if(isset($_POST['sendcomment'])) {
    $noidung = $_POST['comment'];
    $idUser = $_SESSION['idUser'];
    $ngaybinhluan = date("Y-m-d H:i:s");
    $idProd = $_GET['id'];
    $error =[];

    if(empty($noidung)) {
      $error['noidung'] = "Vui lòng nhập bình luận";
    }
    if($idUser <= 0) {
      $error['user'] = "Loi user id";
    }
    if($idUser <= 0) {
      $error['sanpham'] = "Loi sanpham id";
    }

    if(empty($error)) {
      $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) VALUES
      ('$noidung', '$idUser', '$idProd', '$ngaybinhluan')";
      pdo_execute($sql);

    }
    
  }
  
?>

<h2 class="mt-3 border-bottom border-primary border-2">Bình luận</h2>

<?php 
  if(isset($_SESSION['username'])){
?>
<form action=""></form>
<form action="" method="post" class="align-items-start">
<div class="w-75 d-flex">
        <input type="text" name="comment" class="form-control" placeholder="Viết bình luận">
        <button class="btn btn-primary" name="sendcomment">Gửi</button>
      </div>
      <span class="text-danger"><?php echo $message = !empty($error['noidung']) ? $error['noidung'] : "" ?></span>
      </form>
<?php }?>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<?php 
  $listComments = loadComments($_GET['id']);
  foreach($listComments as $comment):
    extract($comment); 
    $userbinhluan = getUser($iduser);
    extract($userbinhluan);

    $image = !empty($img) ? $img : "./uploads/customer/images.png";


    $date1 = new DateTime($ngaybinhluan);
    $date2 = new DateTime(date("Y-m-d H:i:s"));
    $interval = $date1->diff($date2);

    $timeAgo = '';
    $timeAgo .= $interval->y > 0 ? $interval->y . " năm " : "";
    $timeAgo .= $interval->m > 0 ? $interval->m . " tháng ": "";
    $timeAgo .= $interval->d > 0 ? $interval->d . " ngày ": "";
    $timeAgo .= $interval->h > 0 ? $interval->h . " giờ ": "";
    $timeAgo .= $interval->i > 0 ? $interval->i . " phút ": "";
    $timeAgo .= $interval->s > 0 ? $interval->s . " giây ": "";
    $timeAgo .= $interval->s == 0 ? " vừa xong" : " trước";
    
?>


<div class="container">
<div class="row">
    <!--  -->
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment d-flex">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?php echo $image?>" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30 w-100">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php echo $tendn?></h5>
                <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo $timeAgo?></span>
              </div>
        
              <p><?php echo $noidung?></p>
        
              <ul class="list-inline d-sm-flex my-0">
                <!-- <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover text-decoration-none" href="#!">
                    <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                    178
                  </a>
                </li>
                <li class="list-inline-item g-mr-20">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover text-decoration-none" href="#!">
                    <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                    34
                  </a>
                </li> -->
                <li class="list-inline-item ml-auto">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover text-decoration-none" href="#!">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Trả lời
                  </a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <!--  -->
</div>
</div>

<?php endforeach;?>
