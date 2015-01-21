<?php
include 'connect.php';

$dbcheck = "SELECT * FROM `offering`";

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
			'NameEnglish' => $row['NameEnglish'],
			'NameSpanish' => $row['NameSpanish'],
			'Section' => $row['Section'],
			'Location' => $row['Location']
		);
	}
}
echo json_encode($results);

?>