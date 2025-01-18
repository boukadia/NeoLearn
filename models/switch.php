
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
//  include("../../../config/config.php");
if (isset($_GET['userId'])){

    $userId = $_GET['userId'];
    $newswitch = new User();
    if ($newswitch->switchActive($userId)) {
    header("Location: ../views/admin/affichageUsers.php");
    exit;
} else {
    
    throw new Exception('erreur!');
}
}
else{

    $courseId = $_GET['courseId'];
    $newswitch = new Course();
    if ($newswitch->switchActive($courseId)) {
    header("Location: ../views/admin/affichageCourses.php");
    exit;
} else {
    
    throw new Exception('erreur! cours');
}
}

?>