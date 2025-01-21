<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');

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
GROUP by courseId ORDER by total  DESC limit 2");
        $stmt->execute();
        return ($stmt->fetchall(pdo::FETCH_ASSOC));
        
        
    }
    

}

