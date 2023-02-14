<head>
  <link rel="stylesheet" href="../css/chi_tiet_san_pham.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/css/bootstrap.min.css">
</head>

<?php
session_start();

// Update the details below with your MySQL details
  include $_SERVER['DOCUMENT_ROOT'] . '/DuAnMau/model/pdo.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/DuAnMau/model/nguoidung.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/DuAnMau/model/sanpham.php';

  // Below function will convert datetime to time elapsed string
function handleCommentTime($from, $to = null) {
    $result = '';
    if(isset($to)) {

    } else {
      $from = new DateTime($from);
      $to = new DateTime(date("Y-m-d H:i:s"));
      
      if ($from->diff($to) === null) {
        echo "Không thể chuyển DateInterval object thành array";
    } else {
        $arraytmp = get_object_vars($from->diff($to));
        $array = array_slice($arraytmp, 0, 6);
        $string = ['năm', 'tháng', 'ngày', 'giờ', 'phút', 'giây'];
        $newArray = array_combine($string, $array);

        foreach ($newArray as $key => $val) {
          if($val > 0) {
            $result = $val . ' ' . $key;
            break;
          } else {
            $result = 'Vừa xong';
          }
        }
    }

    }

    return $result;
}

// This function will populate the comments and comments replies using a loop
function show_comments($comments, $parent_id = -1) {
  $html = '';

  if ($parent_id != -1) {
      // If the comments are replies sort them by the "submit_date" column
      array_multisort(array_column($comments, 'ngaybinhluan'), SORT_ASC, $comments);
  }
  // Iterate the comments using the foreach loop
  foreach ($comments as $comment) {
      if ($comment['id_parent'] == $parent_id) {
          // tính toán thời gian bình luạna
          $commentTime = handleCommentTime($comment['ngaybinhluan']);
          //lấy thông tin người dùng và sản phẩm từ id
          $user = getUser($comment['iduser']);
          $imgUser = $user['img'];
          // Add the comment to the $html variable
          $html .= '
          <div class="row w-100 mt-3 comment border-0 m-0 p-0">
        <!--  -->
        <div class="col-12 g-bg-secondary  border-top border-primary p-0">
            <div class="media g-mb-30 media-comment d-flex pl-2">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15d" src="'.$imgUser.'" alt="Image Description">
                <div class="media-body w-100" style="padding-left:40px">
                  <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">'.$user['tendn'].'</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">'.$commentTime.'</span>
                  </div>
            
                  <p>'.$comment['noidung'].'</p>
            
                  <ul class="list-inline d-sm-flex my-0">
                                        
                    <li class="list-inline-item ml-auto w-100">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover text-decoration-none d-flex align-items-baseline gap-1 rep-btn" href="#!" parent-id="'.$comment['id'].'">
                          <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                          <p class="text-nowrap">Trả lời</p>
                        </a>
                        <!-- Form write comment -->
                        
                        ' . comment_form($comment['id']) . '
                        <!-- end form  -->
                    </li>
                    </ul>
                    <!-- subcomment -->
                    ' . show_comments($comments, $comment['id']) . '
                    <!--  -->
                        
                  </ul>
                </div>
            </div>
        </div>
        <!--  -->
    </div>
          ';
      }
  }
  return $html;
}

// hiển thị form comment
function comment_form($parent_id = -1, $display = 'none') {

  $html = '
  <div class="write_comment" parent-id="'.$parent_id.'" style="display:'.$display.'">
      <form class="align-items-start" method="post">
          <input name="parent_id" type="hidden" value="'.$parent_id.'">
          <textarea class="form-control w-100" rows="3"  name="content" placeholder="Write your comment here..." required></textarea>
          <button class="btn btn-primary mt-1" type="submit">Gui</button>
      </form>
  </div>
  ';
  return $html;
}

// select sản phẩm theo id sản phẩm
  $pdo =pdo_get_connection();
    $idSanPham = $_GET['idSanPham'];
    $stmt = $pdo->prepare('SELECT * FROM binhluan WHERE idpro = '.$idSanPham.' ORDER BY ngaybinhluan DESC');
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if(isset($_POST['content']) && $_SESSION['username']) {
       $parent_id = $_POST['parent_id'];
       $userId = $_SESSION['idUser'];
       $content = $_POST['content'];
       $prodId  = $_GET['idSanPham'];
       $today = date("Y-m-d H:i:s");

      $sql = "INSERT INTO binhluan (`id_parent`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
      ('$parent_id', '$content','$userId', '$prodId', '$today')";
      pdo_query($sql);

    }
?>


<h2 class="mt-3 border-bottom border-primary border-2">Bình luận</h2>

<?php 
if (isset($_SESSION['username'])) {
  echo comment_form(-1,'block');
} else {
  echo 'Vui lòng đăng nhập để bình luận';
}
?>

<?php echo show_comments($comments)?>

