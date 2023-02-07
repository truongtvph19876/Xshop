
                <?php include 'views/taikhoan/login.php';?>
                <!-- categories -->
                <div class="danhMuc col mb-0 mt-3">
                    <h2 class="top mb-0">Danh mục</h2>
                    <ul class="list-group list-unstyled">
                        <?php 
                            foreach($listDanhmuc as $danhmuc):
                                extract($danhmuc);
                                $chitietDanhmuc = 'index.php?act=sanpham&id='.$id.'';
                        ?>
                            <a href="<?php echo $chitietDanhmuc?>" class="list-group-item"><li class="list-style-none"><?php echo $name?></li></a>
                        <?php endforeach;?>
                    </ul>
                    <form action="index.php?act=sanpham" method="post">
                    <div class="input-group">
                    <input type="text" name="keyword" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                    <input type="submit" name="tim" class="input-group-text"value="Tìm" >
                    </div>
                    </form>
                </div>
                <!--  -->
                <!-- top 10 yeu thich -->
                <!-- categories -->
                <div class="danhMuc col mb-0 mt-3">
                    <h2 class="top mb-0">Top 10 Sản phẩm yêu thích</h2>
                    <ul class="list-group list-unstyled">
                        <?php 
                            foreach($listSanphamYeuThich as $yeuthich):
                                extract($yeuthich);
                                $sanphamYeuThich = 'index.php?act=chitietsp&id='.$id.'';
                                $img = substr($img, 1);
                        ?>

                            <a href="<?php echo $sanphamYeuThich?>" class="list-group-item d-flex gap-2">
                            <img src="<?php echo $img?>" width="50px" height="50px" alt="">
                            <li class="list-style-none truncate-1"><?php echo $name?></li>
                            </a>
                        <?php endforeach;?>
                    </ul>
                    <form action="index.php?act=sanpham" method="post">
                    <div class="input-group">
                    <input type="text" name="keyword" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                    <input type="submit" name="tim" class="input-group-text"value="Tìm" >
                    </div>
                    </form>
                </div>
                <!--  -->