<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$user = $_SESSION["user_id"];
$s_error = "";
if (!isset($_SESSION["user_id"])) {
    header("Location:index.php");
} else {
    $res = mysqli_query($cn, "SELECT * FROM users WHERE id = $user");
    $row = mysqli_fetch_assoc($res);

    if (isset($_REQUEST['update'])) {
        $user = $_SESSION["user_id"];
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['pass'];
        $newConfirmPassword = $_POST['conpass'];

        if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            $s_error .= "Email is not Valid ";
        }
        if (strlen($newPassword) < 8) {
            $s_error .= "Please Enter Minimum 8 Characters ";
        }
        if ($newPassword != $newConfirmPassword) {
            $s_error .= "Please Check Password and Confirm Password ";
        }
        if (empty($s_error)) {
            mysqli_query($cn, "UPDATE users SET name='$newName', email='$newEmail', password='$newPassword' WHERE id = '$user'");
            header("Location:index.php");
        }

    }
}
?>
<?php
if (!empty($s_error)) {
    ?>
    <script>
        alert("<?php echo $s_error; ?>");
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php
    require("header.php");
    ?>
    <div class="sec-edit-profile">
        <div class="profile-content">
            <div class="img-content">
                <div class="img-person"></div>
                <p style="font-size: 30px; font-weight: 200;">
                    <?php echo $row['name']; ?>
                </p>
            </div>
            <div style="border-right: 1px solid #0f1e2e42; height: 100%; width: 0.1%;"></div>

            <form method="POST" class="detail-content">
                <label for="name">User Name:</label>
                <input type="text" value="<?php echo $row['name']; ?>" name="name" id="name" class="input-edit"
                    required>

                <label for="email">Email:</label>
                <input type="email" value="<?php echo $row['email']; ?>" name="email" id="email" class="input-edit"
                    required>

                <label for="pass">Password:</label>
                <input type="password" value="<?php echo $row['password']; ?>" name="pass" id="pass" class="input-edit"
                    style="letter-spacing: 2px;" required>

                <label for="conpass">Confirm Password:</label>
                <input type="password" value="<?php echo $row['password']; ?>" name="conpass" id="conpass"
                    class="input-edit" style="letter-spacing: 2px;" required>

                <input type="submit" value="Update" name="update" class="product-btn edit-btn">
            </form>
        </div>
    </div>
</body>

</html>