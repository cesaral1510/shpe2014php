<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['testID']) && !empty($_POST['testID'])) {
			require 'connect.php';
			$testID = $_POST['testID'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$body = $_POST['body'];
			$dbcheck = 'UPDATE `testimonials` SET `firstName` = "'.$firstName.'", `lastName` = "'.$lastName.'", `body` = "'.$body.'" WHERE `testID` = "'.$testID.'";';
			$dbquery = mysqli_query($dbConnect,$dbcheck);
			if(!$dbquery) {
				echo 'could not run query'.mysqli_error($dbConnect);
				echo "Fail";
				exit;
			}
			else{
				echo "Success";
			}
		}
		else{

		}
	}else{
		header("Location: ../login.php");
	}
?>