<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");

if(isset($_SESSION["user_id"])){
    $user = $_SESSION["user_id"];
    $rs = mysqli_query($cn, "SELECT * FROM wishlist WHERE userid = '$user'") or die("value not found");
}
else{
    header("Location:profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mens Room</title>
    <?php require("links.php");?>
</head>

<body>
    <?php
    require('header.php');
    ?>

    <!--  -->
    <!-- main content starts -->
    <!--  -->

    <h1 id="scrolltomainsec" style="margin-left: 68px; margin-top: 30px">Wishlist</h1>
    <div class="heading-line" style="width: 80px;"></div>
    <div class="shop-palettes">
        <?php
        while ($row = mysqli_fetch_assoc($rs)) {
            ?>
            <div class="palette">
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