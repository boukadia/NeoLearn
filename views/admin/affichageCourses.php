<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './youdemy/models/course.php');
session_start();
session_regenerate_id(true); 
$admin=$_SESSION['userName'];

$teacherId = $_SESSION['userId'];
if ($_SESSION['role'] != "admin") {
    session_destroy();

    header("location : ../login.html");
    exit();
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assests/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

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
                <li><a href="affichageCatTag.php"><i class="fas fa-tags"></i> Categories/Tags</a></li>
                <li><a href="affichageUsers.php"><i class="fas fa-chalkboard-teacher"></i> Enseignants</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>


  




    <!-- Main Content -->
    <main class="main-content">
        <!-- Header Section -->
      

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

                    $course = new Course();
                    if (isset($_GET['page']))
                        $course->getAllCourses($_SESSION['role'], $_GET['page']);
                    else {

                        $course->getAllCourses($_SESSION['role'], 1);
                    }


                    ?>

                </tbody>
            </table>
        </section>





    </main>
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




    </div>main


</body>

</html>