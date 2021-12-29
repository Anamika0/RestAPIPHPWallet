<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Bond.php';

$database = new Database();
$db = $database->getConnection();

$bond = new Bond($db);

$bond->bondId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $bond->read();

if($result->num_rows > 0){
    $bondRecords=array();
    $bondRecords["bond"]=array();
	while ($bond = $result->fetch_assoc()) {
        extract($bond);
        $bondDetails=array(
            "bondId" => $bondId,
            "userId" => $userId,
			"bond_name" => $bond_name,
            "bond_amount" => $bond_amount,
            "bond_type" => $bond_type
        );

       array_push($bondRecords["bond"], $bondDetails);
    }
    http_response_code(200);
    echo json_encode($bondRecords);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No bond found.")
    );
}
?>