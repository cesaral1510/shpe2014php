<?php
	session_start();
	if(isset($_POST['Logged'])){
		require 'connect.php';

		$dbcheck = "SELECT * FROM `image`;";

		$dbquery = mysqli_query($dbConnect,$dbcheck);
		if(!$dbquery) {
			echo 'could not run query'.mysqli_error();
			exit;
		}
		else{
			$results = array();
			while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
				$results[] = array(
					'ID' => $row['ID'],
					'CreatedDate' => $row['CreatedDate'],
					'EditedDate' => $row['EditedDate'],
					'Gallery' => $row['Gallery'],
					'Link' => $row['Link'],
					'CaptionSpanish' => $row['CaptionSpanish'],
					'CaptionEnglish' => $row['CaptionEnglish']
				);
			}
		}
		echo json_encode($results);
	}else{
		header("Location: ../login.php");
	}
?>