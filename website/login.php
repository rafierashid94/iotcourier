<?php
    require_once 'database.php';
    require_once 'session.php';

    $username = $_POST["uname"];
    $password = $_POST["psw"];

    $response = array();

    $db   = new Database();
	$conn = $db->connect();
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Error > ".$conn->error;
        $db->disconnect($conn);
        return;
    }

    $sql = "SELECT * FROM user
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
        $response["msg"] = "Login successful";
        $response["id"] = $r['user_id'];
        $response["name"] = $r['Name'];
        header ("Location: selection_page.php");
    }else{
       $response["msg"] = "Login Error"; 
    }

    echo json_encode($response);

    //$db->disconnect($conn);
?>