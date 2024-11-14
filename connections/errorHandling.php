<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/error-handling-style.css">
    <title>Error Handler</title>
</head>

<body>
    <?php
    class ErrorHandler
    {
        // Static method to handle errors
        public static function handleError($errorMessage)
        {
            echo "<div class='error-holder'>
            <div class='error-hold'>
            <div class='error-msg'>Error: $errorMessage</div>
            </div>
            </div>";
            // Stop script execution after handling the error
        }
    }
    ?>

    <script src="../script/error-handling-script.js"></script>
</body>

</html>