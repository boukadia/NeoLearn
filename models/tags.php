<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');
class Tags{
    private $tagName ;
    public function addTag($tagName){
        $connect=new Database();
        $pdo=$connect->connect();
        $stmt=$pdo->prepare("INSERT INTO tags(tagName) VALUES (?)");
        $stmt->execute([$tagName]);

    }
    public function getTag(){
        $connect=new Database();
        $pdo=$connect->connect();
        $stmt=$pdo->prepare("SELECT * FROM  tags");
        $stmt->execute();
        while($tag=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tbody>
                   <tr>
                       <td>".$tag['tagName']."</td>
                     
                       <td><a href='edit-course.html' class='edit-btn'>delete</a>
                       <a href='edit-course.html' class='edit-btn'>update</a></td>
                   </tr>
               </tbody>
           ";
      



        }

    }


}











?>