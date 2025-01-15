<?php 
class Database{
private $userHost='root';
private $serverHost='localhost';
private $password='';
private $db='youdemy';
private  $conn;
public function connect(){
if($this->conn) {
    return $this->conn;
    
    
} else  {
    //throw $th;
    $dsn="mysql:host=".$this->serverHost.";dbname=".$this->db;
    $connect=$this->conn=new PDO($dsn,$this->userHost,$this->password);
    return $connect; 
}

}
}


?>