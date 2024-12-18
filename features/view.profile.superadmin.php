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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../styles/superadmin-dashboard-style.css">
    <title>View Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        <aside class="col-md-3 col-lg-2 bg-sidebar">
                <a class="navbar-brand" href="../homepages/homepage.superadmin.php">cFiler</a>
                <p class="dashboard-indicator">DASHBOARD</p>
                <nav class="nav flex-column">
                    <a class="nav-link" href="../dashboards/dashboard.superadmin.php"><i class="fas fa-th-large"></i> List of Colleges</a>
                    <a class="nav-link active" href="../features/view.profile.superadmin.php"><i class="fas fa-user"></i> Profile</a>
                </nav>

                <div class="mt-auto">
                    <a href="../homepages/homepage.superadmin.php">
                        <button class="btn btn-back mb-3">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    </a>

                    <a href="../src/logout.php">
                        <button class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> LOGOUT</button>
                    </a>

                </div>

                <p class="text-center admin-text">SUPERADMIN</p>
            </aside>


            <main class="col-md-9 col-lg-10 bg-main">
                <div class="profile-header text-center mt-5">
                    <i class="fas fa-user-circle fa-5x"></i>
                    <h2>View Profile</h2>
                </div>
                <div class="profile-details text-center mt-4">
                    <h3><strong>Current Student ID:</strong> <?php echo htmlspecialchars($superadmin['Student_ID']); ?></h3>
                    <h3><strong>Current Username:</strong> <?php echo htmlspecialchars($superadmin['Username']); ?></h3>

                    <a href="../features/update.profile.superadmin.php"><button class="btn-update-profile">Update Profile</button></a>
                </div>

            </main>
        </div>
    </div>
</body>

</html>