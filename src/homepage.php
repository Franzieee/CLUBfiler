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
    <title>ClubFiler</title>
</head>

<body>

    <?php
    // Check if the logged-in user is a super admin
    $isSuperAdmin = isset($_SESSION['is_super_admin']) && $_SESSION['is_super_admin'] === true;

    // Display welcome message based on user type
    if ($isSuperAdmin) {
        echo "<h1>Hello Super Admin!</h1>";
    } else {
        echo "<h1>Your Club Awaits, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    }
    ?>

    <!-- Logout button -->
    <form action="../src/logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

</body>

</html>