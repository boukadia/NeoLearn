<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');

class Statistique extends User {
private $pdo;

    public function afficherNombreUsers() {
        
        echo "<h2>Liste des utilisateurs (enseignants)</h2>";
      $nombreEnseignant=(count($this->getUsers())) ; 
    }
    public function afficheNombreCourses(){
        $connect=new Database;
        $pdo=$connect->connect();
        $stmt=$pdo ->prepare("SELECT * FROM courses");
        $stmt->execute();
       $nombreCourses=count($stmt->fetchAll(PDO::FETCH_ASSOC)) ;
       return $nombreCourses;

    }

}


?>