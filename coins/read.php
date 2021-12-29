<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Coins.php';

$database = new Database();
$db = $database->getConnection();
 
$Coins = new Coins($db);

$Coins->walletId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $Coins->read();

if($result->num_rows > 0){    
    $values=array();
    $values["Coins"]=array(); 
	while ($Coins = $result->fetch_assoc()) { 	
        extract($Coins); 
        $records=array(
            "walletId" => $walletId,
            "coin_value" => $Coins	
        ); 
        
       array_push($values["Coins"], $records);
    }    
    http_response_code(200);     
    echo json_encode($values);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No Values found.")
    );
} 