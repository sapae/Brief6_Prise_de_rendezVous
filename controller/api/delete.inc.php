<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
  
    include_once '../config/database.php';
    include_once '../../Model/client.inc.php';

    $database = new Database();
    $db = $database->getConnection();

    $client = new client($db);

    $data = json_decode(file_get_contents("php://input"));
    
    $client->user_id = $data->user_id;
    
    if($client->deleteUser()){
        echo json_encode("Client deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
?>