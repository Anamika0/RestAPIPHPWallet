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

$id= $data['walletId'];


		//$sql= "UPDATE users u, wallet w SET u.Wallet_balance = w.coins WHERE w.userId = u.userId AND w.walletId={$id}";


         if(mysqli_query($con,"UPDATE user u, wallet w SET Wallet_balance = coin WHERE w.userId= u.userId AND w.walletId={$id}"))
     	{ echo json_encode(array("message" => "balance was updated."));
	}
         else{  
         echo json_encode(array("message" => "Unable to update balance."));
	}
	


/*if($user->update()){
	
	echo json_encode(array("message" => "balance was updated."));
}
else{  
echo json_encode(array("message" => "Unable to update balance."));
	}*/
?>