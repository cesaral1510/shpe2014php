<?php
	include 'connect.php';

	$sql="SELECT * FROM `opportunities`;";

	$dbquery = mysqli_query($dbConnect,$sql);	

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$results = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$results[] = array(
				'opID' => $row['opID'],
				'title' => $row['title'],
				'startDate' => $row['startDate'],
				'endDate' => $row['endDate'],
				'description' => $row['description'],
				'type' => $row['type'],
				'link' => $row['link'],
				'link_img' => $row['link_img']
			);
		}
	}
	echo json_encode($results);

?>