<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/transaction.php';

$database = new Database();
$db = $database->getConnection();
 
$transaction = new Transaction($db);

$transaction->transactionId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $transaction->read();

if($result->num_rows > 0){    
    $transactionRecords=array();
    $transactionRecords["transaction"]=array(); 
	while ($transaction = $result->fetch_assoc()) { 	
        extract($transaction); 
        $transactionDetails=array(
            "transactionId" => $transactionId,
            "transaction_amount" => $transaction_amount,
            "transaction_time" => $transaction_time,
			"from_account" => $from_account,
            "to_account" => $to_account	
        ); 
        
       array_push($transactionRecords["transaction"], $transactionDetails);
    }    
    http_response_code(200);     
    echo json_encode($transactionRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No transaction found.")
    );
} 