<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Read_tasks.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();


  $Read_tasks = new Read_tasks($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $Read_tasks->tname = $data->tname;
  $Read_tasks->description = $data->description;
  
  // Create post
  if($Read_tasks->create()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Created')
    );
  }