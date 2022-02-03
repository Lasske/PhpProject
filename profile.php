<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: /');
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

    <form
        <h2>Hello <?= $_SESSION['user']['full_name']?></h2>
        <a href="includes/logout.php" class="logout">Logout</a>
</body>
</html>
