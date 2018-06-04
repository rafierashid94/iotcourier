<?php
require_once 'database.php';
require_once 'session.php';

//$s = $_SESSION['userinfo'];

?>
<!DOCTYPE html>
<html>
<head>
<title>
Admin Selection Page
</title>
<style>
h2{
    text-align:center;
}
body{
    background:url(img/frontcover.jpg) ;
	background-size: cover;
	background-position: top center !important;
	background-repeat: no-repeat !important;
	background-attachment: fixed;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    margin-bottom: 25px;
}


.button:hover {
    background-color: green;
}

.exit {
		  width: 71px ;
		  margin: 71px auto;
		}
</style>
</head>
<body>

<div class="exit" style="margin-right:20px; margin-top:15px">
		<form name="form" method="POST" action="index.html">
			<button type="submit" name="logout" value="Logout"> <img src="img/logout.jpg" width="80" height="50"> </button>
		</form>
	</div>

<h2>User Management</h2>
<form name="track_courier" method="POST" action ="employee_list.php" align="center">
<button class="button" onclick="track_courier.php">Display Registered Employee</button><br>
</form>
<form name="admin_info" method="POST" action="admin_list.php" align="center">
<button class="button">Display Registered Admin</button>
</form>
<h2>
Courier Management
</h2>
<form name="admin_login" method="POST" action="parcel_list.php" align="center">
<button class="button">Parcel List</button>
</form>




</body>
</html>