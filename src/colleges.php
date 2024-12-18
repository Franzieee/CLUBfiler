<!-- Form for creating college -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../styles/updates-style.css">
    <title>Add College</title>
</head>

<body>
    <?php include("../connections/create.colleges.php"); ?>
    <div class="container">
        <div class="box form-box">
            <h2>Add College</h2>
            <form action="" method="post">
                <div class="field input">
                    <input type="text" name="create-college" placeholder="College Name">
                </div>

                <div class="field">
                    <button type="submit" class="btn-submit" name="submit">Create College</button>
                </div>

                <div class="field">
                    <a href="../dashboards/dashboard.superadmin.php">
                        <button type="button" class="btn btn-back mb-3">
                            <i class="fas fa-arrow-left"></i> Back
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="../script/error-handling-script.js"></script>

</html>