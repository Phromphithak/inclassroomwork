<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$stdid = $data['stdid'];
$stdname = $data['stdname'];
$email = $data['email'];
$stdclass = $data['stdclass'];
$stdsubject = $data['stdsubject'];
$telephone = $data['telephone'];

include 'condb.php';

$sql = "INSERT INTO student(stdid,stdname,email,stdclass,stdsubject,telephone) value ('$stdid','$stdname','$email','$stdclass','$stdsubject','$telephone')";

if(mysqli_query($conn, $sql)){
    echo json_encode(['msg'=> 'Data Insert Successfully! ','status'=>true]);
}else{
    echo json_encode(['msg'=> 'Data Failed to be inserted! ','status'=>false]);
}
?>