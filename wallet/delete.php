<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/Wallet.php';
 
$database = new Database();
$db = $database->getConnection();
 
$wallet = new Wallet($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->walletId)) {
	$wallet->walletId = $data->walletId;
	if($wallet->delete()){    
		http_response_code(200); 
		echo json_encode(array("message" => "wallet was deleted."));
	} else {    
		http_response_code(503);   
		echo json_encode(array("message" => "Unable to delete wallet."));
	}
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to delete wallet. Data is incomplete."));
}
?>