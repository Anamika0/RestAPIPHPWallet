<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/loan.php';

$database = new Database();
$db = $database->getConnection();
 
$loan = new Loan($db);

$loan->loanId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $loan->read();

if($result->num_rows > 0){    
    $loanRecords=array();
    $loanRecords["loan"]=array(); 
	while ($loan = $result->fetch_assoc()) { 	
        extract($loan); 
        $loanDetails=array(
            "loanId" => $loanId,
            "loan_amount" => $loan_amount,
            "loan_type" => $loan_type,
			"agent_name" => $agent_name,
            "rate_of_Interest" => $rate_of_Interest,            
			"duration" => $duration			
        ); 
        
       array_push($loanRecords["loan"], $loanDetails);
    }    
    http_response_code(200);     
    echo json_encode($loanRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No Loan found.")
    );
} 