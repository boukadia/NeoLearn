<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
session_start();
if ($_SESSION['role'] != "enseignant") {
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
                <h1>Professeur John Doe</h1>
                <div class="profile">
                    <img src="images/teacher-pic.jpg" alt="Professeur John Doe" class="profile-img">
                    <div class="profile-info">
                        <p class="role">Enseignant - Développement Web</p>
                        <p class="experience"><i class="fas fa-briefcase"></i> 5 ans d'expérience</p>
                        <a href="mailto:teacher@example.com" class="contact-btn">Contacter</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Enseignant Description -->
        <section class="teacher-description">
            <h2>À propos de moi</h2>
            <p>
                Bonjour, je suis John Doe, un passionné de développement web avec plus de 5 ans d'expérience dans l'enseignement des technologies front-end et back-end. Je suis ici pour vous aider à maîtriser les langages comme HTML, CSS, JavaScript, et PHP à travers des cours pratiques et interactifs.
            </p>
        </section>

        <!-- Cours Enseigné -->
        <section class="courses-taught">
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

        <!-- Avis des étudiants -->
        <section class="student-reviews">
            <h2>Avis des Étudiants</h2>
            <div class="reviews">
                <div class="review">
                    <p class="review-text">"Le cours de JavaScript était exceptionnel ! Très bien structuré et facile à suivre. Je recommande vivement !" - <strong>Marie Dupont</strong></p>
                </div>
                <div class="review">
                    <p class="review-text">"Grâce au cours CSS avancé, j'ai pu améliorer considérablement le design de mon site. Merci pour les explications claires et détaillées." - <strong>Lucien Lemoine</strong></p>
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