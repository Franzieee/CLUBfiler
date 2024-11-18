<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <link rel="stylesheet" href="../styles/dashboard-superadmin.css">
    <title>List of Colleges</title>
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
                        <a class="nav-link" href="../homepages/homepage.superadmin.php" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">

                            <li><a class="dropdown-item" href="../dashboards/dashboard.superadmin.php">List of Colleges</a></li>
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
                        <button class="btn btn-logout nav-link"><a href="../src/logout.php">Logout</a></button>
                    </li>
                    <li class="nav-item">
                        <a href="../features/view.profile.superadmin.php" class="nav-link profile-link">
                            <i class="lni lni-user-4"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include("../connections/create.colleges.php"); // Includes the file for creating the colleges

    // Validates the input and executes the deletion
    if (isset($_POST['College_Name'])) {
        $college_name = $_POST['College_Name'];

        // Mysql query for deleteion
        $stmt = $conn->prepare("DELETE FROM colleges WHERE College_Name = ?");
        $stmt->bind_param("s", $college_name);

        if ($stmt->execute()) {
            header("Location: ../dashboards/dashboard.superadmin.php"); // If the deletion is complete, redirects to the dashboard
            exit;
        } else {
            echo "Error deleting college: " . $stmt->error;
        }
    }


    // Fetch colleges from the  database to display
    $stmt = "SELECT * FROM colleges";
    $result = $conn->query($stmt);

    // Check if there are colleges
    if ($result->num_rows > 0) {

        
        echo "<div class='colleges'>
        <h2>COLLEGES</h2>
        <div class='add-college'>
            <button class='btn btn-add-college'><a href='../src/colleges.php'>Add College</a></button>
        </div>
        <div class='colleges-container'>"; // New parent container

// Loop through each college and display it
while ($row = $result->fetch_assoc()) {
    $college_name = htmlspecialchars($row['College_Name']);

    echo "
            <div class='college-name'>
                <span>$college_name</span>
                <div class='college-btn-group'>
                    <form action='' method='POST' style='display:inline;'>
                        <input type='hidden' name='College_Name' value='$college_name'>
                        <button type='submit' onclick='return confirm(\"Are you sure you want to delete this college?\");'>DELETE</button>
                    </form>
                    <form action='../features/update.college.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='College_Name' value='$college_name'>
                        <button type='submit' onclick='return confirm(\"Are you sure you want to update this college?\");'>UPDATE</button>
                    </form>
                </div>
            </div>
        ";
}

echo "</div></div>";

    } else {
        echo "<div class='message'>
            <h2>No colleges found</h2>
            <div class='add-college'>
                <button class='btn btn-add-college'><a href='../src/colleges.php'>Add College</a></button>
            </div>
          </div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script/dashboard-superadmin-script.js"></script>

</body>

</html>