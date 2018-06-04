<?php
require_once 'database.php';

$emp_uname = $_POST['username'];
$emp_name = $_POST['name'];
$emp_id = $_POST['emplo_id'];
$password = $_POST['password'];

$db=new Database();
$conn=$db->connect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO employee (username, password, EmpName, employee_id) VALUES ('$emp_uname', '$password', 
'$emp_name', '$emp_id')";

$result=$conn->query($sql);

if($result){
    echo 'Employee is successfully registered';
 }
 else{
     echo 'Employee connection error';
 }
?>