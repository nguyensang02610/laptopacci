<head>
<!-- Phần css và js của slider product -->
<meta content="" name="description">
<meta content="" name="keywords">
<!-- Favicons -->
<link href="img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<!-- Phần css và js của slider product -->
</head>

<?php include './include/header.php'; ?>

<title>Trang chủ</title>
<style>
    body {
        background-color: white;
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/slide1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/slide2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/slide4.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--Slide product-->
<h3 class="text_slide">LAPTOP THEO HÃNG</h3>
<div class="product_nav">
    <!-- Product 1 -->
    <div class="card" style="width: 12vw;">
        <a href="list_product_by_brand.php?brand=Asus">
            <img src="./img/maytinhxachtay.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">LAPTOP ASUS ROG</h5>
            </div>
        </a>
    </div>
    <!-- Product 2 -->
    <div class="card" style="width: 12vw;">
        <a href="list_product_by_brand.php?brand=Dell"><img src="./img/laptop_dell.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">LAPTOP DELL</h5>
            </div>
        </a>
    </div>
    <!-- Product 3 -->
    <div class="card" style="width: 12vw;">
        <a href="list_product_by_brand.php?brand=HP">
            <img src="./img/laptop_hp.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">LAPTOP HP PAVILION</h5>
            </div>
        </a>
    </div>
    <!-- Product 4 -->
    <div class="card" style="width: 12vw;">
        <a href="list_product_by_brand.php?brand=MSI">
            <img src="./img/laptop_msi.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">LAPTOP MSI RADIER</h5>
            </div>
        </a>
    </div>
    <!-- Product 5 -->
    <div class="card" style="width: 12vw;">
        <a href="list_product_by_brand.php?brand=Acer">
            <img src="./img/laptop_acer.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">LAPTOP ACER NITRO</h5>
            </div>
        </a>
    </div>
    <!-- Product 5 end-->
</div>
<!-- Slide product-->
<h3 class="text_slide" style="margin-bottom:-5px!important">SẢN PHẨM BÁN CHẠY</h3>
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <!-- Start testimonial item -->
                <?php
                $product_list = $product->show_product_hot();
                if ($product_list) {
                    while ($result = $product_list->fetch_assoc()) {
                ?>
                    <div class="swiper-slide">
                        <a href="details_product.php?product_id=<?php echo $result['product_id']?>">
                            <div class="testimonial-item">
                                <img src="./admin/uploads/<?php echo $result['image'] ?>" class="testimonial-img" alt="">
                                <h3><?php echo $result['tensp_shortcut'] ?></h3>
                                <h3><?php echo $fm->currency_format($result['price_discount']) ?></h3>
                            </div>
                        </a>
                    </div>     
                <?php
                    }
                }
                ?>
                <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
<!-- End Testimonials Section -->

<!--Div news-->
<div class="div3">
    <h3 class="rog_text">TIN TUC - KHUYEN MAI</h3>
</div>
<div class="product_content">
    <div class="news_item">
        <a href="#">
            <div class="image_news">
                <img src="./img/news_image1.jpg" alt="news_1" width="100%">
            </div>
            <div class="text_news_2">
                <img src="./img/news.png" alt="news_icon" style="text-align: left;width: 100px;">
                <p class="news_title_1">ASUS ZENBOOK UX325 OLED - ASUS ĐANG PHỔ CẬP LAPTOP MÀN HÌNH OLED</p>
                <p class="news_title_2">Thiết bị laptop Oled gần đây đã được trú trọng vì tính đột phá của nó. Tuy nhiên, laptop Oled vẫn là 1 thứ khó tiếp cận đến người dùng cơ bản vì mức giá.</p>
            </div>
        </a>
    </div>

    <div class="news_item">
        <a href="#">
            <div class="image_news">
                <img src="./img/news_image2.jpg" alt="news_1" width="100%">
            </div>
            <div class="text_news_2">
                <img src="./img/news.png" alt="news_icon" style="text-align: left;width: 100px;">
                <p class="news_title_1">ASUS KỶ NIỆM HÀNH TRÌNH ZENBOOK 10 NĂM: KIẾN TẠO. GHI DẤU. MỞ TƯƠNG LAI</p>
                <p class="news_title_2">Từ những mẫu ZenBook đầu tiên ra mắt thế giới năm 2011, qua 10 năm, ZenBook luôn là biểu tượng của tinh thần đổi mới, sáng tạo, nghệ thuật, cao cấp, hướng tới trải nghiệm vượt ngoài mong đợi của ASUS & ngành công nghệ.</p>
            </div>
        </a>
    </div>

    <div class="news_item">
        <a href="#">
            <div class="image_news">
                <img src="./img/news_image3.jpg" alt="news_1" width="100%">
            </div>
            <div class="text_news_2">
                <img src="./img/news.png" alt="news_icon" style="text-align: left;width: 100px;">
                <p class="news_title_1">TỔNG HỢP CTKM KHI MUA ROG ZEPHYRUS 14/ G14 AW SE VÀ BIGGAME CHIA SẺ GÓC LAPTOP
                </p>
                <p class="news_title_2">CHƯƠNG TRÌNH KHUYẾN MÃI KHI MUA ROG ZEPHYRUS 14 VÀ ZEPHYRUS G14 AW SE</p>
            </div>
        </a>
    </div>
</div>

<div class="css_text">
    <a href="#" class="timhieu">
        TÌM HIỂU THÊM
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16" style="size: 10px;">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
    </a>
</div>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php include './include/footer.php'; ?>