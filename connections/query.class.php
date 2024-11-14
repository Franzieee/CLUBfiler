<?php

class User
{
    // Static method to register a new user
    public static function register($conn, $student_id, $username, $password, $email, $college, $program, $section)
    {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO User (student_id, username, password, email, college, program, section) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            throw new Exception("Preparation failed: " . $conn->error);
        }

        // Bind the parameters
        $stmt->bind_param("sssssss", $student_id, $username, $hashed_password, $email, $college, $program, $section);

        // Execute the statement
        if ($stmt->execute()) {
            $stmt->close(); // Close the statement before returning
            return "Registration successful!";
        } else {
            $stmt->close(); // Close the statement if execution fails
            throw new Exception("Execution failed: " . $stmt->error);
        }
    }
}

class College
{
    // Static method to create a new college
    public static function create($conn, $college)
    {

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO Colleges (college_name) VALUES (?)");

        if (!$stmt) {
            throw new Exception("Preparation failed: " . $conn->error);
        }

        // Bind the parameter
        $stmt->bind_param("s", $college);

        if ($stmt->execute()) {
            $stmt->close(); // Close the statement before returning
            return "Registration successful!";
        } else {
            $stmt->close(); // Close the statement if execution fails
            throw new Exception("Execution failed: " . $stmt->error);
        }
    }
}
