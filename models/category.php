<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');

class Category
{

    private $CategoryName;
    private $categoryDescription;
    private $dateCreation;


    public function addCategory($categoryName, $categoryDescription)
    {
        $connect = new Database();
        $pdo = $connect->connect();
        $stmt = $pdo->prepare("INSERT INTO category (categoryName,categoryDescription) VALUES (?,?)");
        $stmt->execute([$categoryName, $categoryDescription]);
    }


    public function getCategory()
    {
        $connect = new Database();
        $pdo = $connect->connect();
        $stmt = $pdo->prepare("SELECT * FROM  category ");
        $stmt->execute();

        while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
             <tbody>
                    <tr>
                        <td>" . $category['categoryName'] . "</td>
                      
                        <td><span class='status active'>" . $category['categoryDescription'] . "</span></td>
                        <td><a href='../../models/deleteCategory.php?categoryId=" . $category['categoryId'] . "' class='edit-btn'>delete</a>
                        <a href='../../models/updateCategory.php?categoryId=" . $category['categoryId'] . "' class='edit-btn'>update</a></td>
                    </tr>
                </tbody>
            ";
        }
    }


    public function updateCategory($categoryId)
    {
        $connect = new Database();
        $pdo = $connect->connect();
        $stmt = $pdo->prepare("SELECT * from category where categoryId=?");
        $stmt->execute([$categoryId]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($category);
        echo "<div class='form-container'>
<h2>Ajouter une category</h2>
<form ='' method='post'>
    <div class='form-group'>
        <label for='categoryName'>categorys</label>
        <input type='text' id='categoryName' value='" . $category['categoryName'] . "' name='categoryName' placeholder='Entrez le nom de la category' required>
    </div>

    <div class='form-group'>
        <label for='categoryDescription'>description</label>
        <input type='text' id='categoryDescription' value='" . $category['categoryDescription'] . "'  name='categoryDescription' placeholder='Entrez le nom de la description' required>
    </div>
  
    
    <div class='form-group'>
        <button name='submit' type='submit'>Ajouter</button>
    </div>

</form>
</div>
";
    }


    public function deleteCategory($categoryId){
        $connect=new Database();
        $pdo=$connect->connect();
        $stmt=$pdo->prepare("DELETE FROM category WHERE categoryId=?");
        $stmt->execute([$categoryId]);
    }
}
