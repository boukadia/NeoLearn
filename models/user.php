<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');
// require_once "../config/database.php";
class User{
private $userName;
private $email;
private $password;
private $role;
private $pdo;

public function __construct($email,$password){
    // $this->userName=$userName;
    $this->email=$email;
    $this->password=$password;
    // $this->role=$role;

}

    public function register($userName,$role){
    $this->userName=$userName;
    $this->role=$role;


        $connect=new Database();
        $this->pdo=$connect->connect();
        $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt=$this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['email']==$this->email){
           return;

        }
        else {
        $stmt=$this->pdo->prepare("INSERT INTO users(username,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$this->userName,$this->email,$hashPassword,$this->role]);
        }


    }


    public function login(){

        $connect=new Database();
        $this->pdo=$connect->connect();
        
        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt=$this->pdo->prepare("SELECT * FROM users where email=?");
        $stmt->execute([$this->email]);
        $user =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($this->password, $user['password']) ){
           $_SESSION['userId']=$user['userId'];
           $_SESSION['userName']=$user['username'];
           $_SESSION['email']=$user['email'];
           $_SESSION['role']=$user['role'];
           if($_SESSION['role']=="student"){
               
            var_dump($_SESSION['role']);
               header("Location: ./student/index.php");
            //    require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/views/student/index.php');
               
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
   


}

// $user=new User($userName,$email,$password,$role);
// $user->register()


?>