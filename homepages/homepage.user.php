<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage_User</title>
</head>

<body>
    <?php
    echo "Hello, " . $_SESSION["username"];
    ?>
    <a href="../src/logout.php" class="logout-button">Logout</a>
</body>

</html>