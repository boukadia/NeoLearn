
<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Youdemy</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assests/css/style.css">

</head>
<body>
     <!-- Sidebar -->
     <div class="sidebar">
        <div class="sidebar-header">
            <h2 class="logo">Youdemy</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="manage-courses.html"><i class="fas fa-graduation-cap"></i> Manage Courses</a></li>
                <li><a href="manage-users.html"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="statistics.html"><i class="fas fa-chart-bar"></i> Statistics</a></li>
                <li><a href="settings.html"><i class="fas fa-cogs"></i> Settings</a></li>
                <li><a href="logout.html"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
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
            <h2>Manage Courses</h2>
            <table>
                <thead>
                    <tr>
                        <th>enseignant</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
              <?php 
              
              $user=new User();
              $user->getUsers();
              ?>
            </table>
        </section>
          <!-- Quick Links -->
          <section class="quick-links">
            <h2>Quick Links</h2>
            <div class="links">
                <a href="add-course.html" class="quick-link"><i class="fas fa-plus"></i> Add New Course</a>
                <a href="view-students.html" class="quick-link"><i class="fas fa-eye"></i> View Students</a>
                <a href="view-teachers.html" class="quick-link"><i class="fas fa-chalkboard-teacher"></i> View Teachers</a>
            </div>
        </section>
</body>

</html>




