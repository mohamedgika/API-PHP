<?php

require "database/user.php";
// header('Content-Type: application/json; charset=utf-8'); // To Convert JSON Auto



// $url = $_SERVER['QUERY_STRING'];
// $url = explode("/",$url); // Array [0]==>"ROOT"  [1]==>"PART TWO FROM URL"

// if(isset($url[1])){

// if($url[1]=="insert")
// {
//     $data = file_get_contents('php://input');
//     $arraydata = json_decode($data);

//     $user = new user();
//     $user = $user->insert($arraydata->name , $arraydata->email ,$arraydata->phone);

//     if($user == true ){
//        echo json_encode(['Success'=>'Inserted Data']);
//     }else{
//         echo json_encode(['Error'=>'Not Inserted Data']);
//     }
// }
// else if($url[1]=="delete")
// {
//     $data = file_get_contents('php://input');
//     $arraydata = json_decode($data);

//     $user = new user();
//     $user = $user->delete($arraydata->id);

//     if($user == true ){
//        echo json_encode(['Success'=>'Deleted Data']);
//     }else{
//         echo json_encode(['Error'=>'Not Deleted Data']);
//     }
// }
// else if($url[1]=="update")
// {
//     $data = file_get_contents('php://input');
//     $arraydata = json_decode($data);

//     $user = new user();
//     $user = $user->update($arraydata->name , $arraydata->email ,$arraydata->phone ,$arraydata->id);

//     if($user == true ){
//        echo json_encode(['Success'=>'Updated Data']);
//     }else{
//         echo json_encode(['Error'=>'Not Updated Data']);
//     }
// }
// }
// else
// {
//     $user = new user();
//     $data = $user ->select();
//     $data = json_encode($data);
//     echo $data;
// }



// Take API By Curl

$ch = curl_init();  // intial Curl

curl_setopt($ch,CURLOPT_URL,"https://jsonplaceholder.typicode.com/users");  //URL API

// curl_setopt($ch,CURLOPT_POST,1); // Post

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); // True Option CURLOPT_RETURNTRANSFER

$server_output = curl_exec($ch); // Execute Curl

curl_close($ch);  //End This Curl

$data = json_decode($server_output,true);

$newdata = [];
$user = new user();
foreach($data as $key => $value ){
    
    $newdata[$key]['id'] = $value['id'];
    $newdata[$key]['name'] = $value['name'];
    $newdata[$key]['username'] = $value['username'];
    $newdata[$key]['email'] = $value['email']; 

    $newdata[$key]['address_city'] = $value['address']['city'];
    $newdata[$key]['address_street'] = $value['address']['street'];

    $user->insert($newdata[$key]['name'],$newdata[$key]['username'],$newdata[$key]['email'],$newdata[$key]['address_city'],$newdata[$key]['address_street']);

}

// echo "<pre>";
// print_r($newdata);










?>