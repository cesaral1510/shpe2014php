
<?php	
$username  = "shpe_club";

$password = "2in91IH0I2Kz8Shd9V";

$connect = "sql2.njit.edu";

$db = "shpe_club";

$dbConnect = mysqli_connect("$connect", "$username","$password", "$db")
	or die("Could not connect to the database.");
?>