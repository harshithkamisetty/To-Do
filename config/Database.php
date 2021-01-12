<?php
class Database{
   private $host = "localhost";
   private $db_name = "internship";
   private $username="root";
   private $password ="";
   private $conn;
//Db connect
public function connect()
{
   $this->conn = null;
   $this->conn =mysqli_connect($this->host, $this->username, $this->password, $this->db_name);


 return $this->conn;
}
}