<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$s_error = "";

if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
} else {

    if (isset($_REQUEST['paid'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];

        if (!filter_var($fname, FILTER_SANITIZE_STRING)) {
            $s_error .= "Enter Valid Name";
        }
        if (!filter_var($lname, FILTER_SANITIZE_STRING)) {
            $s_error .= "Enter Valid Name";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $s_error .= "Email is not Valid ";
        }
        if (strlen($pin) != 6) {
            $s_error .= "Enter valid Pincode";
        }

        if (!empty($s_error)) {
            ?>
            <script>
                alert("<?php echo $s_error; ?>");
            </script>
            <?php
        }
        else{
            header("Location:checkout.php");
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
    <title>Document</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php require("header.php"); ?>
    <div class="sec-payment">
        <div class="sec-payment-details">
            <form method="POST">
                <div class="sec-payment-inputs">

                    <div class="input-pay">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" name="fname" id="name" placeholder="First Name"
                            class="input-edit payment-input" required>
                    </div>

                    <div class="input-pay">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" name="lname" id="name" placeholder="Last Name"
                            class="input-edit payment-input" required>
                    </div>

                    <div class="input-pay">
                        <i class="fa-regular fa-at input-icon"></i>
                        <input type="email" name="email" id="email" placeholder="Email" class="input-edit payment-input"
                            required>
                    </div>

                    <div class="input-pay">
                        <i class="fa-solid fa-location-dot input-icon"></i>
                        <input type="text" name="address" id="add" placeholder="Address"
                            class="input-edit payment-input" required>
                    </div>

                    <div class="input-pay">
                        <i class="fa-solid fa-city input-icon"></i>
                        <input type="text" name="city" id="city" placeholder="City" class="input-edit payment-input"
                            required>
                    </div>

                    <div class="input-pay">
                        <i class="fa-solid fa-map-pin input-icon"></i>
                        <input type="text" name="pin" id="pin" placeholder="Pincode" class="input-edit payment-input"
                            required>
                    </div>

                </div>
                <div class="bill-btn">
                    <input type="submit" value="Get Bill" name="paid" class="product-btn edit-btn">
                </div>
            </form>
        </div>
    </div>
</body>

</html>