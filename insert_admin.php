<?php
require_once 'session.php';
require_once 'database.php';

$admin_name = $_POST['name'];
$admin_uname = $_POST['username'];
$admin_id = $_POST['admin_id'];
$password = $_POST['password'];

$db=new Database();
$conn=$db->connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (Name, username, password, employee_id) VALUES ('$admin_name', '$admin_uname', 
'$password', '$admin_id')";

$result=$conn->query($sql);

if($result){
    echo 'Admin is successfully registered';
 }
 else{
     echo 'Admin connection error';
 }
?>