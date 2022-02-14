<?php

$string = file_get_contents("../users.json");
$clients = json_decode($string, true);