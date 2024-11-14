<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit;
}

// Include the error handling and database connection files
include("../connections/dbh.php");
include("../connections/errorHandling.php");

try {
    $db = new Dbh("localhost", "root", "Mysqlworkbench14", "clubfiler");
    $conn = $db->connect(); // Connect to the database
} catch (Exception $e) {
    ErrorHandler::handleError("Database connection failed: " . $e->getMessage());
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT Student_ID, Username FROM superadmins WHERE Student_ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$superadmin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>

<body>
    <h1>View Profile</h1>

    <!-- Display current username and student ID -->
    <h3><strong>Current Student ID:</strong> <?php echo htmlspecialchars($superadmin['Student_ID']); ?></h3>
    <h3><strong>Current Username:</strong> <?php echo htmlspecialchars($superadmin['Username']); ?></h3>

    <a href="../dashboards/dashboard.superadmin.php">Back to Dashboard</a><br>
    <a href="../features/update.profile.superadmin.php">Update Profile</a><br>
    <a href="../src/logout.php">Logout</a>
</body>

</html>