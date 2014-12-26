
<?php	
$host="sql2.njit.edu"; // Host name 
$username="shpe_club"; // Mysql username 
$password="2in91IH0I2Kz8Shd9V"; // Mysql password 
$db_name="shpe_club"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("Cannot Connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$selected = mysql_select_db($dbname, $dbh);
?>