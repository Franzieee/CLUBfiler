<!-- Login form -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/login-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <?php
    //Includes the validation, error handling, and query files for user login
    include("../connections/compi.login.php"); ?>

    <div class="content">
        <div class="box-container">
            <div class="box left">
                <div class="inner">
                    <h1>Isabela State University Club Organization</h1>
                    <p>Your club awaits!</p>
                    <h3>Contact us at:</h3>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-telegram"></i>
                </div>
            </div>

            <div class="box right">
                <div class="inner">
                    <header>Login</header>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="student-id">Student-Id</label>
                            <input type="text" name="student-id" placeholder="XX-XXXXX" maxlength="8"
                                pattern="^\d{2}-\d{5}$">
                        </div>

                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="********">
                        </div>

                        <div class="field">
                            <button type="submit" class="btn" name="submit" value="Login">Login</button>
                        </div>
                        <div class="links">
                            Don't have an account? <a href="signup.php">Sign-up here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../script/login-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>