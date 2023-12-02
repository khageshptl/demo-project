<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<header style="box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- <div style="height: 5px;"></div> -->
    <div class="navbar">
        <a href="index.php" class="nav-logo"></a>
        <div class="nav-right-item">
            <div class="nav-items">
                <a href="men.php">MEN</a>
                <a href="women.php">WOMEN</a>
                <a href="kids.php">KIDS</a>
            </div>
            <div class="nav-login-signup-btn">
                <!-- <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                <?php
                if (isset($_SESSION['user_id'])) {
                    ?>
                <div id="profile-dropdown" class="dropdown">
                    <button class="dropdown-button">
                        <div style="display: flex;">
                            <img class="responsive-img" src="images/home/pro_img.png"
                                style="object-fit: cover; height: 30px;width: 30px;">
                            <i class="fa-solid fa-angle-down" style="color: white;margin: 10px 0 0 8px;"></i>
                        </div>
                    </button>
                    <div class="dropdown-content">
                        <a style="border-bottom:1px solid black;border-radius:0;cursor: default;"><?php echo $_SESSION["user_name"];?></a>
                        <a href="editprofile.php">Edit Profile</a>
                        <!-- <a href="orders.php">Orders</a> -->
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".dropdown-button").click(function () {
                            $(".dropdown-content").toggle();
                        });

                        // Close the dropdown if the user clicks anywhere outside of it
                        $(document).on("click", function (event) {
                            if (!$(event.target).closest(".dropdown").length) {
                                $(".dropdown-content").hide();
                            }
                        });
                    });
                </script>
                <?php
                } else {
                    ?>
                <a href="profile.php"><i class="fa-regular fa-user"></i></a>
                <?php
                }
                ?>
                <a href="wishlist.php"><i class="fa-regular fa-heart"></i></a>
                <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </div>
        </div>
    </div>
</header>