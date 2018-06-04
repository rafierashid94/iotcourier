<?php
require_once 'database.php';

$parcelid=$_GET['cid'];

$sql="SELECT * FROM parcel WHERE cid = '$parcelid'";
$sql1="SELECT * FROM employee";


$db= new Database;
$conn=$db->connect();

$result= $conn->query($sql);
$result1= $conn->query($sql1);


$row=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">

.undo{
  position: fixed;
					bottom: 10px;
					right: 10px;
}

</style>
</head>
<body>

<h2>Update Parcel Info</h2>

<form action="update_parcel.php" method="post">
  Courier ID:<br>
  <input type="text" name="parcelid" value="<?php echo $row['cid']; ?>"> <br>
  Tracking Number: <br>
  <input type="text" name="track_no" value="<?php echo $row['track_no'];?>"> <br>
  Receiver Name:<br>
  <input type="text" name="parcel_name" value="<?php echo $row['parcel_name'] ;  ?>">
  <br>
  Phone:<br>
  <input type="text" name="phone" value="<?php echo $row['phone'];   ?>"><br>
  Delivery Address:<br>
  <textarea type="text" name="address" rows="2" value=""><?php echo $row['Address']; ?></textarea>
  <br>Courier Status<br>
  <input type="text" name="courier_status" value="<?php echo $row['courier_status'];  ?>"> <br>
  Employee Assigned: <br>
  <select name="Employee" id="Employee">
      <?php
      if($result1){
        while($row1=$result1->fetch_assoc()){
      ?>
  <option value="<?php echo $row1['EmpName']; ?>"> <?php echo $row1['EmpName'];} ?> </option>
      <?php  
      } else {
        echo "Error > ".$conn->error;
        $db->disconnect($conn);
        return;
      } ?>
  </select><br>
  <input type="submit" >
</form> 

<p>If you click the "Submit" button, this parcel data will be updated.</p>

<div class="undo" >
		<button type="submit" name="back">  
			<a href="parcel_list.php"> <img src="img/back.png" width="100" height="71"> </a>
		</button>
	</div>

</body>
</html>