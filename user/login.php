<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new user($db);

$data = json_decode(file_get_contents("php://input"));

$result = $user->login($data->email,md5($data->password));

if($result->num_rows > 0){
    $userRecords=array();
    $userRecords["user"]=array();
	while ($user = $result->fetch_assoc()) {
        extract($user);
        $userDetails=array(
            "userId" => $userId,
            "name" => $name,
            "email" => $email
        );

       array_push($userRecords["user"], $userDetails);
    }
    http_response_code(200);
    echo json_encode(array("message" => "Login successfully."));
    echo json_encode($userRecords);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Incorrect username or password.")
    );
}