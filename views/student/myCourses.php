<?php
// session_start();
session_start();
session_regenerate_id(true); 

if ($_SESSION['role'] != 'student') {
    session_destroy();
    header("location: ../login.html");
    exit();
} else {
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
$studentId = $_SESSION['userId'];
$myCourses = new Course();
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    $courses = $myCourses->getMyCourses($studentId, $_GET['page']);
} else {
    $courses = $myCourses->getMyCourses($studentId, 1);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Display</title>
    <link rel="stylesheet" href="../../assests/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>My Courses</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
           
            <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="myCourses.php"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <header class="header">
            <div class="header-content">
                <h1>Available Courses</h1>
                <div class="profile">
                    <img src="profile.jpg" alt="Profile" class="profile-img">
                    <div class="profile-info">
                        <p>John Doe</p>
                        <p class="role">Student</p>
                    </div>
                </div>
            </div>
        </header>

        <section class="dashboard-overview">
            <h2>Courses Overview</h2>
            <div class='cards'>
                <?php
                foreach ($courses[0] as $course)
                    echo "
                <div class='card'>
                    <img src='../../assests/images/" . $course['photo'] . "' alt='Course 1'>
                    <h3>" . $course['titre'] . "</h3>
                    <p>" . $course['description'] . "</p>
                    <a href='courseContent.php?courseId=" . $course['courseId'] . "&& userId=" . $_SESSION['userId'] ."&& content=".$course['content']."&& type=".$course['type']."&& teacher=".$course['userName']."' class='btn'>View Details</a>
                </div>
              
                ";
                ?>


            </div>
        </section>
        <!-- ================pagination======================== -->

        <div style="display: flex;justify-content: center" class="pagination">

            <nav aria-label='Page navigation example'>
                <ul class='pagination'>

                    <?php

                    for ($i = 1; $i <= $courses[1]; $i++) {
                        echo "
                    <li class='page-item'><a class='page-link' href='?page=$i'>$i</a>&nbsp</li>
            ";
                    }
                    ?>

                </ul>
            </nav>




        </div>
    </div>

    <footer>
        <p>&copy; 2025 My Courses Platform. All rights reserved.</p>
    </footer>
</body>

</html>