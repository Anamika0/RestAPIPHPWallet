<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Coins.php';

$database = new Database();
$db = $database->getConnection();
 
$Coins = new Coins($db);

$Coins->walletId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $Coins->viewAll();

if($result->num_rows > 0) {
while ($row =  $result->fetch_assoc()) {
       $_ResultSet[] = $row;
    }
       echo json_encode($_ResultSet); 
}
    
    echo json_encode(
        array("message" => "No Values found.")
    );
