<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['ID']) && !empty($_POST['ID'])) {
			require 'connect.php';
			$ID = $_POST['ID'];
			$NameEnglish = $_POST['NameEnglish'];
			$NameSpanish = $_POST['NameSpanish'];
			$Section = $_POST['Section'];
			$dbcheck = "UPDATE `offering` SET `NameSpanish` = '$NameSpanish', `NameEnglish` = '$NameEnglish',  WHERE `ID` = $ID;";
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