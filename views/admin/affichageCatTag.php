<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/tags.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/category.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
session_start();
$admin=$_SESSION['userName'];

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Youdemy</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


    <link rel="stylesheet" href="../../assests/css/style.css">

</head>

<body>
    <!-- Sidebar -->
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
<!-- ====================================================== -->
<!-- ====================================================== -->

<!-- Section for Add Tag and Add Category buttons -->
<!-- <section class="button-section">
    <button class="add-category-button">Add Category</button>
    <button class="add-tag-button">Add Tag</button>
</section> -->


<!-- Section for Add Tag and Add Category buttons -->
<section class="button-section">
    <a href="../../models/addCategory.php" class="add-category-button"><i class="fas fa-folder-plus"></i> Add Category</a>
    <a href="../../models/addTags.php"  class="add-tag-button"><i class="fas fa-tag"></i> Add Tags</a>
</section>


<!-- ========================================================== -->
<!-- ========================================================== -->
<!-- ========================================================== -->

    <div class="main-content">
        <!-- Header -->
        <header>
            <div class="header-content">
                <h1>Welcome to Your Dashboard, Admin</h1>
                <div class="profile">
                    <img src="images/admin-profile.jpg" alt="Admin Profile" class="profile-img">
                    <p>Admin Name</p>
                </div>
            </div>
        </header>


        <section class="course-management">
            <h2>categorys</h2>
            <table>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>description</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <?php

                $category = new category();
                $category->getcategory();
                ?>
            </table>
        </section>

        <section class="course-management">
            <h2>Tags</h2>
            <table>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <?php

                $tag = new Tags();
                $tag->getTag()
                ?>
            </table>
        </section>


</body>

</html>