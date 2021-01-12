<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Read_tasks.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $Read_tasks = new Read_tasks($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $Read_tasks->tid = $data->tid;

  // Delete post
  if($Read_tasks->delete()) {
    echo json_encode(
      array('message' => 'Post Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Deleted')
    );
  }