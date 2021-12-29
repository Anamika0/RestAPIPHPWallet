<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/Wallet.php';
include_once '../class/User.php';

 
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'rhdmzyzf');


$data = json_decode(file_get_contents("php://input"), true);

$id= $data['userId'];


		$sql= "SELECT agent FROM user WHERE userId={$id}";
		$result=mysqli_fetch_assoc(mysqli_query($con,$sql));
		$var= json_encode(array($result));
	
		if($result['agent']=='yes'){
			echo json_encode(array("Can accept/reject Loan and Insurance requests"));
		}
		else if($result['agent']=="no") {
			echo json_encode(array("message" => "Can only apply for Loan/Insurance"));
		}
		else{
		json_encode(array("message" => "Unable to find user."));
		}
			


?>