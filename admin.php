<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$url = "C:\\xampp\\htdocs\\UrbanEra\\admin_image\\";
$cate = $title = $subtitle = $price = $mrp = $image = "";
if (isset($_SESSION["admin_name"])) {

    if (isset($_FILES['img'])) {
        move_uploaded_file($_FILES['img']['tmp_name'], $url . $_FILES['img']['name']);
    }
    if (isset($_REQUEST['uploadimg'])) {
        $cate = $_REQUEST['category'];
        $title = $_REQUEST['title'];
        $subtitle = $_REQUEST['subtitle'];
        $price = $_REQUEST['price'];
        $mrp = $_REQUEST['mrp'];
        if ($_FILES['img']['size'] > 0) {
            $image = $_FILES['img']['name'];
        } else {
            echo "<script>alert('image cannot upload')</script>";
        }

        move_uploaded_file($_FILES['img']['tmp_name'], $url . $_FILES['img']['name']);

        $rs = mysqli_query($cn, "INSERT INTO getimg(category, img, title, subtitle, price, mrp) VALUES('$cate', '$image', '$title','$subtitle', '$price', '$mrp')") or die("Data not uploaded");
    }
} else {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php
    require('adminheader.php')
        ?>
    <div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
        <div class="section-admin">
            <div>
                <h1 style="text-align:center;margin-bottom:20px;">Manage Products</h1>
                <form action="" method="POST" class="admin-form" enctype="multipart/form-data">
                    <p><input class="admin-input-txt" type="text" name="category" placeholder="Enter Category"></p>
                    <p><input class="admin-input-txt" type="text" name="title" placeholder="Enter Title"></p>
                    <p><input class="admin-input-txt" type="text" name="subtitle" placeholder="Enter Subtitle"></p>
                    <p><input class="admin-input-txt" type="text" name="price" placeholder="Enter Price"></p>
                    <p><input class="admin-input-txt" type="text" name="mrp" placeholder="Enter Mrp"></p>
                    <p><input class="admin-input-txt" style="border: none;" type="file" name="img"
                            placeholder="choose file">
                    </p>
                    <p><input class="admin-input-btn" type="submit" name="uploadimg" value="Upload"></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>