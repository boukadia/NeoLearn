<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
session_start();


if ($_SESSION['role'] !== "student") {
    session_destroy();
    header("Location: ../login.html");
    exit();
} else {
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Étudiant</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assests/css/style.css">

</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Educa</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="profile.php"><i class="fas fa-user"></i> Profil</a></li>
                <li><a href="myCourses.php"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                <!-- <li><a href="teachers.php"><i class="fas fa-chalkboard-teacher"></i> Enseignants</a></li>
                <li><a href="contact.php"><i class="fas fa-headset"></i> Contact</a></li> -->
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header Section -->
        <header class="header">
            <div class="header-content">
                <h1>Profil de Marie Dupont</h1>
                <div class="profile">
                    <img src="images/student-pic.jpg" alt="Marie Dupont" class="profile-img">
                    <div class="profile-info">
                        <p class="role">Étudiant - Développement Web</p>
                        <p class="email"><i class="fas fa-envelope"></i> marie.dupont@example.com</p>
                        <a href="mailto:marie.dupont@example.com" class="contact-btn">Contacter</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mes Cours -->
        <section class="my-courses">
            <h2>Mes Cours</h2>
            <div style='flex-wrap:wrap' class="courses-list">

                <?php
                $courses = new Course();
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                
                    $courses->getAllCourses($_SESSION['role'],$_GET['page']);
                } else {
                    $courses->getAllCourses($_SESSION['role'], 1);
                    
                    echo $n;

                }


               
                ?>
            



            </div>
        </section>

        <!-- Statistiques -->
        <section class="student-stats">
            <h2>Mes Statistiques</h2>
            <div class="stats-container">
                <div class="stat-item">
                    <h3>Cours Complétés</h3>
                    <p>3 sur 5</p>
                </div>
                <div class="stat-item">
                    <h3>Note Moyenne</h3>
                    <p>85%</p>
                </div>
                <div class="stat-item">
                    <h3>Progrès</h3>
                    <p>75%</p>
                </div>
            </div>
        </section>

        <!-- Avis Étudiant -->
        <section class="student-reviews">
            <h2>Avis sur mes Cours</h2>
            <div class="reviews">
                <div class="review">
                    <p class="review-text">"Les cours sont très bien structurés et permettent une prise en main rapide. Je recommande !" - <strong>Marie Dupont</strong></p>
                </div>
                <div class="review">
                    <p class="review-text">"J'ai appris beaucoup grâce à ce site. Les enseignants sont super et les cours sont très complets." - <strong>Marc Lefevre</strong></p>
                </div>
            </div>
        </section>
    </main>
<!-- ================pagination======================== -->

<div style="display: flex;justify-content: center" class="pagination">

<nav aria-label='Page navigation example'>
    <ul class='pagination'>

        <?php

        for ($i = 1; $i <= $_SESSION['nbreCourses']; $i++) {
            echo "
        <li class='page-item'><a class='page-link' href='?page=$i'>$i</a>&nbsp</li>
";
        }
        ?>

    </ul>
</nav>




</div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Educa. Tous droits réservés.</p>
    </footer>
</body>

</html>