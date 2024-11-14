<?php
include("../connections/dbh.php"); // Database connection class file
include("../connections/errorHandling.php"); // Error handling class file 
include("../connections/query.class.php"); // Query to database, has an static function for registering the user

// Initializes database connection
try {
    $db = new Dbh("localhost", "root", "Mysqlworkbench14", "clubfiler");
    $conn = $db->connect(); // Connect to the database
} catch (Exception $e) {
    ErrorHandler::handleError("Database connection failed: " . $e->getMessage());
}

// Handle the signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $student_id = htmlspecialchars(trim($_POST["student-id"]));
    $username = htmlspecialchars(trim($_POST["uid"]));
    $password = htmlspecialchars(trim($_POST["pwd"]));
    $confirm_password = htmlspecialchars(trim($_POST["pwdConfirm"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $college = htmlspecialchars(trim($_POST["college"]));
    $program = htmlspecialchars(trim($_POST["program"]));
    $section = htmlspecialchars(trim($_POST["section"]));

    // Check if all fields are filled
    if (empty($student_id) || empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($college) || empty($program) || empty($section)) {
        ErrorHandler::handleError("All fields are required.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ErrorHandler::handleError("Invalid email format.");
    } elseif (!preg_match("/^\d{2}-\d{5}$/", $student_id)) {
        ErrorHandler::handleError("Invalid Student-ID format.");
    } elseif ($password !== $confirm_password) {
        ErrorHandler::handleError("Passwords do not match.");
    } else {
        // Initialize an array to collect error messages
        $errorMessages = [];

        // Check if the student ID exists in the student table
        $stmt = $conn->prepare("SELECT * FROM student_ids WHERE student_ids = ?");
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $errorMessages[] = "Student ID does not exist.";
        }

        // Check if the student ID exists in the user table
        $stmt = $conn->prepare("SELECT * FROM user WHERE student_id = ?");
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessages[] = "Student ID already exists.";
        }

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessages[] = "Username already exists.";
        }

        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessages[] = "Email already exists.";
        }

        // If there are any error messages, implode them and display
        if (!empty($errorMessages)) {
            ErrorHandler::handleError(implode(" ", $errorMessages));
        }

        // All validations passed; proceed to save user data
        try {
            $message = User::register($conn, $student_id, $username, $password, $email, $college, $program, $section);
            // Display success message and login link
            echo "Registration Complete. ";
            echo '<a href="login.php">Login Now</a>';
            exit; // Ensure to exit after the header redirect
        } catch (Exception $e) {
            ErrorHandler::handleError("Registration failed: " . $e->getMessage());
        }
    }
}
$conn->close();
