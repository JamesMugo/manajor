<?php
 
// get database connection
include_once '../../classes/database.php';
 
// instantiate user object
include_once '../../classes/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// set user property values
$user->firstname = $_POST['firstname'];
$user->lastname = $_POST['lastname'];
$user->password = base64_encode($_POST['password']);
$user->email = $_POST['email'];
 
// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "User registered successfully!",
        "staffID" => $user->staffID,
        "email" => $user->email
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "email already exists!"
    );
}
print_r(json_encode($user_arr));
?>