<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/Database.php';
include_once '../class/Wallet.php';
include_once '../class/User.php';
include_once '../class/transaction.php';
$database = new Database();
$db = $database->getConnection();
 
$transaction = new Transaction($db);
$wallet= new Wallet($db);
 
$user = new User($db);
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'rhdmzyzf');

$data = json_decode(file_get_contents("php://input"));


if(!empty($data->from) && !empty($data->to) &&!empty($data->coins) ){    
    
   
    if($transaction->walletTx()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Wallet Transaction updated"));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to update wallet transaction"));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to transact. Data is incomplete."));

}
if($wallet->update_coins()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Coins updated"));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to update Coins"));
    }
  





$walletid1=$data->from;
$walletid2=$data->to;
		//$sql= "UPDATE users u, wallet w SET u.Wallet_balance = w.coins WHERE w.userId = u.userId AND w.walletId={$id}";


         if((mysqli_query($con,"UPDATE user u, wallet w SET Wallet_balance = coin WHERE w.userId= u.userId AND w.walletId='{$walletid1}'")) && 
		 (mysqli_query($con,"UPDATE user u, wallet w SET Wallet_balance = coin WHERE w.userId= u.userId AND w.walletId='{$walletid2}'")))
     	{ echo json_encode(array("message" => "balance was updated."));
	}
         else{  
         echo json_encode(array("message" => "Unable to update balance."));
	}

?>