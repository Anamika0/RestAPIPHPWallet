<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Share.php';

$database = new Database();
$db = $database->getConnection();

$share = new Share($db);

$share->shareId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $share->read();

if($result->num_rows > 0){
    $shareRecords=array();
    $shareRecords["share"]=array();
	while ($share = $result->fetch_assoc()) {
        extract($share);
        $shareDetails=array(
            "shareId" => $shareId,
            "userId" => $userId,
			"share_name" => $share_name,
            "share_amount" => $share_amount,
            "share_type" => $share_type
        );

       array_push($shareRecords["share"], $shareDetails);
    }
    http_response_code(200);
    echo json_encode($shareRecords);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No share found.")
    );
}
?>