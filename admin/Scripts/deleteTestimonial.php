<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['testID']) && !empty($_POST['testID'])) {
			require 'connect.php';
			$testID = $_POST['testID'];
			$dbcheck = "DELETE FROM `testimonials` WHERE `testID`=$testID;";
			$dbquery = mysqli_query($dbConnect,$dbcheck);
			if(!$dbquery) {
				echo 'could not run query'.mysqli_error($dbConnect);
				exit;
			}
			else{
				echo 'Success';
			}
		}
		else{
			
		}
	}else{
		header("Location: ../login.php");
	}
?>