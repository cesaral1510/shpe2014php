<?php
include 'connect.php';

$Gallery = $_POST['Gallery'];
$dbcheck = "SELECT * FROM `image` WHERE `Gallery` = '$Gallery'";

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
			'Day' => $row['CreatedDate'],
			'Opening' => $row['EditedDate'],
			'Closing' => $row['Gallery'],
			'Link' => $row['Link'],
			'CaptionEnglish' => $row['CaptionEnglish'],
			'CaptionSpanish' => $row['CaptionSpanish']
		);
	}
}
echo json_encode($results);

?>