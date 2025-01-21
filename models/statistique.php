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
        $stmt=$this->pdo->prepare("(SELECT courseId,COUNT(studentId) as total FROM enrollments GROUP by courseId ORDER by total  ASC)");
        $stmt->execute();
        return $nombreEtudiant=count($stmt->fetchAll(pdo::FETCH_ASSOC));
        
        
    }
    

}

