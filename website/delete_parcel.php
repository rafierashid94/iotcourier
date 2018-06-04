<?php
require_once 'database.php';

$parcelid=$_GET['cid'];

$sql = "DELETE FROM parcel WHERE cid= '$parcelid'";

$db= new Database;
$conn=$db->connect();

$result = $conn->query($sql);

if($result){
    echo 'Parcel is deleted successfully';
}else{
    echo 'connection error';
}

?>