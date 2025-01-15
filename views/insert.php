<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
if (isset($_POST['register'])) {


    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $user = new User($email, $password);
    $user->register($userName, $role);
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($email, $password);
    $user->login();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>