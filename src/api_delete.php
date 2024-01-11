<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$stdid = $data['stdid'];

include 'condb.php';

$sql = "DELETE FROM student WHERE stdid ='$stdid' ";

if(mysqli_query($conn, $sql)){
    echo json_encode(['msg'=> 'Data Delete Successfully! ','status'=>true]);
}else{
    echo json_encode(['msg'=> 'Data Failed to be Deleted! ','status'=>false]);
}
?>