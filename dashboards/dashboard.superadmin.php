<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../styles/superadmin-dashboard-style.css">
    <title>List of Colleges</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 bg-sidebar">
                <a class="navbar-brand" href="../homepages/homepage.superadmin.php">cFiler</a>
                <p class="dashboard-indicator">DASHBOARD</p>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="../dashboards/dashboard.superadmin.php"><i class="fas fa-th-large"></i> List of Colleges</a>
                    <a class="nav-link" href="../features/view.profile.superadmin.php"><i class="fas fa-user"></i> Profile</a>
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

            <main class="col-md-9 col-lg-10">
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
                                <a href='../src/colleges.php'><button class='btn btn-add-college'>Add College</button></a>
                            </div>
                        <div class='colleges-container'>"; // New parent container

                    // Loop through each college and display it
                    while ($row = $result->fetch_assoc()) {
                        $college_name = htmlspecialchars($row['College_Name']);

                        echo "
                <div class='college-name'>
                    <span>$college_name</span>
                    <div class='college-btn-group'>
                        <form action='' method='POST' style='display:inline;' onsubmit='return confirmAction(event, \"Are you sure you want to delete this?\");'>
                            <input type='hidden' name='College_Name' value='$college_name'>
                            <button type='submit'>DELETE</button>
                        </form>
                        <form action='../features/update.college.php' method='POST' style='display:inline;' onsubmit='return confirmAction(event, \"Are you sure you want to update this?\");'>
                            <input type='hidden' name='College_Name' value='$college_name'>
                            <button type='submit'>UPDATE</button>
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
                                <a href='../src/colleges.php'><button class='btn btn-add-college'>Add College</button></a>
                            </div>
                        </div>";
                }
                ?>

            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../script/dashboard-superadmin-script.js"></script>

</body>

</html>