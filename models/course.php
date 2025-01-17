<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './youdemy/config/database.php');
class Course
{
    private $titre;
    private $content;
    private $description;
    private $tagId;
    private $enseignantId;
    private $photo;
    private $type;
private $pdo;




    public function addCourse($titre, $description, $content, $photo, $userId, $categoryId, $tags,$type)
    {
        $connect = new Database();
        $pdo = $connect->connect();
        // $stmt=$pdo->prepare("SELECT * FROM tags");
        // $stmt->execute();

        // while (  $tag=$stmt->fetch(PDO::FETCH_ASSOC)){
        //     echo "
        //     <label>
        //   <input type='checkbox' name='tags[]' value='".$tag['tagId']."'> SEO
        // </label>
        //     ";
        // }
        $stmt = $pdo->prepare("INSERT INTO courses (titre,description,content,photo,teacherId,categoryId,type) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$titre, $description, $content, $photo, $userId, $categoryId,$type]);
        $courseId = $pdo->LastInsertId();
        $as = $tags;
        foreach ($as as $tag) {

            $stmt = $pdo->prepare("INSERT INTO courseTags (tagId,courseId) values(?,?)");
            $stmt->execute([$tag, $courseId]);
        }
        header("location:./affichageCourses.php");
    }


    public function getTags()
    {
        $connect = new Database();
        $pdo = $connect->connect();
        $stmt = $pdo->prepare("SELECT * FROM tags");
        $stmt->execute();

        while ($tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
        <label>
      <input type='checkbox' name='tags[]' value='" . $tag['tagId'] . "'> " . $tag['tagName'] . "
    </label>
        ";
        }
    }
    public function getCategory()
    {
        $connect = new Database();
        $pdo = $connect->connect();
        $stmt = $pdo->prepare("SELECT * FROM category");
        $stmt->execute();

        while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
                  <option value='" . $category['categoryId'] . "'> " . $category['categoryName'] . "</option>
      
        ";
        }
    }
    public function getCourses($teacherId){
        // courses(titre,content,photo,description)
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("SELECT * FROM courses where teacherId=? && courseStatus=?");
        $stmt->execute([$teacherId,"active"]);
        // echo" <pre>";
        while($courses=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo"
                <div class='card'>
                <h3>".$courses['titre']."</h3>
                <img src='../../assests/images/".$courses['photo']."' alt=''>
                <p>".$courses['description']." </p>
                <a href='../../models/deleteCourse.php?courseId=".$courses['courseId']."' class='btn'>delete</a>
                <a href='' class='btn'>update</a>
    </div>
            ";
        }
    } 



    public function getAllCourses(){
        // courses(titre,content,photo,description)
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("SELECT * FROM courses ");
        $stmt->execute();
        // echo" <pre>";
        while($courses=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo"
                <div class='card'>
                <h3>".$courses['titre']."</h3>
                <img src='../../assests/images/".$courses['photo']."' alt=''>
                <p>".$courses['description']." </p>
                <p>".$courses['courseStatus']." </p>
                <a href='../../models/softDeletCourse.php?courseId=".$courses['courseId']."' class='btn'>delete</a>
                <a href='' class='btn'>update</a>
    </div>
            ";
        }
    } 

//    ======================soft delete pour admin=================================

    public function softDeleteCourse($courseId){
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("UPDATE courses SET courseStatus=? where courseId=? ");
        $stmt->execute(["desactive",$courseId]);



    }

    public function deleteCourse($courseId){
        $connect=new Database();
        $this->pdo=$connect->connect();
        $stmt=$this->pdo->prepare("DELETE FROM courseTags where courseId=? ");
        $stmt->execute([$courseId]);

       

        $stmt=$this->pdo->prepare("DELETE FROM courses where courseId=? ");
        $stmt->execute([$courseId]);



    }
}


?>