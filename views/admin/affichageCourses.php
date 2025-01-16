<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');

session_start();
if ($_SESSION['role'] != "admin") {
    header("location : ../login.html");
    exit();
} else {

}


?>