<?php
// require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/course.php');

class Statistique extends User
{
    private $pdo;

    public function afficherNombreUsers()
    {

        // echo "<h2>Liste des utilisateurs (enseignants)</h2>";
        $nombreEnseignant = (count($this->getUsers()));
        return $nombreEnseignant;
    }
    public function afficheNombreCourses()
    {
        $connect = new Database;
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM courses");
        $stmt->execute();
        $courses = [];
       

        // return $courses; 
       
        $nombreCourses = count($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $nombreCourses;
    }

    public function afficheNombreEtudiantsInscrits(){
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("(SELECT studentId FROM enrollments GROUP by studentId)");
        $stmt->execute();
        return $nombreEtudiant=count($stmt->fetchAll(pdo::FETCH_ASSOC));
        
        
    }

    public function affichagePopulaireCourses(){
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("SELECT courses.photo, enrollments.courseId,COUNT(enrollments.studentId) as total,courses.titre,users.userName 
FROM courses
inner JOIN users on courses.teacherId=users.userId
inner join enrollments on  enrollments.courseId=courses.courseId
GROUP by courseId ORDER by total  DESC limit 10");
        $stmt->execute();
        return ($stmt->fetchall(pdo::FETCH_ASSOC));
        
        
    }
    public function affichagePopulaireCoursesForTeacher($teacherId){
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("SELECT courses.photo,users.userId,courses.description, enrollments.courseId,COUNT(enrollments.studentId) as total,courses.titre,users.userName 
FROM courses
inner JOIN users on courses.teacherId=users.userId
inner join enrollments on  enrollments.courseId=courses.courseId
where userId=? 
GROUP by courseId ORDER by total DESC   limit 10");
        $stmt->execute([$teacherId]);
         $coursesPopulaire=($stmt->fetchAll(pdo::FETCH_ASSOC));
         foreach($coursesPopulaire as $courses){
            echo"
            <div class='card'>
                  <h3>" . htmlspecialchars($courses['titre'])  . "</h3>
                  <img src='../../assests/images/" . htmlspecialchars($courses['photo'])  . "' alt=''>
                  <p>" . htmlspecialchars($courses['description']) . " </p>
                  <p>inscription: " . htmlspecialchars($courses['total']) . " </p>
      </div>";
           }
        
        
    }
    

}

