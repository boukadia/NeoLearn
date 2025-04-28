<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/course.php');
session_start();
// session_start();
session_regenerate_id(true); 
$etudiantName= $_SESSION['userName'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <li><a href="myCourses.php"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header Section -->
        <header class="header">
            <div class="header-content">
                <h1>Profil de <?php echo $etudiantName?> </h1>
                <div class="profile">
                    <div class="profile-info">
                    </div>
                </div>
            </div>
        </header>

        <!-- Mes Cours -->
        <section class="my-courses">
            <h2>Learn Anything</h2>
            <div style='flex-wrap:wrap' class="courses-list">

                <?php
                $courses = new Course();
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                
                    $courses->getAllCourses($_SESSION['role'],$_GET['page']);
                    echo $page;
                } else {
                    $courses->getAllCourses($_SESSION['role'], 1);


                }


               
                ?>
            



            </div>
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




</div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Educa. Tous droits réservés.</p>
    </footer>
</body>

</html>