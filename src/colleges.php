<!-- Form for creating college -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <link rel="stylesheet" href="../styles/colleges-style.css">
    <title>Add College</title>
</head>

<body>
    <?php include("../connections/create.colleges.php"); ?> <!-- Main process file for creating the colleges -->
    <div class="content">
        <div class="box-container">
            <div class="box">
                <div class="inner">
                    <header>Add College</header>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="create-college-label">College Name</label>
                            <input type="text" name="create-college" placeholder="College Name">
                        </div>

                        <div class="field">
                            <input type="submit" class="btn" name="submit" value="Create College">
                        </div>

                        <div class="field">
                            <li class="back-btn">
                                <a href="../dashboards/dashboard.superadmin.php">
                                    <i class="lni lni-arrow-left"></i>
                                </a><!-- Redirects to the superadmin homepage -->
                            </li>
                        </div>

                    </form>
                </div>
            </div>
</body>
