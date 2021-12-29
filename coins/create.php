<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/Database.php';
include_once '../class/Coins.php';
 
$database = new Database();
$db = $database->getConnection();
 
$coin = new Coins($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->walletId) && !empty($data->coin_value) ){    
    
    $coin->walletId = $data->walletId;
    $coin->coin_value = $data->coin_value;
    if($coin->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Row was created."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create row."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create row. Data is incomplete."));
}
?>