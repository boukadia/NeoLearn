<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
$course = new Course();
// session_start();
session_start();
session_regenerate_id(true); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Display</title>
    <link rel="stylesheet" href="../assests/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Header Navigation</title>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/youdemy/assests/css/header/header.php')
?>
       
</head>

<body>






    <div class="sidebar">
       
        <nav class="sidebar-nav">
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
          
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header class="headerr">
            <nav class="nav-container">
                <div class="logo-section">
                    <a href="index.php" class="logo">
                        <img src="../assests/images/university.png" alt="Logo">
                        EasyLearn
                    </a>
                    <a href="index.php" class="nav-link">Accueil</a>
                </div>
                <form action="" method="post">
                    <div class="search-bar">
                        <input name="recherche" type="text" placeholder="Rechercher un cours...">
                        <button type="submit" name="submit">🔍</button>
                    </div>
                </form>



                <div class="auth-section">
                    <a href="login.html" class="auth-btn login-btn">Se connecter</a>
                    <a href="register.html" class="auth-btn signup-btn">S'inscrire</a>
                </div>


                <div class="profile-section" style="display: none;">
                    <div class="profile-img">
                        <img src="" alt="Photo de profil">
                    </div>
                    <span class="profile-name">John Doe</span>
                    <span class="dropdown-icon">▼</span>
                </div>
            </nav>
        </header>


        <section class="dashboard-overview">
            <h2>Courses Overview</h2>
            <div style="margin-top: 49px;" class="cards">


                <?php
                     $courses = new Course();
                 if (isset($_POST['submit']) && $_POST['recherche'] == ''){
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    
                        $courses->getAllCourses("visiteur",$_GET['page']);
                        echo $page;
                    }
                    else {
                        $courses->getAllCourses("visiteur", 1);
                   
                   
                    }
                 }

                 else if (!isset($_POST['submit'])) {
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    
                        $courses->getAllCourses("visiteur",$_GET['page']);
                        echo $page;
                    }
                    else {
                        $courses->getAllCourses("visiteur", 1);
                   
                   
                    }
                }


                else {
                    if (isset($_GET['page']))

                    $course->rechercheCourse($_POST['recherche'],$_GET['page']);
                    else{
                        $course->rechercheCourse($_POST['recherche'],1);
                    }
                }
 


              


                ?>

            </div>
        </section>

        
    </div>
<!-- ================pagination======================== -->

<div style="display: flex;justify-content: center" class="pagination">

<nav aria-label='Page navigation example'>
    <ul class='pagination'>

        <?php

        for ($i = 1; $i <= $_SESSION['nbrePages']; $i++) {
            echo "
        <li class='page-item'><a class='page-link' href='?page=$i'>$i</a>&nbsp</li>
";
        }
        ?>

    </ul>
</nav>




</div>
    <footer>
        <p>&copy; 2025 My Courses Platform. All rights reserved.</p>
    </footer>
</body>

</html>