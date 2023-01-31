<?php
require("config.php");

if(isLoggedIn())
{
	$adminID = $_SESSION[$aid];
	$sql = "SELECT * FROM `admin` WHERE `email`='$adminID'";
	$result = $mysqli->query($sql);

	if($row = $result->fetch_assoc())
	{
		$fname = $row['fname'];
		$lname = $row['lname'];
		$fullname = $fname . " " . $lname;
	}
}
else
{
	setFlash("url",$_SERVER['REQUEST_URI']);
	setFlash("warning","Please Login to continue");
	header("location:login.php");
}
