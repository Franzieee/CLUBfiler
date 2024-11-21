<?php

include("../connections/dbh.php"); // Database connection class file
include("../connections/errorHandling.php"); // Error handling class file
include("../connections/query.class.php"); // Query to database, has an static function for insetering data to the database table

// Initializes database connection
try {
    $db = new Dbh("localhost", "root", "Mysqlworkbench14", "clubfiler");
    $conn = $db->connect(); // Connect to the database
} catch (Exception $e) {
    ErrorHandler::handleError("Database connection failed: " . $e->getMessage());
}

// Retrieves the input from the form and validates it
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create-college"])) {
    // Sanitize and validate the input
    $college_name = htmlspecialchars(trim($_POST["create-college"]));

    // Converts input to uppercase
    $college_name = strtoupper($college_name);

    // Input field must have an input
    if (empty($college_name)) {
        ErrorHandler::handleError("Field must have input.");
    } else {
        // Check if the college already exists in the database
        $stmt = $conn->prepare("SELECT * FROM colleges WHERE college_name = ?");
        $stmt->bind_param("s", $college_name);
        $stmt->execute();
        $result = $stmt->get_result();

        // Executes the query to create the college
        try {
            $message = College::create($conn, $college_name);
            // Display success message and go-back link
            echo "New College Added. ";
            echo '<a href="../dashboards/dashboard.superadmin.php" class="logout-button">Go Back</a>';
            exit;
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                ErrorHandler::handleError("College already exists.");
            } else {
                // Handle other unexpected errors
                ErrorHandler::handleError("Registration failed: An unexpected error occurred.");
            }
        }
        $stmt->close();
    }
}
