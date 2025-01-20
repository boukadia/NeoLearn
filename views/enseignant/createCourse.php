<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');

session_start();
session_regenerate_id(true); 
if ($_SESSION['role'] != "enseignant" ||$_SESSION['status']=="pending") {
    session_destroy();
    header("location : ../login.html");
    exit();
} else {
};
$userId = ($_SESSION['userId']);
if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $photo = $_POST['photo'];
    $categoryId = $_POST['categoryId'];
    $tags = $_POST['tags'];
    $type = $_POST['type'];
    $course = new Course();
    $course->addCourse($titre, $description, $content, $photo, $userId, $categoryId, $tags,$type);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assests/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Formulaire de Publication</h2>

            <form action="" method="POST">

                <div class="textbox">
                    <input type="text" name="titre" placeholder="Titre" required>
                </div>

                <div class="textbox">
                    <select name="categoryId" required>
                        <option value="">Selectionner une categorie</option>

                        <!-- <option value="tech">Technologie</option>
          <option value="design">Design</option>
          <option value="marketing">Marketing</option>
          <option value="business">Business</option> -->
                        <?php
                        $category = new course();
                        $category->getCategory();
                        ?>
                    </select>
                </div>

                <div class="textbox">
                    <div class="tags-wrapper">
                        <?php

                        // require_once($_SERVER['DOCUMENT_ROOT'.'./youdemy/models/course.php']);
                        $tag = new Course();

                        $tag->getTags();
                        ?>


                    </div>
                </div>


                <div class="textbox">
                    <input type="text" name="description" placeholder="ecrire de la description" required>
                </div>

                <div class="textbox">
                    <input type="url" name="content" placeholder="URL du contenu" required>
                </div>
                <!-- <div class="textbox">
                    <input type="url" name="photo" placeholder="URL du contenu" required>
                </div> -->


                <div class="textbox">
        <input type="file" name="photo" accept="image/*" required>
      </div>

                <div class="textbox">
                    <select name="type" required>
                        <option value="">Selectionner le type de contenu</option>
                        <option value="article">Article</option>
                        <option value="video">Video</option>
                    </select>
                </div>


                <button name="submit" type="submit" class="btn">ajouter</button>
            </form>
        </div>
    </div>

</body>

</html>