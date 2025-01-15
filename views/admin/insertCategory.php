<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/category.php');
$categoryName=$_POST['categoryName'];
$CategoryDescription=$_POST['CategoryDescription'];

$addCategory=new Category();
$addCategory->addCategory($categoryName,$CategoryDescription);



?>