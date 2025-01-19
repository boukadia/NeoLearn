<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Display</title>
    <link rel="stylesheet" href="../../assests/css/style.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>My Courses</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
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
            <div class="cards">
                <div class="card">
                    <img src="course1.jpg" alt="Course 1">
                    <h3>Web Development</h3>
                    <p>Learn the basics of HTML, CSS, and JavaScript.</p>
                    <a href="#" class="btn">View Details</a>
                </div>
                <div class="card">
                    <img src="course2.jpg" alt="Course 2">
                    <h3>Data Science</h3>
                    <p>Introduction to data analysis and machine learning.</p>
                    <a href="#" class="btn">View Details</a>
                </div>
                <div class="card">
                    <img src="course3.jpg" alt="Course 3">
                    <h3>UI/UX Design</h3>
                    <p>Design engaging and user-friendly interfaces.</p>
                    <a href="#" class="btn">View Details</a>
                </div>
                <div class="card">
                    <img src="course4.jpg" alt="Course 4">
                    <h3>Mobile Development</h3>
                    <p>Create apps for Android and iOS platforms.</p>
                    <a href="#" class="btn">View Details</a>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2025 My Courses Platform. All rights reserved.</p>
    </footer>
</body>

</html>