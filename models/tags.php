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
                       <a href='./updateTag.php?tagId=".$tag['tagId']."' class='edit-btn'>update</a></td>
                   </tr>
               </tbody>
           ";
      



        }

    }


    public function deleteTag(){
        $connect=new Database();
        $pdo=$connect->connect();
        $stmt=$pdo->prepare("SELECT * FROM  tags");
        $stmt->execute();
        }
        public function updateTag($tagId){
            $connect=new Database();
            $pdo=$connect->connect();
            $stmt=$pdo->prepare("SELECT * from tags where tagId=?");
            $stmt->execute([$tagId]);
            $tag=$stmt->fetch(PDO::FETCH_ASSOC);
            echo "<div class='form-container'>
        <h2>Ajouter une Tag</h2>
        <form ='' method='post'>
            <div class='form-group'>
                <label for='tagName'>tags</label>
                <input type='text' id='tagName' value='".$tag['tagName']."' name='tagName' placeholder='Entrez le nom de la tag' required>
            </div>
          
            
            <div class='form-group'>
                <button name='submit' type='submit'>Ajouter</button>
            </div>
        
        </form>
    </div>
    ";

            
          
    
    
    
            }

    


}











?>