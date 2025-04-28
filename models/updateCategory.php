<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/category.php');
$categoryId=$_GET['categoryId'];
$category=new category();
$category->updatecategory($categoryId);
if(isset($_POST['submit'])){
$connect=new Database();

$pdo=$connect->connect();

            $stmt=$pdo->prepare("UPDATE category  SET categoryName=?,categoryDescription=? where categoryId=?");
            $stmt->execute([$_POST['categoryName'],$_POST['categoryDescription'],$categoryId]);
header("location:../views/admin/affichageCatTag.php");


}


?>