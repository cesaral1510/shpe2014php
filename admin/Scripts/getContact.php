<?php
	require 'connect.php';
	if(isset($_POST['Name'])){
		$Name = $_POST['Name'];

		$dbcheck = "SELECT * FROM `contact` WHERE `Name` = '$Name'";

		$dbquery = mysqli_query($dbConnect,$dbcheck);
		if(!$dbquery) {
			echo 'could not run query'.mysqli_error();
			exit;
		}
		else{
			while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
				$results = array(
					'ID' => $row['ID'],
					'Name' => $row['Name'],
					'ContactInfoEnglish' => $row['ContactInfoEnglish'],
					'ContactInfoSpanish' => $row['ContactInfoSpanish'],
					'Phone' => $row['Phone'],
					'PictureLink' => $row['PictureLink'],
					'Address' => $row['Address']
				);
			}
		}
		echo json_encode($results);
	}
	else{
		header('Location: ../adminOptions.php');
	}
?>