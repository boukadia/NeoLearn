<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');

class Category{

private $CategoryName;
private $CategoryDescription;
private $dateCreation;


public function addCategory($categoryName,$CategoryDescription){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("INSERT INTO category (categoryName,CategoryDescription) VALUES (?,?)");
    $stmt->execute([$categoryName,$CategoryDescription]);

}


public function getCategory(){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("SELECT * FROM  category ");
    $stmt->execute();
    
    while($category=$stmt->fetch(PDO :: FETCH_ASSOC)){
        echo "
             <tbody>
                    <tr>
                        <td>".$category['categoryName']."</td>
                      
                        <td><span class='status active'>".$category['CategoryDescription']."</span></td>
                        <td><a href='edit-course.html' class='edit-btn'>delete</a>
                        <a href='edit-course.html' class='edit-btn'>update</a></td>
                    </tr>
                </tbody>
            ";
       
    }

}

}

?>