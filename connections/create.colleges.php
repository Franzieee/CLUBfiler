<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
include("../connections/dbh.php"); // Database connection class file
include("../connections/errorHandling.php"); // Error handling class file
include("../connections/query.class.php"); // Query to database, has an static function for inserting data to the database table

// Initialize database connection
try {
    $db = new Dbh("localhost", "root", "Mysqlworkbench14", "clubfiler");
    $conn = $db->connect(); // Connect to the database
} catch (Exception $e) {
    ErrorHandler::handleError("Database connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create-college"])) {
    // Sanitize and validate the input
    $college_name = htmlspecialchars(trim($_POST["create-college"]));
    $college_name = strtoupper($college_name); // Converts input to uppercase

    // Input validation
    if (empty($college_name)) {
        ErrorHandler::handleError("Field must have input.");
    } else {
        // Check if the college already exists in the database
        $stmt = $conn->prepare("SELECT * FROM colleges WHERE college_name = ?");
        $stmt->bind_param("s", $college_name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // If the college doesn't exist, create it
        if ($result->num_rows == 0) {
            try {
                // Executes the query to create the college
                $message = College::create($conn, $college_name);
                echo "<div class='container'>
                        <div class='box form-box'>
                            <h2>New College Added.</h2>
                            <a href='../dashboards/dashboard.superadmin.php'>
                                <button class='btn btn-back mb-3'>
                                    <i class='fas fa-arrow-left'></i> Back
                                </button>
                            </a>
                        </div>
                    </div>";
                exit;
            } catch (Exception $e) {
                ErrorHandler::handleError("Registration failed: " . $e->getMessage());
            }
        } else {
            ErrorHandler::handleError("College already exists.");
        }
        $stmt->close();
    }
}
?>

</body>

</html>
