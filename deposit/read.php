<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Deposit.php';

$database = new Database();
$db = $database->getConnection();

$deposit = new Deposit($db);

$deposit->depositId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $deposit->read();

if($result->num_rows > 0){
    $depositRecords=array();
    $depositRecords["deposit"]=array();
	while ($deposit = $result->fetch_assoc()) {
        extract($deposit);
        $depositDetails=array(
            "depositId" => $depositId,
            "userId" => $userId,
            "deposit_amount" => $deposit_amount,
            "deposit_type" => $deposit_type,
            "rate_of_Interest" => $rate_of_Interest,
			"duration" => $duration
        );

       array_push($depositRecords["deposit"], $depositDetails);
    }
    http_response_code(200);
    echo json_encode($depositRecords);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No deposit found.")
    );
}