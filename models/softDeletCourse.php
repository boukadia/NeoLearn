<?php 
session_start();
$role=$_SESSION['role'];
echo $role;

require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy1/models/course.php');
$courseId=$_GET["courseId"];
$course=new Course();
$course->softDeleteCourse($courseId);
// if($role=="enseignant")

header("location: ../views/admin/affichageCourses.php");





?>