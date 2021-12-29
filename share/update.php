<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../class/Share.php';

$database = new Database();
$db = $database->getConnection();

$share = new Share($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->userId) &&
!empty($data->share_name) && !empty($data->share_amount) &&
!empty($data->share_type)){

	$share->shareId = $data->id;
	$share->userId = $data->userId;
    $share->share_name = $data->share_name;
    $share->share_amount = $data->share_amount;
    $share->share_type = $data->share_type;

	if($share->update()){
		http_response_code(200);
		echo json_encode(array("message" => "Share was updated."));
	}else{
		http_response_code(503);
		echo json_encode(array("message" => "Unable to update share."));
	}

} else {
	http_response_code(400);
    echo json_encode(array("message" => "Unable to update share. Data is incomplete."));
}
?>