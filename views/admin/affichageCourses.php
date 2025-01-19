<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy/models/course.php');

session_start();
$teacherId=$_SESSION['userId'];
if ($_SESSION['role'] != "admin") {
    header("location : ../login.html");
    exit();
} else {

}


// session_start();
// echo $teacherId;

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



<div class="sidebar">
        <div class="sidebar-header">
            <h2 class="logo">Youdemy</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="affichageCourses.php"><i class="fas fa-graduation-cap"></i> Manage Courses</a></li>
                <li><a href="../../models/gestionUser.php"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="statistics.php"><i class="fas fa-chart-bar"></i> Statistics</a></li>
                <li><a href="affichageCatTag.php"><i class="fas fa-tags"></i> Categories/Tags</a></li>
                <li><a href="affichageUsers.php"><i class="fas fa-chalkboard-teacher"></i> Enseignants</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>


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
        
          <!------------------------ Course Management ---------------------------------->
          <section class="course-management">
            <h2>Manage Courses</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Instructor</th>
                        <th>Enrolled Students</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    $course=new Course();
                    
                    
                    $course->getAllCourses($_SESSION['role'])
                    ?>
              
                </tbody>
            </table>
        </section>
            
    
    
  

</main>main


</body>
</html>