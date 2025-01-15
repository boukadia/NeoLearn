<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
session_start();


if ($_SESSION['role'] !== "student") {
    var_dump($_SESSION['role']);
    header("Location: ../login.html");
    exit();
}
else {
   
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
                <li><a href="home.html"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="profile.html"><i class="fas fa-user"></i> Profil</a></li>
                <li><a href="courses.html"><i class="fas fa-graduation-cap"></i> Cours</a></li>
                <li><a href="teachers.html"><i class="fas fa-chalkboard-teacher"></i> Enseignants</a></li>
                <li><a href="contact.html"><i class="fas fa-headset"></i> Contact</a></li>
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
            <div class="courses-list">
                <div class="course-item">
                    <img src="images/course-html.jpg" alt="Cours HTML">
                    <h3>Développement HTML pour Débutants</h3>
                    <p>Apprenez les bases du HTML pour créer des pages web.</p>
                    <a href="course-detail.html" class="btn">Voir le cours</a>
                </div>
                <div class="course-item">
                    <img src="images/course-css.jpg" alt="Cours CSS">
                    <h3>CSS Avancé - Design Web</h3>
                    <p>Transformez votre HTML avec des styles CSS modernes et responsives.</p>
                    <a href="course-detail.html" class="btn">Voir le cours</a>
                </div>
                <div class="course-item">
                    <img src="images/course-js.jpg" alt="Cours JavaScript">
                    <h3>JavaScript pour Développeurs Web</h3>
                    <p>Apprenez à rendre vos pages interactives avec JavaScript.</p>
                    <a href="course-detail.html" class="btn">Voir le cours</a>
                </div>
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

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Educa. Tous droits réservés.</p>
    </footer>
</body>

</html>
