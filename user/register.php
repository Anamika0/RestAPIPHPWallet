<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new user($db);
 
$data = json_decode(file_get_contents("php://input"));


if(!empty($data->email) && !empty($data->name) && !empty($data->phone_num) && !empty($data->password) && !empty($data->occupation) && !empty($data->adhar_number) && !empty($data->annual_Income) &&
!empty($data->agent) && !empty($data->dob) && !empty($data->address)){ 

    $user->email = $data->email;
    $user->name = $data->name;
    $user->phone_num = $data->phone_num;
    $user->password = md5($data->password);	
    $user->occupation = $data->occupation; 
    $user->adhar_number = $data->adhar_number; 
    $user->annual_Income = $data->annual_Income; 
    $user->agent = $data->agent; 
    $user->dob = $data->dob; 
    $user->address = $data->address;

    $result = $user->checkEmail($data->email);

    if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(503);        
        echo json_encode(array("message" => "Invalid email format."));

    }elseif($result->num_rows > 0){

        http_response_code(503);        
            echo json_encode(array("message" => "Email already exist."));

    }else{
    
        //var_dump($user); exit;
        if($user->register()){         
            http_response_code(201);         
            echo json_encode(array("message" => "Register created successfully."));
        } else{         
            http_response_code(503);        
            echo json_encode(array("message" => "Unable to create user."));
        }
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}
?>