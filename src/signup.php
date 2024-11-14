<!-- Signup form-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/signup-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register</title>
</head>

<body>
    <?php
    // Includes the validation, error handling and query files for registering a new user
    include("../connections/compi.signup.php"); ?>
    
    <div class="content">
        <div class="box-container">
            <div class="box left">
                <div class="inner">
                    <header>Sign-up</header>

                    <form action="" method="post">
                        <div class="field input">
                            <label for="student-id">Student-Id</label>
                            <input type="text" name="student-id" id="student-id" placeholder="XX-XXXXX" maxlength="8"
                                pattern="^\d{2}-\d{5}$">

                        </div>

                        <div class="field input">
                            <label for="username">Username</label>
                            <input type="text" name="uid" id="uid" placeholder="Example: Alec Hardy">
                        </div>

                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="pwd" id="pwd" placeholder="********" >
                        </div>

                        <div class="field input">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" name="pwdConfirm" id="pwdConfirm" placeholder="********" >
                        </div>

                        <div class="field input">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Example: AlecHardy@gmail.com"
                                >
                        </div>

                        <form action="" method="post">
                            <form action="" method="post">
                                <!-- College Dropdown -->
                                <div class="field input custom-dropdown">
                                    <label for="college">College</label>
                                    <div class="dropdown-header" id="college-header">
                                        <span class="select-text">COLLEGE</span>
                                    </div>
                                    <div class="dropdown-list">
                                        <div class="dropdown-item" data-value="CCSICT">CCSICT</div>
                                        <div class="dropdown-item" data-value="CIT">CIT</div>
                                        <div class="dropdown-item" data-value="CE">CE</div>
                                    </div>
                                    <input type="hidden" name="college" id="college" >
                                </div>

                                <!-- Program Dropdown -->
                                <div class="field input custom-dropdown">
                                    <label for="program">Program</label>
                                    <div class="dropdown-header" id="program-header">
                                        <span class="select-text">PROGRAM</span>
                                    </div>
                                    <div class="dropdown-list">
                                        <div class="dropdown-item" data-value="Computer Science">Computer Science</div>
                                        <div class="dropdown-item" data-value="Information Technology">Information
                                            Technology</div>
                                        <div class="dropdown-item" data-value="Entertainment and Multimedia Computing">
                                            Entertainment and Multimedia Computing</div>
                                    </div>
                                    <input type="hidden" name="program" id="program" >
                                </div>

                                <!-- Section Dropdown -->
                                <div class="field input custom-dropdown">
                                    <label for="section">Section</label>
                                    <div class="dropdown-header" id="section-header">
                                        <span class="select-text">SECTION</span>
                                    </div>
                                    <div class="dropdown-list" id="section-dropdown-list">
                                        <div class="dropdown-item" data-value="Business Analytics">Business Analytics
                                        </div>
                                        <div class="dropdown-item" data-value="Business Processing Outsourcing">Business
                                            Processing Outsourcing</div>
                                        <div class="dropdown-item" data-value="Data Mining">Data Mining</div>
                                        <div class="dropdown-item" data-value="Digital Animation">Digital Animation
                                        </div>
                                        <div class="dropdown-item" data-value="Game Development">Game Development</div>
                                        <div class="dropdown-item" data-value="Network Security">Network Security</div>
                                        <div class="dropdown-item" data-value="Web and Mobile Application Development">
                                            Web and Mobile Application Development</div>
                                    </div>
                                    <input type="hidden" name="section" id="section" >
                                </div>

                                <div class="field">
                                    <button type="submit" class="btn" name="submit" value="Register">Register</button>
                                </div>
                                <div class="links">
                                    Already have an account? <a href="login.php">Login here</a>
                                </div>
                            </form>

                        </form>
                </div>
            </div>

            <div class="box right">
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
        </div>
    </div>

    <script src="../script/signup-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>