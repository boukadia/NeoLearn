<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'./youdemy/config/database.php');
class Course{
private $titre;
private $content;
private $description;
private $tagId;
private $enseignantId;
private $photo;
private $type;



public function addCourse($titre,$description,$content,$photo,$userId,$categoryId,$tags){
    $connect=new Database();
    $pdo=$connect->connect();
    // $stmt=$pdo->prepare("SELECT * FROM tags");
    // $stmt->execute();
  
    // while (  $tag=$stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo "
    //     <label>
    //   <input type='checkbox' name='tags[]' value='".$tag['tagId']."'> SEO
    // </label>
    //     ";
    // }
    $stmt=$pdo->prepare("INSERT INTO courses (titre,description,content,photo,teacherId,categoryId) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$titre,$description,$content,$photo,$userId,$categoryId]);
    $courseId=$pdo->LastInsertId();
    $as=$tags;
    foreach($as as $tag){

        $stmt=$pdo->prepare("INSERT INTO courseTags (tagId,courseId) values(?,?)");
        $stmt->execute([$courseId,$tag]);
    }
    }


public function getTags(){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("SELECT * FROM tags");
    $stmt->execute();
  
    while (  $tag=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "
        <label>
      <input type='checkbox' name='tags[]' value='".$tag['tagId']."'> ".$tag['tagName']."
    </label>
        ";
    }
}
public function getCategory(){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("SELECT * FROM category");
    $stmt->execute();
  
    while (  $category=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "
                  <option value='".$category['categoryId']."'> ".$category['categoryName']."</option>
      
        ";
    }
}


}



?>