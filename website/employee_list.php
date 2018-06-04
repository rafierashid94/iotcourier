<?php
require_once 'session.php';
require_once 'database.php';

//$s = $_SESSION['userinfo'];
$sql="SELECT * FROM employee";

$db=new Database;
$conn=$db->connect();

$result=$conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
<title>List of All Employee</title>
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
		  position: fixed;
					bottom: 10px;
					right: 10px;
		}

		.addparcel{
		position: fixed;
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
		<p><span>Employee List</span>
		<br>
		<form name="searchResultForm" action="" style="overflow-y:scroll; ">
			<table width="300" border="1" bgcolor="white">
				
				<tr>
					<th> Index </th>
                    <th> Username </th>
                    <th> Password </th> 
					<th> Employee Name</th>  
					<th> Employee ID </th>
					<th> Assigned Courier </th>
                    <th></th>
				</tr>
                <?php
                    $i=1;
                    while($row=$result->fetch_array()) {
				?>
							
				<tr>
                    <td> <?php echo $i;
                                    $i++; ?> </td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['password'];  ?></td>
					<td> <?php echo $row['EmpName']; ?> </td>
					<td> <?php echo $row['employee_id']; ?> </td>
					<td> <?php echo $row['Assignedcourier']; ?> </td>
				</tr>
				
				<?php }  ?>
			</table> 
		</form>
	</div>
	
	<div class="addparcel" method= "POST">
	<form name="addparcel" action="register_employee.php">
	<button class="button">
	Register New Employee
	</button>				
	</form>
	</div>
	
	<div class="undo" >
		<button type="submit" name="back">  
			<a href="selection_page.php"> <img src="img/back.png" width="100" height="71"> </a>
		</button>
	</div>

</body>
</html>