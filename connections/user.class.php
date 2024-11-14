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