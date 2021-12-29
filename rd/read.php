<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Rd.php';

$database = new Database();
$db = $database->getConnection();

$rd = new Rd($db);

$rd->rdId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $rd->read();

if($result->num_rows > 0){
    $rdRecords=array();
    $rdRecords["rd"]=array();
	while ($rd = $result->fetch_assoc()) {
        extract($rd);
        $rdDetails=array(
            "rdId" => $rdId,
            "userId" => $userId,
            "rd_amount" => $rd_amount,
            "rd_type" => $rd_type,
            "rate_of_Interest" => $rate_of_Interest,
			"duration" => $duration
        );

       array_push($rdRecords["rd"], $rdDetails);
    }
    http_response_code(200);
    echo json_encode($rdRecords);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No RD found.")
    );
}