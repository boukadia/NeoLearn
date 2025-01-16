<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/tags.php');
$tagName=$_POST['tagName'];
$tag=new Tags();
$tag->addTag($tagName);
header("location:../views/admin/affichageCatTag.php")





?>