<?php

session_start();

if (isset($_POST['login']))          //check the login button
{
	$username = $_POST['username'];
	$_SESSION['userinfo'] = $username;
}

if(isset($_POST["logout"]))
{
	unset($_SESSION['userinfo']);
}
/*
if(isset($_SESSION['userinfo']))
{
	echo "Welcome, ".$_SESSION['userinfo'].". ";
}*/
?>