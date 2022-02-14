<?php

session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];



//$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE login = '$login'");
foreach($clients as $user) {
    if ($user['login'] == $login) {
        $answer = [
            "status" => false,
            "type" => 1,
            "message" => "This login is already in use",
            "fields" => ['login']
        ];
        echo json_encode($answer);
        die();
    }
}

//$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE email = '$email'");
foreach($clients as $user) {
    if ($user['email'] == $email) {
        $answer = [
            "status" => false,
            "type" => 1,
            "message" => "This E-mail is already in use",
            "fields" => ['email']
        ];
        echo json_encode($answer);
        die();
    }
}

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($password === '') {
$error_fields[] = 'password';
}


if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error_fields[] = 'email';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if ($full_name === '') {
    $error_fields[] = 'full_name';
}

if (!empty($error_fields)) {
    $answer = [
        "status" => false,
        "type" => 1,
        "message" => "Some fields are invalid",
        "fields" => $error_fields
    ];

    echo json_encode($answer);

    die();
}

if ($password === $password_confirm) {

    $password = md5($password);

    /*if (isset($connect)) {
        mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`)
    VALUES (NULL, '$full_name', '$login', '$email', '$password')");
    }*/
    $clients[]=[
        'full_name' => $full_name,
        'login' => $login,
        'email' => $email,
        'password' => $password
    ];
    file_put_contents('../users.json', json_encode($clients));
    $answer = [
        "status" => true,
        "message" => "Registration successful complete!",
    ];

} else {
    $answer = [
        "status" => false,
        "message" => "Password mismatch!",
    ];
}
echo json_encode($answer);

