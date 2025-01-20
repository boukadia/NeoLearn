<?php
// session_start();
session_start();
session_regenerate_id(true); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
if (isset($_POST['register'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $user = new User();
    $user->register($userName, $email,$password,$role);
} else {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();
    $user->login($email,$password);
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