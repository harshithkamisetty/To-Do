<?php
class Read_tasks{

   private $conn;
   private $table = 'task';

   public $tid;
   public $tname;
   public $description;

   public function __construct($db) {
      $this->conn = $db;
   }
   public function read()
   {
      $query = "select * from task";
      $stmt = $this->conn->prepare($query);

      $stmt->execute();
      return $stmt;
   }
   public function create() {
      // Create query
      $query = 'INSERT INTO ' .$this->table.'(tname,description) values(?,?)';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      print($query);
     // Bind data
      $stmt->bind_Param( 'ss',$this->tname, $this->description);
      //$stmt->bindParam(':description', $this->description);
     
      // Execute query
      if($stmt->execute()) {
        return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}
public function update() {
   // Create query
   $query = 'UPDATE ' . $this->table . '
                         SET tname = ?, description = ?
                         WHERE tid = ?';

   // Prepare statement
   $stmt = $this->conn->prepare($query);



   // Bind data
   $stmt->bind_Param('ssi', $this->tname,$this->description,$this->tid);
  

   // Execute query
   if($stmt->execute()) {
     return true;
   }

   // Print error if something goes wrong
   printf("Error: %s.\n", $stmt->error);

   return false;
}
public function delete() {
   // Create query
   $query = 'DELETE FROM ' . $this->table . ' WHERE tid = ?';

   // Prepare statement
   $stmt = $this->conn->prepare($query);


   // Bind data
   $stmt->bind_Param('i', $this->id);

   // Execute query
   if($stmt->execute()) {
      $query='insert into deleted_task select * from task where tid = ?';
      $stmt = $this->conn->prepare($query);
      $stmt->bind_Param('i', $this->id);
      if($stmt->execute()) 
         return true;
   }

   // Print error if something goes wrong
   printf("Error: %s.\n", $stmt->error);

   return false;
}
public function completed() {
   // Create query
   $query = 'DELETE FROM ' . $this->table . ' WHERE tid = ?';

   // Prepare statement
   $stmt = $this->conn->prepare($query);


   // Bind data
   $stmt->bind_Param('i', $this->id);

   // Execute query
   if($stmt->execute()) {
      $query='insert into completed_task select * from task where tid = ?';
      $stmt = $this->conn->prepare($query);
      $stmt->bind_Param('i', $this->id);
      if($stmt->execute()) 
         return true;
   }

   // Print error if something goes wrong
   printf("Error: %s.\n", $stmt->error);

   return false;
}

}