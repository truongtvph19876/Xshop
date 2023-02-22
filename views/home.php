<?php
$slides = getSlides();
?>

<!-- CONTENT -->

<main class="container mx-auto row g-2">
    <!-- left content -->
    <div class="left-content col-9">
        <div class="slides">
            <div class="slides">
                <!-- slides -->
                <?php
                foreach ($slides as $slide):
                    extract($slide);
                    ?>
                    <div class="slide">
                        <p class="slide-info text-light h1 ">
                            <?php echo $info ?>
                        </p>
                        <img src="<?php echo $img ?>" alt="">
                    </div>
                    <?php
                endforeach;
                ?>
            </div>

            <!-- button slide -->

            <div class="slide-button">
                <a class="slide_prev_btn">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 9L10.5 12L13.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                            stroke="white" stroke-width="1.5" />
                    </svg>
                </a>
                <!-- next -->
                <a class="slide_next_btn">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 9L13.5 12L10.5 15" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                            stroke="white" stroke-width="1.5" />
                    </svg>
                </a>
            </div>
            <!-- dot -->
            <div class="dots">

            </div>
        </div>

        <!-- San pham -->
        <div class="row gx-2 gy-2 mt-3 gap-cs">

            <?php foreach ($listSanpham as $sanpham):
                extract($sanpham);
                $chitiet = 'index.php?act=chitietsp&id=' . $id . '';
                $img = substr($img, 1);
                ?>
                <!-- sp -->
                <a href="<?php echo $chitiet ?>" class="col-cs card text-decoration-none text-dark">
                    <img src="<?php echo $img ?>" class="card-img-top mt-2" width="300px" height="200px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title truncate">
                            <?php echo $name ?>
                        </h5>
                        <p class="card-text overflow-hidden text-black-50 truncate">
                            <?php echo $mota ?>
                        </p>
                        <p class="card-text fw-bold text-danger">
                            <?php echo number_format($price, 0, '', ',') ?> đ
                        </p>
                    </div>
                </a>

                <?php
            endforeach;
            ?>
        </div>
        <!--  -->
    </div>
    <!-- right content -->
    <div class="right-content col-3  border-0">
        <?php include './views/rightcontent.php'; ?>

        <!--  -->
    </div>
</main>