<?php
	include 'connect.php';

	$sql="SELECT * FROM `testimonials`;";

	$dbquery = mysqli_query($dbConnect,$sql);	

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$results = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$results[] = array(
				'testID' => $row['testID'],
				'firstName' => $row['firstName'],
				'lastName' => $row['lastName'],
				'link_img' => $row['link_img'],
				'body' => $row['body']
			);
		}
	}
	echo json_encode($results);

?>