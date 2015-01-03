<?php
	include 'connect.php';

	$sql="SELECT * FROM `event`;";

	$dbquery = mysqli_query($dbConnect,$sql);

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$results = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$results[] = array(
				'eventID' => $row['eventID'],
				'name' => $row['name'],
				'startTime' => $row['startTime'],
				'endTime' => $row['endTime'],
				'location' => $row['location'],
				'type' => $row['type'],
				'link' => $row['link'],
				'description' => $row['description']
			);
		}
	}
	echo json_encode($results);

?>