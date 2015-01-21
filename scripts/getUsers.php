<?php
	include 'connect.php';

	$sql="SELECT * FROM `user`;";

	$dbquery = mysqli_query($dbConnect,$sql);	

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$results = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$results[] = array(
				'userID' => $row['userID'],
				'firstName' => $row['firstName'],
				'lastName' => $row['lastName'],
				'email' => $row['email'],
				'linkedIn' => $row['linkedIn'],
				'major' => $row['major'],
				'gradDate' => $row['gradDate'],
				'gender' => $row['gender'],
				'number' => $row['number'],
				'dateOfBirth' => $row['dateOfBirth'],
				'middleName' => $row['middleName'],
				'ethnicity' => $row['ethnicity'],
				'legalStatus' => $row['legalStatus'],
				'address' => $row['address'],
				'city' => $row['city'],
				'state' => $row['state'],
				'country' => $row['country'],
				'postalCode' => $row['postalCode'],
				'degree' => $row['degree'],
				'gpa' => $row['gpa'],
				'gradeLevel' => $row['gradeLevel'],
				'resumeLink' => $row['resumeLink']
			);
		}
	}
	echo json_encode($results);

?>