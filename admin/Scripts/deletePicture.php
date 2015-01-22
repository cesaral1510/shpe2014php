<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		if(isset($_POST['ID']) && !empty($_POST['ID'])) {
			require 'connect.php';
			$ID = $_POST['ID'];
			$Link = $_POST['Link'];
			$unlink = "../" . $Link;
			$dbcheck = "DELETE FROM `image` WHERE ID=$ID;";
			$dbquery = mysqli_query($dbConnect,$dbcheck);
			if(!$dbquery) {
				unlink($unlink);
				echo 'could not run query'.mysqli_error($dbConnect);
				exit;
			}
			else{
				echo 'Successful!';
			}
		}
		else{
			
		}
	}else{
		header("Location: ../login.php");
	}
?>