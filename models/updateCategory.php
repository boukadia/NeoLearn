<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/category.php');
$categoryId=$_GET['categoryId'];
$category=new category();
$category->updatecategory($categoryId);
if(isset($_POST['submit'])){
$connect=new Database();

$pdo=$connect->connect();

            $stmt=$pdo->prepare("UPDATE category  SET categoryName=?,categoryDescription=? where categoryId=?");
            $stmt->execute([$_POST['categoryName'],$_POST['categoryDescription'],$categoryId]);

}


?>