<?php

    $connect = mysqli_connect($host = 'localhost', $username = 'root', $password = '', $database = 'project1');
/*
 * Вводить свои данные (логин, пароль и т.д.). В случае неверных вводных данных,
 * увидите ошибку прописанную снизу.
 */
    if (!$connect) {
        die('Connect to DataBase - ERROR!');
    }