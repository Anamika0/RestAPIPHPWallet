<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Deposit.php';

$database = new Database();
$db = $database->getConnection();

$deposit = new Deposit($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->userId) &&
!empty($data->deposit_amount) && !empty($data->deposit_type) &&
!empty($data->rate_of_Interest) && !empty($data->duration)){

	$deposit->depositId = $data->id;
	$deposit->userId = $data->userId;
	$deposit->deposit_amount = $data->deposit_amount;
    $deposit->deposit_type = $data->deposit_type;
    $deposit->rate_of_Interest = $data->rate_of_Interest;
    $deposit->duration = $data->duration;

	if($deposit->update()){
		http_response_code(200);
		echo json_encode(array("message" => "Deposit was updated."));
	}else{
		http_response_code(503);
		echo json_encode(array("message" => "Unable to update deposit."));
	}

} else {
	http_response_code(400);
    echo json_encode(array("message" => "Unable to update deposit. Data is incomplete."));
}
?>