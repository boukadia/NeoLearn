<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');

class Category{

private $CategoryName;
private $CategoryDescription;
private $dateCreation;


public function addCategory($categoryName,$CategoryDescription,$dateCreation){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("INSERT INTO category (categoryName,CategoryDescription,dateCreation) VALUES (?,?,?)");
    $stmt->execute([$categoryName,$CategoryDescription,$dateCreation]);

}

}

?>