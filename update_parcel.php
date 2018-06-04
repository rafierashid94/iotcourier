<?php
require_once 'database.php';

$cid = $_POST['parcelid'];
$trackno = $_POST['track_no'];
$nameparcel = $_POST['parcel_name'];
$phoneno = $_POST['phone'];
$post_addr=$_POST['address'];
$status = $_POST['courier_status'];
$employee = $_POST['Employee'];

$response = array();

$sql = "UPDATE parcel SET track_no = '$trackno' , parcel_name = '$nameparcel',
phone = '$phoneno', courier_status = '$status', EmpName = '$employee',
Address= '$post_addr'
WHERE cid = '$cid'";

$db=new Database;
$conn = $db->connect();

$result = $conn->query($sql);

if($result){
echo 'Parcel successfully updated';

$sql1 = "UPDATE employee SET Assigned courier='$trackno'
WHERE EmpName = '$employee'";

$result1=$conn->query($sql1);


}else{
echo 'Connection error';
}

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    margin-bottom: 25px;
}


.button:hover {
    background-color: green;
}
</style>
</head>
<body>
<form name="parcel_list" method="POST" action ="parcel_list.php">
<button class="button" onclick="track_courier.php">Back to Parcel List</button><br>
</form>

</body>
</html>