<?php 
session_start();
$studentId= $_SESSION['userId'];
echo $studentId;
require_once($_SERVER['DOCUMENT_ROOT'].'/youdemy/models/course.php');
// $teacherId=$_GET['userId'];
$courseId= $_GET['courseId'];
$enrollment=new course();
$enrollment->enrollments($studentId,$courseId);



?>