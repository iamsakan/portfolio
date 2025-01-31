<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['logged_in'] = "false";
require_once("db.php");

// Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Error handling
$user_error = "";
$password_error = "";

// Input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    $check_user_sql = "SELECT * FROM user WHERE username = '$input_username'";
    $user_result = $conn->query($check_user_sql);

    if ($user_result->num_rows == 0) {
        // User doesn't exist
        $user_error = 'User does not exist';
    } else {
        // User exists, so check the password
        $row = $user_result->fetch_assoc();
        $stored_password = $row["password"];
        $id = $row['iduser'];

        if (password_verify($input_password, $stored_password)) {
            // Login successful
            $_SESSION['logged_in'] = "active";
            $_SESSION['user_id'] = $id;
            header('Location: index.php'); // Redirect to a logged-in page
            exit();
        } else {
            // Incorrect password
            $password_error = 'Incorrect password';
        }
    }
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="icon" href="slike/AS.png" type="image/png">
</head>
<body>
    <header>
    <?php require_once("nav.php"); ?>
    </header>
    <div class="wrapper">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle" onclick="showLoginForm()">Log In</button>
                <button type="button" class="toggle" onclick="showRegisterForm()">Sign Up</button>
            </div>
            <div class="social-icons">
                <i class="fab fa-facebook" onclick="facebookLogin()"></i>
                <i class="fab fa-twitter" onclick="twitterLogin()"></i>
                <i class="fab fa-google" onclick="googleLogin()"></i>
            </div>

            <form id="login" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="Username" name="username" required>
                <div class="password-container">
                    <input type="password" class="input-field" placeholder="Password" name="password" id="password" required>
                    <i class="far fa-eye" id="togglePassword" onclick="togglePasswordVisibility()"></i></div>
                <div id="rememberpass"><input type="checkbox" class="check-box" name="checkbox">Remember password</div>
                <button type="submit" class="submit-btn">Log In</button>
                <div class="create-an-acc" ><p>Don't have an account? Create one <a onclick="showRegisterForm()">here</a> </p></div>
            </form>
            <form id="register" class="input-group" method="post" action="register.php">
                <input type="text" class="input-field" placeholder="Username" name="username" required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="password" class="input-field" placeholder="Repeat password" name="repeat_password" required>
                <div id="terms"><input type="checkbox" class="check-box" name="checkbox" required>I agree to Terms and Conditions</div>
                <button type="submit" class="submit-btn" >Register</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");


    document.addEventListener('DOMContentLoaded', function () {
        var currentPath = window.location.pathname;
        var navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(function(link) {
            var linkPath = link.pathname;
            if (currentPath === linkPath) {
                link.parentNode.classList.add('active');
            }
                });
            });

        function showLoginForm() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
            z.style.width = "110px"; 
            z.style.background = "linear-gradient(to right, #1084ff, #06daff)"; 
        }


        function showRegisterForm() {
            y.style.left = "50px";
            x.style.left = "450px";
            z.style.left = "110px"; 
            z.style.width = "110px"; 
            z.style.background = "linear-gradient(to right, #1084ff, #06daff)";
        }
    </script>
</body>
</html>
