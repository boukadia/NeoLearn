
<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/user.php');
session_start();
session_regenerate_id(true); 
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

    <div class="main-content">

        <header>
            <div class="header-content">
            <h1>Welcome , <?php echo $admin ?></h1>
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
              $users=$user->getUsers();
              foreach ($users as $user ) {
                echo "
                 <tbody>
                        <tr>
                            <td>Pr." . $user['userName'] . "</td>
                          
                            <td><span class='status active'>" . $user['status'] . "</span></td>
                            <td><a href='../../models/switch.php?userId=" . $user['userId'] . "' class='edit-btn'>switch</a></td>
                        </tr>
                    </tbody>
                ";
            }
              ?>
            </table>
        </section>
          
</body>

</html>




