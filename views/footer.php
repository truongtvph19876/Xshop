

<style>
.bg-footer {
  background: #2a2e32;
}

.text-small {
  font-size: 0.9rem;
}

a {
  text-decoration: none;
  transition: all 0.3s;
}

a:hover, a:focus {
  text-decoration: none;
}
footer {
  background: #212529;
}
</style>

<div class="d-flex flex-column bg-footer mt-2">
    <!-- FOOTER -->
    <footer class="w-100 py-4 flex-shrink-0">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">XSHOP</h5>
                    <p class="small text-muted">Chuỗi của hàng chuyên cung cấp các thiết bị điện thoại di động uy tí giá rẻ.</p>
                    <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="index.php">Xshop.com</a></p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Danh mục</h5>
                    <ul class="list-unstyled text-muted">
                        <?php 
                            $stt = 0;
                            foreach($listDanhmuc as $item) :
                                if ($stt == 5) break;
                                $stt++;
                        ?>
                        <li><a href="#"><?=$item['name']?></a></li>
                        <?php 
                        
                        endforeach;?>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white text-nowrap mb-3">Sản Phẩm nổi bật</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Nhận thông báo từ chúng tôi</h5>
                    <p class="small text-muted">Chúng tôi sẽ thông báo tới bạn khi có sản phẩm mới nhất</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Nhập Email hoặc số điện thoại" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<script src="./views/js/slide.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>