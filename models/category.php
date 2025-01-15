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
                        <a href='.updateCategory.php?categoryId=".$category['categoryId']."' class='edit-btn'>update</a></td>
                    </tr>
                </tbody>
            ";
       
    }

}


public function updateCategory($categoryId){
    $connect=new Database();
    $pdo=$connect->connect();
    $stmt=$pdo->prepare("SELECT * from tags where tagId=?");
    $stmt->execute([$categoryId]);
    $category=$stmt->fetch(PDO::FETCH_ASSOC);
    echo "<div class='form-container'>
<h2>Ajouter une category</h2>
<form ='' method='post'>
    <div class='form-group'>
        <label for='categoryName'>categorys</label>
        <input type='text' id='categoryName' value='".$category['categoryName']."' name='categoryName' placeholder='Entrez le nom de la category' required>
    </div>

    <div class='form-group'>
        <label for='categoryDescription'>description</label>
        <input type='text' id='categoryDescription' value='".$category['categoryDescription']."' name='categoryDescription' placeholder='Entrez le nom de la description' required>
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