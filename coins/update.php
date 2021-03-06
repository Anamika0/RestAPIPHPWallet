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
$coins = new Coins($db);

$data = json_decode(file_get_contents("php://input"), true);


if($coins->update()){
	
	echo json_encode(array("message" => "coins was updated."));
}
else{  
echo json_encode(array("message" => "Unable to update coins."));
	}
	
	
?>