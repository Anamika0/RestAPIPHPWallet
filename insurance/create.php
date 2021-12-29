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

//print_r($data);exit;
if(!empty($data->insurance_amount) && !empty($data->insurance_type) &&
!empty($data->agent_name) && !empty($data->duration)){    
    
    $insurance->insurance_amount = $data->insurance_amount;
    $insurance->insurance_type = $data->insurance_type;
    $insurance->agent_name = $data->agent_name;
    $insurance->duration = $data->duration; 
    //var_dump($insurance); exit;
    if($insurance->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "insurance was created."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create insurance."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create insurance. Data is incomplete."));
}
?>