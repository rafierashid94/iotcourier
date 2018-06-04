<?php

require("config.php");

$query = "SELECT * FROM users";

try {
    $stmt = $db->prepare($query);
    $result = @$stmt->execute($query_params);
} catch (PDOException $ex) {
	
    $response["success"] = 0;
    $response["message"] = "Database Error";
}

$rows = $stmt->fetchAll();

if ($rows){

    $response["success"] = 1;
    $response["message"] = "Users Available";
	

    $response["users"] = array();
    

    foreach ($rows as $row){
	
        $single_user = array();
		
        $single_user["id"] = $row["user_id"];
        $single_user["username"] = $row["user_username"];
        $single_user["displayname"] = $row["user_displayname"];
 
		array_push($response["users"], $single_user);
    }
    
   
    echo json_encode($response);
}else{
	
    $response["success"] = 0;
    $response["message"] = "No Users Available";
	

    die(json_encode($response));
}
?>