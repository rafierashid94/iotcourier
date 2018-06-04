<?php
require_once 'database.php';

$sql = "SELECT * FROM parcel";

$db   = new Database();
$conn = $db->connect();

$result = $conn->query($sql);

$response=array();

while($row=$result->fetch_array()){

    array_push($response,array("track_no"=>$row[1],"parcel_name"=>$row[2],"phone"=>$row[3],"Address"=>$row[4]));
}

echo json_encode(array("server_response"=>$response));


?>