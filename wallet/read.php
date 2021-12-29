<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Wallet.php';

$database = new Database();
$db = $database->getConnection();
 
$Wallet = new Wallet($db);

$Wallet->walletId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $Wallet->read();

if($result->num_rows > 0){    
    $walletRecords=array();
    $walletRecords["Wallet"]=array(); 
	while ($Wallet = $result->fetch_assoc()) { 	
        extract($Wallet); 
        $walletDetails=array(
            "walletId" => $walletId,
            "userId" => $userId,
            "coin" => $coin	
        ); 
        
       array_push($walletRecords["Wallet"], $walletDetails);
    }    
    http_response_code(200);     
    echo json_encode($walletRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No Wallet found.")
    );
} 