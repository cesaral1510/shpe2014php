<?php
	include 'connect.php';

	$sql="SELECT userID, firstName, lastName, email, major, gradDate, position, link FROM `eboard`, `user` WHERE `user`.userID = `eboard`.userID;";

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
				'gradDate' => $row['gradDate'],
				'email' => $row['email'],
				'major' => $row['major'],
				'position' => $row['position'],
				'link'  => $row['link']
			);
		}
	}
	echo json_encode($results);

?>
?>