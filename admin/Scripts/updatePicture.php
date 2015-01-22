<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['ID']) && !empty($_POST['ID'])) {
			require 'connect.php';
			$ID = $_POST['ID'];
			$CaptionEnglish = $_POST['CaptionEnglish'];
			$CaptionSpanish = $_POST['CaptionSpanish'];
			$dbcheck = "UPDATE `image` SET `CaptionSpanish` = '$CaptionSpanish', `CaptionEnglish` = '$CaptionEnglish' WHERE `ID` = $ID;";
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