<?php
include("../connections/create.colleges.php"); // Includes the file for creating the colleges

if (isset($_POST['College_Name'])) {
    // Validates the input name in the update form from the dashboard.superadmnin file
    $old_college_name = $_POST['College_Name'];

    // Fetch current college details
    $stmt = $conn->prepare("SELECT * FROM colleges WHERE College_Name = ?");
    $stmt->bind_param("s", $old_college_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $college = $result->fetch_assoc();
    } else {
        echo "College not found.";
        exit;
    }
}

// Validates the input name in the update form below
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_college_name'])) {
    $new_college_name = $_POST['new_college_name'];
    $old_college_name = $_POST['College_Name'];

    // Convert new college name to uppercase
    $new_college_name = strtoupper($new_college_name);

    // Prepare to check if the new college name already exists, excluding the current one
    $stmt = $conn->prepare("SELECT * FROM colleges WHERE College_Name = ? AND College_Name != ?");
    $stmt->bind_param("ss", $new_college_name, $old_college_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the college already exists
    if ($result->num_rows > 0) {
        echo "Error: The college name '$new_college_name' already exists. Please choose a different name." . "<br>";
        echo "<a < href='../dashboards/dashboard.superadmin.php'>Go Back</a>";
        exit;
    } else {
        // Mysql query to update the current college
        $update_stmt = $conn->prepare("UPDATE colleges SET College_Name = ? WHERE College_Name = ?");
        $update_stmt->bind_param("ss", $new_college_name, $old_college_name);

        if ($update_stmt->execute()) {
            header("Location: ../dashboards/dashboard.superadmin.php");
            exit;
        } else {
            echo "Error updating college: " . $update_stmt->error;
        }
    }
}
?>

<!-- Update college form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update College</title>
</head>

<body>
    <h2>Update College</h2>
    <form action="" method="POST">
        <label for="new_college_name">Current College Name:</label>
        <!-- Has the updated college name -->
        <input type="text" name="new_college_name" value="<?php echo htmlspecialchars($college['College_Name']); ?>"
            required>
        <!-- Has the older college name -->
        <input type="hidden" name="College_Name" value="<?php echo htmlspecialchars($old_college_name); ?>">
        <button type="submit">Update College</button>
    </form>
    <a href="../dashboards/dashboard.superadmin.php">Cancel</a>
</body>

</html>