<?php
    require_once 'database.php';
    //require_once 'session.php';

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

    $sql = "SELECT * FROM employee
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
        $sql1="SELECT EmpName FROM employee WHERE username='$username'" ;

        $result1=$conn->query($sql1);
        $eid=$result1->fetch_array();

        $sql2="SELECT * FROM parcel WHERE EmpName= '{$eid['EmpName']}'";
        $result2=$conn->query($sql2);
        ?>
<!DOCTYPE html>
<html>
<head>
<title>List of All Parcel</title>
<style type="text/css">
		body {
		  background:url(img/frontcover.jpg) ;
		  background-size: cover;
		  background-position: top center !important;
		background-repeat: no-repeat !important;
		background-attachment: fixed; 
		}

		div.element {
			height: 15em;
			position: relative }
		div.element p {
			margin: 0;
			background: ;
			position: absolute;
			top: 08%;
			left: 25%;
			margin-right: -50%;
			/*transform: translate(-50%, -50%)*/ }
		 div {
				 
					font-family:"Agency FB", cursive;
					font-size:25px;
				}

		  span{
			   font-size:50px;
		  }

			table {
				position: absolute;
				top: 25%;
				left: 20%;
				margin-right: -50%;
			}

			.exit {
		  width: 71px ;
		  margin: 71px auto;
		}

			.undo {
					bottom: 10px;
					right: 10px;
		}

		.addparcel{
		position: sticky;
		bottom: 40px;
		left:300px;

		}

		.button{
		background-color: #4CAF50;
    	border: none;
    	color: white;
    	padding: 15px 25px;
    	text-align: center;
    	font-size: 16px;
    	cursor: pointer; }

		.button:hover{
		background-color: green;
		}
	</style>
</head>

<body>
<div class="exit" style="margin-right:20px; margin-top:15px">
		<form name="form" method="POST" action="index.html">
			<button type="submit" name="logout" value="Logout"> <img src="img/logout.jpg" width="80" height="50"> </button>
		</form>
	</div>

	<div class="element" align = "center">
		<p><span>Parcel List</span>
		<br>
		<form name="searchResultForm" action="" style="overflow-y:scroll; ">
			<table width="300" border="1" bgcolor="white">
				
				<tr>
					<th> Index </th> 
					<th> Tracking Number </th>  
					<th> Receiver Name </th>
					<th> Contact Number </th>
					<th> Delivery Address</th>
                    <th></th>
					<th></th>

				</tr>
                <?php
                    $i=1;
                    while($row2=$result2->fetch_array()) {
				?>
							
				<tr>
                    <td> <?php echo $i;
                                    $i++; ?> </td>
					<td> <?php echo $row2['track_no']; ?> </td>
					<td> <?php echo $row2['parcel_name']; ?> </td>
					<td> <?php echo $row2['phone']; ?> </td>
					<td> <?php echo $row2['Address']; ?> </td>
				</tr>
				
				<?php }  ?>
			</table> 
		</form>
	</div>
	
	


</body>
</html>
<?php
    }

   // echo json_encode($response);

    //$db->disconnect($conn);
?>