<?php
require_once 'session.php';
require_once 'database.php';

$s = $_POST['userinfo'];
$sql="SELECT * FROM employee WHERE username='$s'";

$db=new Database;
$conn=$db->connect();

$result=$conn->query($sql);

$eid=$result->fetch_array();

echo  $eid['employee_id'];

?>