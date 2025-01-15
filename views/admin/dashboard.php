
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

        <!-- Dashboard Overview -->
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

        <!-- Quick Links -->
        <section class="quick-links">
            <h2>Quick Links</h2>
            <div class="links">
                <a href="add-course.html" class="quick-link"><i class="fas fa-plus"></i> Add New Course</a>
                <a href="view-students.html" class="quick-link"><i class="fas fa-eye"></i> View Students</a>
                <a href="view-teachers.html" class="quick-link"><i class="fas fa-chalkboard-teacher"></i> View Teachers</a>
            </div>
        </section>





        
        <!-- Course Management -->
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




        <!-- Recent Activity -->
        <section class="recent-activity">
            <h2>Recent Activity</h2>
            <ul>
                <li><i class="fas fa-user-plus"></i> New student registered: <strong>Mark Smith</strong></li>
                <li><i class="fas fa-user-plus"></i> New teacher added: <strong>Sarah Lee</strong></li>
                <li><i class="fas fa-book"></i> New course added: <strong>Advanced JavaScript</strong></li>
                <li><i class="fas fa-users"></i> 10 students enrolled in "HTML for Beginners"</li>
            </ul>
        </section>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Youdemy. All rights reserved.</p>
    </footer>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>
