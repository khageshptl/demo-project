<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "urbanera") or die("database not connected");

if (isset($_SESSION["admin_name"])) {

    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        mysqli_query($cn, "delete from users where id = $id");
        header("Location:users.php");
    }
    $rs = mysqli_query($cn, "SELECT * FROM users") or die("value not found");
} else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <?php require("links.php"); ?>
</head>

<body>
    <?php require("adminheader.php"); ?>
    <div class="shop-palettes cart-palette">

        <table class="cart-table user-details-table">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Disable</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                <tr>
                    <td>
                    <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <a href="users.php?id=<?php echo $row["id"]; ?>" class="cancel"><i class="fa-solid fa-circle-minus"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>