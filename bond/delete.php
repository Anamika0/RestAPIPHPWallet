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

if(!empty($data->id)) {
	$bond->bondId = $data->id;
	if($bond->delete()){
		http_response_code(200);
		echo json_encode(array("message" => "Bond was deleted."));
	} else {
		http_response_code(503);
		echo json_encode(array("message" => "Unable to delete bond."));
	}
} else {
	http_response_code(400);
    echo json_encode(array("message" => "Unable to delete bond. Data is incomplete."));
}
?>