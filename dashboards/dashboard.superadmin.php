<?php
include("../connections/create.colleges.php"); // Includes the file for creating the colleges


// Fetch colleges from the  database to display
$stmt = "SELECT * FROM colleges";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    echo "COLLEGES<br>";
    while ($row = $result->fetch_assoc()) {
        $college_name = htmlspecialchars($row['College_Name']);
        echo $college_name;

        // Button to delete the college
        echo "
    <form action='' method='POST' style='display:inline;'>
        <input type='hidden' name='College_Name' value='$college_name'>
        <button type='submit' onclick='return confirm(\"Are you sure you want to delete this college?\");'>DELETE</button>
    </form>";

        // Button to update the college. Has a separate file to execute the function update college
        echo "
     <form action='../features/update.college.php' method='POST' style='display:inline;'>
         <input type='hidden' name='College_Name' value='$college_name'>
         <button type='submit' onclick='return confirm(\"Are you sure you want to delete this college?\");'>UPDATE</button>
         <br>
     </form>";
    }
} else {
    echo "No colleges found.";
}

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

echo "<a href='../src/colleges.php'>Add College</a>" . "<br>";
echo "<a href='../features/view.profile.superadmin.php'>Profile View</a>" . "<br>";
echo "<a href='../homepages/homepage.superadmin.php'>Homepage</a>" . "<br>";
echo "<a href=''>Requests List</a>" . "<br>";
echo "<a href='../src/logout.php'>Logout</a>" . "<br>";
