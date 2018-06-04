<?php
require_once 'database.php';

$sql = "SELECT * FROM employee";

$db = new Database;
$conn=$db->connect();

$result=$conn->query($sql);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Add User</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
    
	<script type="text/javascript">
		function validateForm() {
			var a = document.forms['addForm']['track'].value;
			var b = document.forms['addForm']['receive'].value;
			var c = document.forms['addForm']['phone_no'].value;
			var d = document.forms['addForm']['c_status'].value;
			var e = document.forms['addForm']['category'].value;
    		
			if ((a==null || a=="") || (b==null || b=="") || (c==null || c=="") || (e==null || e=="")) {
        			alert("Tracking Number, Receiver Name, Phone Number, Status and Employee must be filled out!");
        			return false;
    			}
		}
	</script>
</head>

<body >
	<div>
		<div class="exit">
			<form name="form" method="POST" action="index.html">
				<button type="submit" name="logout" value="Logout"> <img src="img/logout.jpg" width="71" height="71"> </button>
			</form>
		</div>
		
		<div class="undo">
			<button type="submit" name="back">  
				<a href="selection_page.php"> <img src="img/back.png" width="71" height="71"> </a>
			</button>
		</div>
	</div>

	<div id="element" align="center"><span><br><br>Add Parcel</span> 
	<br> <br>
		
		<p> <form id="addForm" name="addForm" method="POST" onsubmit="return validateForm()" action="insert_parcel.php">
			<table border="0" >
			  <tr>
				<td>Assign Tracking Number:</td>
				<td><input type="text" name="track" size="30"></td>
			  </tr>
			  <tr>
				<td>Receiver Name:</td>
				<td><input type="text" name="receive" size="30"></td>
			  </tr>
			  <tr>
			  	<tr>
				<td>Phone No.:</td>
				<td><input type="text" name="phone_no" size="30"></td>
			  </tr>
			  <tr>
			  	<td> Delivery Address: </td>
				 <td> <input type="text" name="address" size="30"> </td> 
			  </tr>
			   <tr>
				<td>Courier Status:</td>
				<td><input type="text" name="c_status" size="30"></td>
			  </tr>
			  <tr>
				<td>Employee:</td>
				<td>
					<select id="employee" name="employee">
                    <?php
                    if($result){
                    while($row=$result->fetch_assoc()){
                     ?>
                    <option value="<?php echo $row['EmpName']; ?>"> <?php echo $row['EmpName']; ?> </option>
                    <?php
                    } }
                    else{
                        echo "Error > ".$conn->error;
                        $db->disconnect($conn);
                        return;
                    }
                    ?>
					</select>
					<!-- <input type="text" name="category" size="30"> -->
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td align="right"> <button type="submit" style="outline:hidden" class="icon-arrow-right"> Add New Parcel </button> </td>
			  </tr>
			</table> 
		</form>
	</div>
    
</body>

</html>




<?php


?>