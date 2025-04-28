
<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/statistique.php');

session_start();

session_regenerate_id(true); 
$admin=$_SESSION['userName'];

if ($_SESSION['role'] != "admin") {
    session_destroy();
    echo( $_SESSION['role']);
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
<?php print_r( $_SESSION['userName'])?>

<div class="main-content">

 <!-- Header -->
 <header>
            <div class="header-content">
                <h1>Welcome , <?php echo $admin ?></h1>
               
            </div>
        </header>


        <div style="width: 65%; margin-left:20%" >
  <canvas id="myChart"></canvas>
</div>
<script>
    <?php 
    
     $afficherStatistiques=new Statistique();
    $nombreCourses= $afficherStatistiques->afficheNombreCourses();
 $nombreEnseignants= $afficherStatistiques->afficherNombreUsers();
 $nombreEtudiantInscrit= $afficherStatistiques->afficheNombreEtudiantsInscrits();
 
//   ($coursesPopulaire= $afficherStatistiques->affichagePopulaireCourses());

    

  
    ?>
    const labels =["courses","Enseignants","Etudiants inscrit"] ;
const data = {
  labels: labels,
  datasets: [{
    label: 'statistique',
    data:  [<?php echo json_encode($nombreCourses); ?>,<?php echo json_encode($nombreEnseignants); ?>,
    <?php echo json_encode($nombreEtudiantInscrit); ?>],
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
                <li><a href="affichageCatTag.php"><i class="fas fa-tags"></i> Categories/Tags</a></li>
                <li><a href="affichageUsers.php"><i class="fas fa-chalkboard-teacher"></i> Enseignants</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>

    
       

     

        <section class="dashboard-overview">
            <h2>les meilleurs Courses</h2>
            <div class="cards">
                
            <?php 
         $afficherStatistiques=new Statistique();
         $coursesPopulaire=[];

           ($coursesPopulaire= $afficherStatistiques->affichagePopulaireCourses());
            foreach($coursesPopulaire as $courses)
              {
               echo"
                <div class='card'>
                    <img src='../../assests/images/".$courses['photo']."' alt='Course'>
                    <h3>".$courses['titre']."</h3>
                    <p>Pr: ".$courses['userName']."</p>
                    <p> Inscris:".$courses['total']."</p>
                </div>";
            }?>
               
            </div>
        </section>












        


        
        <!------------------------ Course Management ---------------------------------->
       




       

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Youdemy. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>
