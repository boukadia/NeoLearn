<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');
// require_once "../config/database.php";
class User{

private $pdo;



    public function register($userName,$email,$password,$role){
   


        $connect=new Database();
        $this->pdo=$connect->connect();
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt=$this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['email']==$email){
           return;

        }
        else {
        $stmt=$this->pdo->prepare("INSERT INTO users(username,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$userName,$email,$hashPassword,$role]);
        }


    }


    public function login($email,$password){

        $connect=new Database();
        $this->pdo=$connect->connect();
        
        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt=$this->pdo->prepare("SELECT * FROM users where email=?");
        $stmt->execute([$email]);
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password']) ){
           $_SESSION['userId']=$user['userId'];
           $_SESSION['userName']=$user['username'];
           $_SESSION['email']=$user['email'];
           $_SESSION['role']=$user['role'];
           if($_SESSION['role']=="student"){
               
            var_dump($_SESSION['role']);
               header("Location: ./student/index.php");
            }
            else if ($_SESSION['role']=="enseignant"){
                header("Location: ./enseignant/index.php");

            }
            else {
                header("Location: ./admin/dashboard.php");

            }
            
        }
        else {
            var_dump($user['userId']);
        }
    }
   

    public function getUsers(){

        $connect=new Database();
        $this->pdo=$connect->connect();
        
        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt=$this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        while($user =$stmt->fetch(PDO::FETCH_ASSOC)){
            echo "
             <tbody>
                    <tr>
                        <td>".$user['userName']."</td>
                      
                        <td><span class='status active'>".$user['status']."</span></td>
                        <td><a href='edit-course.html' class='edit-btn'>delete</a></td>
                    </tr>
                </tbody>
            ";
       
            
       
    }
}


}

// $user=new User($userName,$email,$password,$role);
// $user->register()


?>