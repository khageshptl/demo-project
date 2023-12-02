<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require("links.php"); ?>
</head>

<body style="background-color: #a4bbc940;">

    <?php
    require('header.php');
    ?>

    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url('images/home/home4.jpg');background-size: cover;">
            </div>
            <div class="swiper-slide" style="background-image: url('images/home/home1.jpg');background-size: cover;">
            </div>
            <div class="swiper-slide" style="background-image: url('images/home/home2.jpg');background-size: cover;">
            </div>
            <div class="swiper-slide" style="background-image: url('images/home/home3.jpg');background-size: cover;">
            </div>
            <div class="swiper-slide" style="background-image: url('images/home/img5.jpg');background-size: cover;">
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>

    <br>
    <h1 style="text-align: center;">SHOP BY FANDOM</h1>
    <br>
    <div class="box-images-section">
        <a href="men.php">
            <div class="box-img" style="background-image: url('images/home/fanbase2.webp');"></div>
        </a>
        <a href="women.php">
            <div class="box-img" style="background-image: url('images/home/fanbase1.jpg');"></div>
        </a>
        <a href="men.php">
            <div class="box-img" style="background-image: url('images/home/fanbase3.webp');"></div>
        </a>
    </div>

    <br>
    <h1 style="text-align: center;">COLLECTIONS</h1>
    <br>
    <div class="box-images-section">
        <a href="women.php">
            <div class="box-img" style="background-image: url('images/home/collection2.jpg');"></div>
        </a>
        <a href="men.php">
            <div class="box-img" style="background-image: url('images/home/collection1.jpg');"></div>
        </a>
        <a href="women.php">
            <div class="box-img" style="background-image: url('images/home/img4.jpg');"></div>
        </a>
    </div>

    <br>
    <h1 style="text-align: center;">CATEGORIES</h1>

    <div class="categories">
        <a href="men.php">
            <div class="cate-img" style="background-image: url('images/home/shirts.webp');"></div>
        </a>
        <a href="men.php">
            <div class="cate-img" style="background-image: url('images/home/tshirts.webp');"></div>
        </a>
        <a href="men.php">
            <div class="cate-img" style="background-image: url('images/home/oversized.webp');"></div>
        </a>
        <a href="men_bottom.php">
            <div class="cate-img" style="background-image: url('images/home/boxer.webp');"></div>
        </a>
        <a href="men_bottom.php">
            <div class="cate-img" style="background-image: url('images/home/cargo.webp');"></div>
        </a>
        <a href="men_bottom.php">
            <div class="cate-img" style="background-image: url('images/home/beach.webp');"></div>
        </a>
    </div>
    <br><br>

    <?php
    require('footer.php');
    ?>

</body>

</html>