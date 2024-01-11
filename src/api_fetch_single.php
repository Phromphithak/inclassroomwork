<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

$stdid = $data['stdid'];

include 'condb.php';

$sql = "SELECT * FROM student WHERE stdid = $stdid";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
}else{
    echo json_encode(['msg'=> 'No Data ','status'=>false]);
}
?>