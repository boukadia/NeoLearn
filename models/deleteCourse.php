<?php 
session_start();


require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy/models/course.php');
$courseId=$_GET["courseId"];
$course=new Course();
$course->deleteCourse($courseId);

header("location: ../views/enseignant/index.php");
