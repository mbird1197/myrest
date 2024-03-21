<?php
// Set CORS headers
header("Access-Control-Allow-Origin: *");  // Adjust this to a specific domain if needed
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  // Add other methods as needed
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");  // Add other headers as needed

// Respond to preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Exit early so the "actual" request is not made as a preflight request
    exit(0);
}
/*header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
        exit();
    }
    */