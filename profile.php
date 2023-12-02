<?php
session_start();
$row = "";
$id = "";
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");
$e_error = $s_error = "";

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"])) {
    header("Location: index.php");
} else {
    if (isset($_POST["signup"])) {
        $name = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $conpass = $_POST["conpass"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $s_error .= "Email is not Valid ";
        }
        if (strlen($pass) < 8) {
            $s_error .= "Please Enter Minimum 8 Characters ";
        }
        if ($pass != $conpass) {
            $s_error .= "Please Check Password and Confirm Password ";
        }

        if (empty($s_error)) {
            mysqli_query($cn, "INSERT INTO users VALUES(0, '$name', '$email', '$pass')");
            header("Location:profile.php");
        }
    }
    if (isset($_POST["login"])) {
        $logemail = $_POST["logemail"];
        $logpass = $_POST["logpass"];
        $result = mysqli_query($cn, "SELECT * FROM users WHERE email = '$logemail' and password = '$logpass'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            header("Location: index.php");
        }
        elseif($logemail == "admin1@gmail.com" && $logpass == "admin123"){
            $_SESSION["admin_name"] = "admin";
            header("location: admin.php");
        } 
        else {
            $e_error = "User Not Found";
        }
    }
}

?>
<?php
if (!empty($e_error)) {
    ?>
    <script>
        alert("<?php echo $e_error; ?>");
    </script>
    <?php
}
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
    <div class="main-login-section">
        <div class="wrapper">
            <div class="form-container sign-up">
                <form method="post">
                    <h2>sign up</h2>
                    <div class="form-group">
                        <input type="text" name="username" required>
                        <label for="">username</label>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required>
                        <label for="">email</label>
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" required style="letter-spacing: 2px;">
                        <label for="">password</label>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" name="conpass" required style="letter-spacing: 2px;">
                        <label for="">confirm password</label>
                        <i class="fas fa-lock"></i>
                    </div>
                    <div id="error" style="color:red;"></div>
                    <button type="submit" name="signup" class="btn">sign up</button>
                    <div class="link">
                        <p>You already have an account?<a href="#" class="signin-link"> sign in</a></p>
                    </div>

                </form>
            </div>
            <div class="form-container sign-in">
                <form method="post">
                    <h2>login</h2>
                    <div class="form-group">
                        <input type="email" name="logemail" required>
                        <i class="fas fa-user"></i>
                        <label for="">Email</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="logpass" required style="letter-spacing: 2px;">
                        <i class="fas fa-lock"></i>
                        <label for="">password</label>
                    </div>
                    <div class="forgot-pass">
                        <a href="#">forgot password?</a>
                    </div>
                    <button type="submit" name="login" class="btn">login</button>
                    <div class="link">
                        <p>Don't have an account?<a href="#" class="signup-link"> sign up</a></p>
                    </div>

                </form>

            </div>


        </div>

    </div>
    <script>
        let wrapper = document.querySelector('.wrapper'),
            signUpLink = document.querySelector('.link .signup-link'),
            signInLink = document.querySelector('.link .signin-link');

        signUpLink.addEventListener('click', () => {
            wrapper.classList.add('animated-signin');
            wrapper.classList.remove('animated-signup');
        });

        signInLink.addEventListener('click', () => {
            wrapper.classList.add('animated-signup');
            wrapper.classList.remove('animated-signin');
        });
    </script>
    <!-- <?php
    require("footer.php");
    ?> -->
</body>

</html>