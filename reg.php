<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration and Authorization</title>
    <link rel="stylesheet" href="style/css/main.css"
</head>
<body>

<!*** Registration form ***>

    <form action="includes/signup.php" method="post">
        <label>Name</label>
        <input type="text" name="full_name" placeholder="Enter your full name">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your Login">
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Enter your E-mail">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your Password">
        <label>Confirm Password</label>
        <input type="password" name="password_confirm" placeholder="Confirm your Password">
        <button type="submit" class="register-btn">Registration</button>
        <p>
            Already have an account? - <a href="/">Log in</a>
        </p>
        <p class="pass_not_mach none">,msg2</p>
    </form>
    <script src="style/js/jquery-3.6.0.min.js"></script>
    <script src="style/js/main.js"></script>
</body>
</html>
