<?php
    require_once 'database.php';
    //require_once 'session.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $response = array();
    $response["success"] = false;

    $db   = new Database();
	$conn = $db->connect();
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Error > ".$conn->error;
        $db->disconnect($conn);
        return;
    }

    $sql = "SELECT `emp_id`,`EmpName`
            FROM employee
            WHERE `username`= '$username' AND `password`= '$password'";

    $result = $conn->query($sql);
    if($result){
        $r = $result->fetch_assoc();     
    }else{
        echo "Error > ".$conn->error;
        $db->disconnect($conn);
        return;
    }
    if($r){
        $response["success"] = true;
        $response["msg"] = "Login successful";
        $response["id"] = $r['emp_id'];
        $response["name"] = $r['EmpName'];
    }else{
       $response["msg"] = "Login Error"; 
    }

    echo json_encode($response);

    $db->disconnect($conn);
        ?>