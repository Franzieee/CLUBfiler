<?php
session_start();
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <link rel="stylesheet" href="../styles/superadmin-style.css">
    <title>Homepage_SuperAdmin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../homepages/homepage.superadmin.php">cFiler</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../homepages/homepage.superadmin.php" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../features/view.profile.superadmin.php">Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">
                            <li><a class="dropdown-item" href="../dashboards/dashboard.superadmin.php">List of Colleges</a></li>
                            <li><a class="dropdown-item" href="../features/view.profile.superadmin.php">Profile</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./faq.html">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="../src/logout.php"><button class="btn btn-logout nav-link">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include("../connections/create.colleges.php");


    // Fetch colleges from the  database to display
    $stmt = "SELECT * FROM colleges";
    $result = $conn->query($stmt);

    // Check if there are colleges
    if ($result->num_rows > 0) {


        echo "<div class='colleges'>
                <h1>Welcome back!</h1>
                <p>Clubfiler is your go-to Club Management System.</p>
                <h3>COLLEGES</h3>

                <a href='../dashboards/dashboard.superadmin.php'>
                    <button class='btn btn-manage'>MANAGE COLLEGES</button>
                </a>
            <div class='colleges-container'>"; // New parent container

        // Loop through each college and display it
        while ($row = $result->fetch_assoc()) {
            $college_name = htmlspecialchars($row['College_Name']);

            echo "
                <div class='college-name'>
                    <span>$college_name</span>
                </div>
            ";
        }

        echo "</div></div>";
    } else {
        echo "<div class='message'>
            <h1>Welcome back!</h1>
            <p>Clubfiler is your go-to Club Management System.</p>
            <h3>No colleges found</h3>

            <a href='../dashboards/dashboard.superadmin.php'>
                <button class='btn btn-manage'>MANAGE COLLEGES</button>
            </a>
          </div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script/homepare-superadmin-script.js"></script>
</body>

</html>