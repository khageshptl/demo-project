<?php
session_start();
$row = "";
$id = "";
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$result = "";
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $rs = mysqli_query($cn, "SELECT * FROM getimg WHERE id = $id");
    $row = mysqli_fetch_array($rs);
}
?>

<?php
// for the wishlist button


if (isset($_POST['wishlist'])) {
    if (isset($_SESSION['user_id'])) {
        $product_id = $row['id'];
        $user = $_SESSION['user_id'];
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $image = $row['img'];
        $price = $row['price'];
        $mrp = $row['mrp'];

        $result = mysqli_query($cn, "SELECT * FROM wishlist WHERE userid = '$user' and id = '$product_id'");

        if (mysqli_num_rows($result) > 0) {
            mysqli_query($cn, "DELETE FROM wishlist WHERE id = '$product_id'");
        } else {
            $rs = mysqli_query($cn, "INSERT INTO wishlist VALUES (0, '$id', '$user', '$title', '$subtitle', '$image', '$price', '$mrp')");
        }
    } else {
        header("Location:profile.php");
    }
}


// for the cart button

if (isset($_SESSION['user_id'])) {

    if (isset($_POST['cart'])) {
        $product_id = $row['id'];
        $user = $_SESSION['user_id'];
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $image = $row['img'];
        $price = $row['price'];
        $qty = $_POST['qty'];
        $size = $_POST['size'];

        $rs = mysqli_query($cn, "INSERT INTO cart VALUES (0, '$product_id', '$user', '$title', '$subtitle', '$image', '$price', '$size', '$qty')");

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php
    require('header.php');
    ?>
    <div class="product-container">
        <img src="./admin_image/<?php echo $row['img']; ?>" alt="" style="object-fit: cover;" class="product-img">
        <div class="product-details">
            <p style="color: #A4BBC9;">Urban Era</p>
            <br>
            <h1 style="color: #A4BBC9; font-size: 50px;">
                <?php echo $row['title']; ?>
            </h1>
            <h1 style="color: #A4BBC9;">
                <?php echo $row['subtitle']; ?>
            </h1>
            <p class="product-details-price"><i class="fa-solid fa-indian-rupee-sign"></i>
                <?php echo $row['price']; ?> &nbsp;
                <s style="color: #A4BBC9; font-weight: 200;">
                    <?php echo $row['mrp']; ?>
                </s>
            </p>
            <div style="display: flex;">

                <form method="post">
                    <button class="product-wish" name="wishlist">
                        <i class="fa-solid fa-heart"></i> &nbsp;&nbsp;Wishlist
                    </button>
                </form>
                <form method="post">
                    <?php
                    if ($row["category"] == "women shoes" || $row["category"] == "men shoes") {
                        ?>
                        <select name="size" class="product-size" id="size" required>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                    <?php } else { ?>
                        <select name="size" class="product-size" id="size">
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    <?php }
                    ?>
                    <input type="number" class="product-qty" name="qty" min="1" max="50" step="1" required>
            </div>

            <!-- <button style="display: block;" id="btncart" class="product-btn outline">Add to cart</button> -->

            <input type="submit" value="Add to cart" style="display: block;" name="cart" id="btnbuy"
                class="product-btn">
            </input>
            </form>

            <p style="line-height: 30px; margin-top: 20px; color: #A4BBC9;">Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Qui tempore aperiam placeat voluptatum dolore, maiores deleniti aliquid dolorem
                beatae, aut ipsam dignissimos nobis ratione possimus? Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Aperiam atque reiciendis doloremque sapiente provident corporis quam placeat, molestias facere
                expedita cumque consequatur quos tempore! Voluptatum consectetur inventore, incidunt exercitationem
                error quas. Exercitationem explicabo deserunt atque optio ipsa, minus perspiciatis possimus maiores
                porro et est rem. Sapiente eum error quis, veritatis consectetur dicta praesentium iure at!</p>
        </div>
    </div>
    <?php
    require('footer.php');
    ?>
</body>

</html>