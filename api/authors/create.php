<?php



  include_once '../../config/Database.php';
  include_once '../../models/Author.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Author($db);


  //Get raw posted data

  $data = json_decode(file_get_contents("php://input"));

 



  $post->author = $data->author;

  

  if($post->create()){

    echo json_encode(
        array('message' => 'Author Created')
    );
    }
    else{

        echo json_encode(
            array('message' => "Author Not Created")
        );

    }


  