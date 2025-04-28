<?php

// require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy1/models/course.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/statistique.php');
// session_start();
session_start();
session_regenerate_id(true); 

$teacherId=$_SESSION['userId'];
$teacherName=$_SESSION['userName'];
// echo $teacherId;

if ($_SESSION['role'] != "enseignant" ||$_SESSION['status']=="pending") {
    session_destroy();
    header("location : ../login.html");
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
    <title>Profil Enseignant</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

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
                <li><a href="affichageCourses.php"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <!-- Header Section -->
        <header class="header">
            <div class="header-content">
                <h1>Professeur <?php echo $teacherName ?></h1>
                <div class="profile">
                    <img src="images/teacher-pic.jpg" alt="Professeur John Doe" class="profile-img">
                    <div class="profile-info">
                        <p class="role">Enseignant - Developpement Web</p>
                        <p class="experience"><i class="fas fa-briefcase"></i> 5 ans d'expérience</p>
                        <a href="mailto:teacher@example.com" class="contact-btn">Contacter</a>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="dashboard-overview">
          <h2>Courses Overview</h2>
          <div class="cards">
           <?php
           $coursesPopulaire =new Statistique();
           $coursesPopulaire->affichagePopulaireCoursesForTeacher($teacherId);
          
          
    ?>
    
    
  </div>
</div>

        <div class="dashboard-overview">
          <h2>Courses Overview</h2>
          <div class="cards">
            
            <?php
$course=new Course();


$course->getCourses($teacherId)
?>
    
    
  </div>
</div>
</main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Educa. Tous droits réservés.</p>
    </footer>
</body>

</html>