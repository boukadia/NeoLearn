<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/display.php');
$content = $_GET['content'];
$type = $_GET['type'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours en ligne - Introduction à JavaScript</title>
    <!-- <link rel="stylesheet" href="../../assests/css/style.css"> -->

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/assests/css/header/head.php') ?>
</head>

<body>
    <div class="container">
        <div class="video-container">
            <?php
            $video = new Video();
            $video->affichageContenu($content, $type);


            ?>

        </div>
    </div>
</body>

</html>