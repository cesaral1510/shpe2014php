<?php
include 'connect.php';

$Location = $_POST['Location'];
$dbcheck = "SELECT * FROM `hours` WHERE `location` = '$Location'";

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
			'Day' => $row['Day'],
			'Opening' => $row['Opening'],
			'Closing' => $row['Closing'],
			'Location' => $row['Location']
		);
	}
}
echo json_encode($results);

?>