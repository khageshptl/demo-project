<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$rs = mysqli_query($cn, "SELECT * FROM getimg WHERE category = 'men accessories'") or die("value not found");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens Room</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php
    require('men_header.php');
    ?>

    <!--  -->
    <!-- main content starts -->
    <!--  -->
    <a href="#scrolltomainsec" style="cursor: default;">
        <div class="men-banner" style="background-image: url('admin_image/banner4.jpg');"></div>
    </a>
    <br>
    <br>

    <h1 id="scrolltomainsec" style="margin-left: 68px;">MEN'S ACCESSORIES</h1>
    <div class="heading-line" style="width: 200px;"></div>
    <div class="shop-palettes">
    <?php
        while ($row = mysqli_fetch_assoc($rs)) {
            ?>
            <div class="palette">
                <!-- <button id="wishlist" class="cart-icon" onclick="toggle1()">
                    <i class="fa-solid fa-heart"></i>
                </button> -->
                <a href="product.php?id=<?php echo $row["id"]; ?>">
                    <img src="./admin_image/<?php echo $row['img']; ?>" alt="" style="object-fit: cover;"
                        class="palette-img">
                </a>
                <a href="product.php?id=<?php echo $row["id"]; ?>" class="pro-cate">
                    <?php echo $row['title']; ?>
                </a>
                <hr>
                <a href="product.php?id=<?php echo $row["id"]; ?>" class="pro-type">
                    <?php echo $row['subtitle']; ?>
                </a>
                <a href="product.php?id=<?php echo $row["id"]; ?>">
                    <p class="pro-price"><i class="fa-solid fa-indian-rupee-sign"></i>
                        <?php echo $row['price']; ?>&nbsp;
                        <s style="color: grey; font-weight: 200;">
                            <?php echo $row['mrp']; ?>
                        </s>
                    </p>
                </a>
            </div>
            <?php
        }
        ?>
    </div>

    <!--  -->
    <!-- main content complete -->
    <!--  -->

    <?php
    require('footer.php');
    ?>
</body>

</html>