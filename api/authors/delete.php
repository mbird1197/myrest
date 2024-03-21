<?php
 /*// Set CORS headers
header("Access-Control-Allow-Origin: *");  // Adjust this to a specific domain if needed
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");  // Add other methods as needed
  // Add other headers as needed
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 header('Content-Type: application/json');
 
// Respond to preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Exit early so the "actual" request is not made as a preflight request
    exit(0);
}
 

 */

  include_once '../../config/Database.php';
  include_once '../../models/Author.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Author($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $post->id = $data->id;

  // Delete post
  if($post->delete()) {
    echo json_encode(
      array('message' => 'Post Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Deleted')
    );
  }