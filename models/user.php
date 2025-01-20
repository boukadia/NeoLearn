<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/config/database.php');
// require_once "../config/database.php";
class User
{
private $userName;
private $role;

    private $pdo;

    public function __construct() {
        $connect = new Database();
        $this->pdo = $connect->connect();
    }
public function getNom(){
   return $this->userName;
    
}
public function getRole(){
   return $this->role;
}
    public function register($userName, $email, $password, $role)
    {



        // $connect = new Database();
        // $this->pdo = $connect->connect();
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user['email'] == $email) {
            return;
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO users(username,email,password,role) VALUES (?,?,?,?)");
            $stmt->execute([$userName, $email, $hashPassword, $role]);
        }
    }


    public function login($email, $password)
    {
        session_start();
        session_regenerate_id(true); 
        // $connect = new Database();
        // $this->pdo = $connect->connect();

        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("SELECT * FROM users where email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['userId'] = $user['userId'];
            $_SESSION['userName'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['status'] = $user['status'];
            $_SESSION['role'] = $user['role'];
            if ($_SESSION['role'] == "student") {

                var_dump($_SESSION['role']);
                header("Location: ./student/index.php");
            } else if ($_SESSION['role'] == "enseignant") {
                header("Location: ./enseignant/index.php");
            } else {
                header("Location: ./admin/dashboard.php");
            }
        } else {
            var_dump($user['userId']);
        }
    }


    public function getUsers()
    {

        // $connect = new Database();
        // $this->pdo = $connect->connect();

        // $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("SELECT * FROM users where role='enseignant' ");
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function switchActive($userId)
    {
        // $connect = new Database();
        // $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("UPDATE users SET status = CASE 
    WHEN status = 'pending' THEN 'active' ELSE 'pending' END WHERE userId = ?");

        return  $stmt->execute([$userId]);
    }
}

// $user=new User($userName,$email,$password,$role);
// $user->register()
