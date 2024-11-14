<?php
session_start(); // Starts a session
session_unset(); // Unsets the session
session_destroy(); // Destroys the session 
header("Location: ../src/login.php"); // Redirects to login page
exit;