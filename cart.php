<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");

if (isset($_SESSION["user_id"])) {
    $user = $_SESSION["user_id"];
    if (isset($_REQUEST["cartid"])) {
        $cartid = $_REQUEST["cartid"];
        mysqli_query($cn, "delete from cart where cartid = $cartid");
        header("Location:cart.php");
    }
    $rs = mysqli_query($cn, "SELECT * FROM cart WHERE userid = '$user'") or die("value not found");
} else {
    header("Location: profile.php");
}

if (isset($_REQUEST["checkout"])) {
    header("Location:payment.php");
}
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
    require('header.php');
    ?>

    <!--  -->
    <!-- main content starts -->
    <!--  -->

    <h1 id="scrolltomainsec" style="margin-left: 68px; margin-top: 30px">Your Cart</h1>
    <div class="heading-line" style="width: 80px;"></div>
    <div class="shop-palettes cart-palette">

        <table class="cart-table">
            <tr>
                <th>Product Picture</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product size</th>
                <th>Product qty</th>
                <th>Product Price</th>
                <th>Remove</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                <tr>
                    <!-- "class="palette-img" -->
                    <td><img src="./admin_image/<?php echo $row['img']; ?>" alt=""
                            style="object-fit: cover;height: 100 !important; width: 100px;"></td>
                    <td>
                        <?php echo $row['title']; ?>
                    </td>
                    <td>
                        <?php echo $row['subtitle']; ?>
                    </td>
                    <td>
                        <?php echo $row['productsize']; ?>
                    </td>
                    <td>
                        <?php echo $row['qty']; ?>
                    </td>
                    <td>
                        <i class="fa-solid fa-indian-rupee-sign" style="font-size: 0.8rem;"></i>
                        <?php echo $row['price']; ?>
                    </td>
                    <td>
                        <a href="cart.php?cartid=<?php echo $row["cartid"]; ?>" class="cancel"><i
                                class="fa-solid fa-xmark"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="checkout-content">
            <!-- <a href="checkout.php" value="Checkout" style="display: block; text-align:center;" name="cart" id="btnbuy"
                class="product-btn checkout-btn">Checkout</a> -->
            <form method="post">
                <input type="submit" value="Checkout" style="display: block;" name="checkout" id="btnbuy"
                    class="product-btn checkout-btn">
                </input>
            </form>
        </div>
    </div>

    <!--  -->
    <!-- main content complete -->
    <!--  -->

    <?php
    require('footer.php');
    ?>
</body>

</html>