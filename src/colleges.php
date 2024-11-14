<!-- Form for creating college -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add College</title>
</head>

<body>
    <?php include("../connections/create.colleges.php"); ?> <!-- Main process file for creating the colleges -->
    <div class="container">
        <div class="box form-box">
            <header>Add College</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="create-college">College Name</label>
                    <input type="text" name="create-college" placeholder="College Name" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Create College" required>
                </div>
                <div class="field">
                <a < href="../homepages/homepage.superadmin.php">Go Back</a> <!-- Redirects to the superadmin homepage -->
                </div>
            </form>
        </div>
    </div>
</body>

</html>