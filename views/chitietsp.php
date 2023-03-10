<?php 


?>
<!--  -->
<!--  -->


<div class="super_container">
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected"><img src="<?php echo substr($img, 1)?>" alt=""></div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                                <li class="breadcrumb-item active"><?php echo $loai?></li>
                            </ol>
                        </nav>
                        <div class="product_name"><?php echo $tensp?></div>
                        <div class="product-rating"><span class="rating-review"><?php echo $luotxem?> Lượt xem</span></div>
                        <div> <span class="product_price"><?php echo number_format($price, 0, 0, ',')?> <span class="text-danger fs-4 fst-italic">đ</span></span> <strike class="product_discount"> <span style='color:black'><?php echo number_format($price, 0, 0, ',')?> đ<span> </strike> </div>
                        <hr class="singleline">
                        <div><span class="product_info">Bảo hành: 6 tháng<span><br> <span class="product_info">7 ngày 1 đổi 1<span><br><span class="product_info">Trạng thái: <?php echo $status = $soluong > 0 ? "<span class='text-success'>Còn hàng</span>" : "<span class='text-danger'>Hết hàng</span>" ?><span> </div>
                        <div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="br-dashed">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-3"> <img src="https://img.icons8.com/color/48/000000/price-tag.png"> </div>
                                            <div class="col-md-9 col-xs-9">
                                                <div class="pr-info"> <span class="break-all">Giảm giá 5% đối với học sinh, sinh viên</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7"> </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-xs-6" style="margin-left: 15px;"> <span class="product_options">RAM</span><br> <button class="btn btn-primary btn-sm">4 GB</button> <button class="btn btn-primary btn-sm">8 GB</button> <button class="btn btn-primary btn-sm">16 GB</button> </div>
                                <div class="col-xs-6" style="margin-left: 15px;"> <span class="product_options">Bộ nhớ</span><br> <button class="btn btn-primary btn-sm">500 GB</button> <button class="btn btn-primary btn-sm">1 TB</button> </div>
                            </div>
                        </div>
                        <hr class="singleline">
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="margin-left: 13px;">
                                <div class="product_quantity"> <span>Số Lượng: </span> <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6"> <button type="button" class="btn btn-primary shop-button">Thêm vào giỏ hàng</button> <button type="button" class="btn btn-success shop-button">Mua ngay</button>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-underline">
                <div class="col-md-6"> <span class=" deal-text">Mô tả sản phẩm</span> </div>
                <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
            </div>
            <div class="row">
                <p><?php echo $mota?></p>

            </div>

            <div class="row row-underline">
                <div class="col-md-6"> <span class=" deal-text">Sản phẩm đề xuất</span> </div>
                <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a> </div>
            </div>
            <div class="row g-0">

                <?php 

                    foreach($sanphamLienQuan as $sanpham):
                        extract($sanpham);
                            if($idSPLQ == $id) 
                                continue;
                            $chitiet = 'index.php?act=chitietsp&id='.$id.'';
                            $img = substr($img, 1);
                        
                ?>
                <!-- sp -->
                <a href="<?php echo $chitiet?>" class="col-cs card text-decoration-none text-dark ">
                    <img src="<?php echo $img?>" class="card-img-top my-2" width="200px" height="250px" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title truncate"><?php echo $tensp?></h5>
                        <p class="card-text overflow-hidden text-black-50 truncate"><?php echo $mota?></p>
                        <p class="card-text text-danger flex-self-end"><?php echo number_format($price, 0, 0, ',')?> đ</p>
                    </div>
                </a>

                <?php 
                    endforeach;
                ?>
                </div>
                
                <div class="comments container-fluid m-0 p-0">

                </div>
                <script>
                    const idSanPham = <?=$_GET['id']?>; // lấy id sản phẩm
                    function loadComments() {
                        // nạp trang comments vào trang sản phẩm
                        fetch("./views/binhluan/binhluan.php?idSanPham=" + idSanPham)
                        
                        .then(response => response.text())
                        .then(data => {
                            // innerHTML tất cả dữ liệu đc nạp vào element có class là comments
                            document.querySelector(".comments").innerHTML = data;
                            // thêm sự kiện onclick cho tất cả nút bấm viết bình luận, phản hồi bình luận
                            document.querySelectorAll(".rep-btn").forEach(e => {
                                e.onclick = event => {
                                    event.preventDefault();
                                    if (document.querySelector("div[parent-id='" + e.getAttribute("parent-id") + "']").style.display == 'none') {
                                        document.querySelector("div[parent-id='" + e.getAttribute("parent-id") + "']").style.display = 'block';
                                        document.querySelector("div[parent-id='" + e.getAttribute("parent-id") + "'] textarea[name='content']").focus();
                                    } else {
                                        document.querySelector("div[parent-id='" + e.getAttribute("parent-id") + "']").style.display = 'none';
                                    }
                                };
                            }
                        );
                        // thêm sự kiện submit cho các 
                        document.querySelectorAll("form").forEach(element => {
                            element.onsubmit = event => {
                                event.preventDefault();
                                fetch("./views/binhluan/binhluan.php?idSanPham=" + idSanPham, {
                                    method: 'POST',
                                    body: new FormData(element)
                                })
                                .then(response => response.text())
                                .then(data => {
                                    element.parentElement.innerHTML = data;
                                    loadComments();
                                });
                                };
                            });
                        });
                    }
                loadComments();
            </script>
        </div>
    </div>
</div>