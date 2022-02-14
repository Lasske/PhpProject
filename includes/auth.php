<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$error_fields = [];

if($login === '') {
    $error_fields[] = 'login';
}

if($password === '') {
    $error_fields[] = 'password';
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

$password = md5($password);

foreach($clients as $user) {
    if ($login == $user['login'] && $password == $user['password']) {

        $_SESSION['user'] = [
            "full_name" => $user['full_name'],
            "email" => $user['email']
        ];

        $answer = [
            "status" => true
        ];
        echo json_encode($answer);
        die();
    }
}
$answer = [
    "status" => false,
    "message" => 'Login or Password not exist'
];
echo json_encode($answer);
?>