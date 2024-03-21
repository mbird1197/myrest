<?php
 /* // Set CORS headers
header("Access-Control-Allow-Origin: *");  // Adjust this to a specific domain if needed
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  // Add other methods as needed
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");  // Add other headers as needed
    header('Access-Control-Max-Age: 86400');
// Respond to preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Exit early so the "actual" request is not made as a preflight request
    exit(0);
}
    // cache for 1 day


// Access-Control headers are received during OPTIONS requests


  header('Content-Type: application/json');
*/
  include_once '../../config/Database.php';
  include_once '../../models/Author.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Author($db);

  // Blog post query
  $result = $post->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        
        'author' => $author,
        
        
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
     // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
   // echo json_encode($posts_arr);
   print_r(json_encode($post_arr));
  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }