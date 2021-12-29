<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/insurance.php';
 
$database = new Database();
$db = $database->getConnection();

$insurance = new Insurance($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->insurance_amount) && 
!empty($data->insurance_type) && !empty($data->agent_name) && !empty($data->duration)){ 
	
	$insurance->insuranceId = $data->id; 
	$insurance->insurance_amount = $data->insurance_amount;
    $insurance->insurance_type = $data->insurance_type;
    $insurance->agent_name = $data->agent_name;
    $insurance->duration = $data->duration; 
	//print_r($insurance); exit;
	
	if($insurance->update()){     
		http_response_code(200);   
		echo json_encode(array("message" => "insurance was updated."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to update insurance."));
	}
	
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to update insurance. Data is incomplete."));
}
?>