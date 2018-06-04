<?php
require_once 'database.php';

$tracknum=$_POST['track'];
$postname=$_POST['receive'];
$phonenum=$_POST['phone_no'];
$post_addr=$_POST['address'];
$post_status=$_POST['c_status'];
$emp_name=$_POST['employee'];

$sql=" INSERT INTO parcel (track_no, parcel_name, phone, Address, courier_status, EmpName)
VALUES ('$tracknum', '$postname', '$phonenum', '$post_addr', '$post_status', '$emp_name')";


$db=new Database;
$conn=$db->connect();

$result=$conn->query($sql);

if($result){
    echo 'Parcel is added successfully';

    $sql1 ="INSERT INTO employee (Assigned courier) SELECT track_no 
    FROM parcel
    WHERE emp_assigned = '$emp_name'";

    $db=new Database;
    $conn=$db->connect();

    $result1=$conn->query($sql1);

 if($result1){
     echo 'Employee is updated successfully';
 }
 else{
     echo 'Employee connection error';
 }

    
}else{
    echo ' Double connection error';
}
?>