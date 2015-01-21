<?php
	require 'connect.php';
	$un = $_POST['user'];
	$pw = $_POST['pass'];
	$sql = "SELECT * FROM `user` where Username = '$un' and Password = '$pw';";
	$result = mysqli_query($dbConnect,$sql);
	$row = mysqli_fetch_array($result);
	if($row == "") {
		echo "false";	
			 
	} else {
		echo "true";
	}
	mysqli_close($dbConnect);
?>