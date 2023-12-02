<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$total = 0;
if (isset($_SESSION["user_id"])) {
    $user = $_SESSION["user_id"];
    $rs = mysqli_query($cn, "SELECT * FROM cart WHERE userid = '$user'") or die("value not found");

    if (isset($_REQUEST['paid'])) {
        header("Location:commingsoon.php");
    }

} else {
    header("Location: profile.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php require("header.php"); ?>

    <div class="sec-checkout">
        <div class="sec-checkout-content">
            <h1 style="color: #415a77;">Payment Receipt</h1>
            <br>
            <form method="post">
                <table class="cart-table checkout-receipt" style="width:430px;border:none;padding:10px;">
                    <tr>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($rs)) {
                        ?>
                        <tr>
                            <!-- "class="palette-img" -->
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['qty']; ?>
                            </td>
                            <td>
                                <i class="fa-solid fa-indian-rupee-sign" style="font-size: 0.8rem;"></i>
                                <?php
                                for ($i = 1; $i < $row['qty']; $i++) {
                                    $row['price'] += $row['price'];
                                }
                                echo $row['price'];
                                $total += $row['price'];
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <span>
                            <td style="border:none;"></td>
                            <td style="border:none;"></td>
                            <td>
                                <i class="fa-solid fa-indian-rupee-sign" style="font-size: 0.8rem;"></i>
                                <?php echo $total; ?>
                            </td>
                        </span>
                    </tr>
                </table>
                <div class="payment-btn">
                    <input type="submit" value="Pay Now" name="paid" id="btnbuy" class="product-btn payment">
                    </input>
                    <input type="submit" value="COD" name="paid" id="btnbuy" class="product-btn payment">
                    </input>
                </div>
            </form>
        </div>
    </div>

    <!-- <?php require("footer.php"); ?> -->

</body>

</html>