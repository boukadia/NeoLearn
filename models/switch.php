
<?php
 include_once($_SERVER['DOCUMENT_ROOT'].'/youdemy/models/user.php');
//  include("../../../config/config.php");

$userId=$_GET['userId'];

// if (isset($_GET['userId'])) {
//     $userId = $_GET['userId']; 
// } else {
//     die('error userId');
// }

// try {
    $newswitch = new User();
    if ($newswitch->switchActive($userId)) {
        header("Location: ../views/admin/affichageUsers.php");
        exit;
    }else{

        throw new Exception('errorr udate');

    }
// } catch (Exception $e) {
//     error_log($e->getMessage());
//     die('errrrrro');
// // }
?>