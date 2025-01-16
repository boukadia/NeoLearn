<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/youdemy/models/category.php');

$categoryId=$_GET['categoryId'];
// echo $categoryId;
$category=new Category();
$category->deleteCategory($categoryId);
header("location:../views/admin/affichageCatTag.php")


?>