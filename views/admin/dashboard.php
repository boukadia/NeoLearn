
<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
session_start();
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>
<div style="width: 65%; margin-left:20%" >
  <canvas id="myChart"></canvas>
</div>

<script>
    const labels = [65, 59, 80, 81, 56, 55, 40] ;
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};


  // === include 'setup' then 'config' above ===

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );


</script>
    <!-- Sidebar -->
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

        <section class="dashboard-overview">
            <h2>Overview</h2>
            <div class="cards">
                <div class="card">
                    <h3>Total Courses</h3>
                    <p>120</p>
                </div>
                <div class="card">
                    <h3>Total Students</h3>
                    <p>1500</p>
                </div>
                <div class="card">
                    <h3>Total Teachers</h3>
                    <p>40</p>
                </div>
                <div class="card">
                    <h3>Active Enrollments</h3>
                    <p>1100</p>
                </div>
            </div>
        </section>







        
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
                    <tr>
                        <td>HTML for Beginners</td>
                        <td>John Doe</td>
                        <td>200</td>
                        <td><span class="status active">Active</span></td>
                        <td><a href="edit-course.html" class="edit-btn">delete</a></td>
                    </tr>
                    <tr>
                        <td>CSS Mastery</td>
                        <td>Jane Smith</td>
                        <td>180</td>
                        <td><span class="status inactive">Inactive</span></td>
                        <td><a href="edit-course.html" class="edit-btn">delete</a></td>
                    </tr>
                    <tr>
                        <td>JavaScript Essentials</td>
                        <td>Michael Johnson</td>
                        <td>150</td>
                        <td><span class="status active">Active</span></td>
                        <td><a href="edit-course.html" class="edit-btn">delete</a></td>
                    </tr>
                </tbody>
            </table>
        </section>




       

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Youdemy. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>
