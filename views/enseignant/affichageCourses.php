<?php 
session_start();
$teacherId=$_SESSION['userId'];
if ($_SESSION['role'] != "enseignant" ||$_SESSION['status']=="pending") {
    session_destroy();
    header("location : ../login.html");
    exit();
} else {
};


require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy/models/course.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assests/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


    <title>Document</title>
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
                <!-- <li><a href="profile.php"><i class="fas fa-user"></i> Profil</a></li> -->
                <li><a href="affichageCourses.php"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <!-- <li><a href="contact.php"><i class="fas fa-headset"></i> Contact</a></li> -->
            </ul>
        </nav>
    </aside>


    <section class="button-section">
    <a href="createCourse.php" class="add-category-button"><i class="fas fa-folder-plus"></i> Add courses</a>
</section>




    <!-- Main Content -->
    <main class="main-content">
        <!-- Header Section -->
        <header class="header">
            <div class="header-content">
                <h1>Professeur John Doe</h1>
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
$course=new Course();


$course->getCourses($teacherId)
?>
    
    
  </div>
</div>
</main>main


</body>
</html>