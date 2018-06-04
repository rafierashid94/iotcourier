<?php
require_once 'database.php';

$courier=$_POST['parcel_number'];

$db= new Database;
$conn=$db->connect();

$sql= "SELECT * 
FROM parcel 
WHERE track_no='$courier'";

$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Tracking No.</th>
<th>Courier Status</th>
</tr>";

if($row =$result->fetch_array() )
{
echo "<tr>";
echo "<td>" . $row['parcel_name'] . "</td>";
echo "<td>" . $row['track_no'] . "</td>";
echo "<td>" . $row['courier_status'] . "</td>";
echo "</tr>";
echo "</table>";
}
else{
    echo"There is no such parcel";
}

$db->disconnect($conn);
?>