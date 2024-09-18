<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzzy Mata - Home</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <style>
    .availability-form {
        margin-top: -58px;
        z-index: 2;
        position: relative;
    }

    @media screen and (max-width: 57px) {
        .availability-form {
            margin-top: 25px;
            padding: 0 35px;
        }
    }
    </style>
</head>


<body class="bg-light">
    <?php  require('inc/header.php') ?>

    <!--Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images1/carousel/banner.jpeg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images1/carousel/banner.jpeg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src=" images1/carousel/banner.jpeg" class="w-100 d-bloc" k />
                </div>
                <div class="swiper-slide">
                    <img src=" images1/carousel/banner.jpeg" class="w-100 d-bloc" k />
                </div>
                <div class="swiper-slide">
                    <img src=" images1/carousel/banner.jpeg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src=" images1/carousel/banner.jpeg" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="fw-bold h-font text-center">Selamat
                    Datang</h5>
                <div class="h-line bg-dark "></div> <br>
                <p>Sistem pakar diagnosa penyakit pada mata
                    ini
                    merupakan sebuah sistem yang dapat membantu para penderita penyakit
                    mata
                    dalam mendiagnosa penyakit mata. sistem ini menggunakan basis
                    pengetahuan yang didapatkan dari beberapa pakar kesehatan mata dapat
                    mendeteksi gejala-gejala dini penyakit pada mata sehingga akan
                    membantu
                    anda dalam memberikan solusi pengotan yang tepat.</p> <br>

                <p>Penyakit mata sangat beragam dan tidak semuanya dapat menular. Jika
                    penyakit mata disebabkan virus atau bakteri maka bisa menular,
                    sedangkan
                    jika penyebabnya alergi tidak akan menular. Cara penanganan dan
                    pencegahan macam-macam penyakit mata ini pun berbeda, tergantung
                    penyebabnya. Berikut ini beragam penyakit mata yang perlu anda
                    ketahui.</p>
            </div>

        </div>
    </div>
    <br>
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded text-center">
                <a style="background-color:#F90; color:#ffffff; padding:10px 20px; border:2px dashed #333; display:inline-block; text-decoration:none; font-weight:bold;"
                    href="proses-diagnosa.php?top=pasien_add_fm.php" class="active">
                    Mulai Diagnosa &raquo;&raquo;
                </a>
            </div>
        </div>
    </div>

    <?php require ('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
    });

    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
    </script>
</body>

</html>