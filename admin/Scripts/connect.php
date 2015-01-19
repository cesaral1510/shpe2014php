<?php

$username  = "jag33";

$password = "kNtkfY6Mf";

$connect = "sql2.njit.edu";

$db = "jag33";

$dbConnect = mysqli_connect("$connect", "$username","$password", "$db")
	or die("Could not connect to the database.");
	

?>
