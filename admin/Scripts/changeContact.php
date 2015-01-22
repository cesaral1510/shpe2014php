<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['contactSelect']) && !empty($_POST['contactSelect'])) {
			require 'connect.php';
			$Name = $_POST['contactSelect'];
			$ContactInfoEnglish = $_POST['contactInfoEnglish'];
			$ContactInfoSpanish = $_POST['contactInfoSpanish'];
			$Phone = substr($_POST['phone'], 3);
			$Address = $_POST['address'];
			$dbcheck = "UPDATE `contact` SET `ContactInfoSpanish` = '$ContactInfoSpanish', `ContactInfoEnglish` = '$ContactInfoEnglish', `Phone` = '$Phone', `Address` = '$Address'  WHERE `Name` = '$Name';";
			$dbquery = mysqli_query($dbConnect,$dbcheck);
			if(!$dbquery) {
				echo 'could not run query'.mysqli_error($dbConnect);
				exit;
				header("Location: ../adminOptions.php?alert=contactFail");
			}
			else{
				header("Location: ../adminOptions.php?alert=contactSuccess");
			}
		}
	}else{
		header("Location: ../login.php");
	}
?>