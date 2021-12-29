<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/transaction.php';
 
$database = new Database();
$db = $database->getConnection();

$transaction = new Transaction($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->transaction_amount) && 
!empty($data->transaction_time) && !empty($data->from_account) && 
!empty($data->to_account)){ 
	
	$transaction->transactionId = $data->id; 
	$transaction->transaction_amount = $data->transaction_amount;
    $transaction->transaction_time = $data->transaction_time;
    $transaction->from_account = $data->from_account;
    $transaction->to_account = $data->to_account;	
    	
	if($transaction->update()){     
		http_response_code(200);   
		echo json_encode(array("message" => "transaction was updated."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to update transaction."));
	}
	
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to update transaction. Data is incomplete."));
}
?>