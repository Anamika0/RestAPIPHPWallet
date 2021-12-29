<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Rd.php';

$database = new Database();
$db = $database->getConnection();

$rd = new Rd($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->userId) && !empty($data->rd_amount) &&
!empty($data->rd_type) && !empty($data->rate_of_Interest) &&
!empty($data->duration)){

    $rd->userId = $data->userId;
    $rd->rd_amount = $data->rd_amount;
    $rd->rd_type = $data->rd_type;
    $rd->rate_of_Interest = $data->rate_of_Interest;
    $rd->duration = $data->duration;

    if($rd->create()){
        http_response_code(201);
        echo json_encode(array("message" => "RD was created."));
    } else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create rd."));
    }
}else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create rd. Data is incomplete."));
}
?>