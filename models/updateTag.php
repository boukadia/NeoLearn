<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/tags.php');
$tagId=$_GET['tagId'];
$tag=new Tags();
$tag->updateTag($tagId);
if(isset($_POST['submit'])){
$connect=new Database();

$pdo=$connect->connect();

            $stmt=$pdo->prepare("UPDATE tags  SET tagName=? where tagId=?");
            $stmt->execute([$_POST['tagName'],$tagId]);

}


?>