<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy1/models/category.php');
$categoryName=$_POST['categoryName'];
$CategoryDescription=$_POST['CategoryDescription'];

$addCategory=new Category();
$addCategory->addCategory($categoryName,$CategoryDescription);
header("location:../views/admin/affichageCatTag.php")




?>