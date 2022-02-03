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
    <!*** Authorization form ***>

    <form>
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your Login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your Password">
        <button type="submit" class="login-btn">Enter</button>
        <p>
            Don't have an account? - <a href="/reg.php">Registration</a>
        </p>
        <p class="pass_not_mach none">msg</p>
    </form>

    <script src="style/js/jquery-3.6.0.min.js"></script>
    <script src="style/js/main.js"></script>

</body>
</html>
