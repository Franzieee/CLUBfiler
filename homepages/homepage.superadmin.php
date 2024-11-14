<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit;
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/homepage-superadmin.css">
    <title>Homepage_SuperAdmin</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fs-4" href="#">cFiler</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../homepages/homepage.superadmin.php" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">

                            <li><a class="dropdown-item" href="../dashboards/dashboard.superadmin.php">List of Colleges</a></li>
                            <li><a class="dropdown-item" href="../features/view.profile.superadmin.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Requests List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-logout"><a href="../src/logout.php">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome-section">
        <h2>Welcome back!</h2>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script/homepare-superadmin-script.js"></script>
</body>

</html>

<?php
include("../connections/create.colleges.php");

$stmt = "SELECT * FROM colleges";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    echo "COLLEGES<br>";
    while ($row = $result->fetch_assoc()) {
        $college_name = htmlspecialchars($row['College_Name']);
        echo $college_name . "<br>";
    }
}

?>