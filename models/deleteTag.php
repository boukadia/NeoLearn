<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/youdemy/models/tags.php');

$tagId=$_GET['tagId'];
$tag=new tags();
$tag->deletetag($tagId);
header("location:../views/admin/affichageCatTag.php")

?>