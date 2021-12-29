<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Bond.php';

$database = new Database();
$db = $database->getConnection();

$bond = new Bond($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->userId) && !empty($data->bond_name) &&
!empty($data->bond_amount) && !empty($data->bond_type)){

    $bond->userId = $data->userId;
    $bond->bond_name = $data->bond_name;
    $bond->bond_amount = $data->bond_amount;
    $bond->bond_type = $data->bond_type;

    if($bond->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Bond was created."));
    } else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create bond."));
    }
}else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create bond. Data is incomplete."));
}
?>