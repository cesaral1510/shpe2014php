<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		require("connect.php");
		var_dump($_POST);
	 	$Location = $_POST['location'];
		$Days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
		foreach($Days as $Day){
			$DayOpening = $Day.'Opening';
			$DayClosing = $Day.'Closing';
			$DayClosed = $Day.'Closed';
			$DayOpeningVal = $_POST[$DayOpening];
			$DayClosingVal = $_POST[$DayClosing];
			if(isset($_POST[$DayClosed])){
				$DayOpeningVal = 'Closed';
				$DayClosingVal = 'Closed';
			} 
			$sql = "UPDATE `hours` SET `Opening` = '$DayOpeningVal', `Closing` = '$DayClosingVal' WHERE `hours`.`Location` = '$Location' AND `hours`.`Day` = '$Day';";
			if(!mysqli_query($dbConnect, $sql)){
				echo"Error: ". mysqli_error($dbConnect);
			}
			else{
				echo "Successful!";
			}
		}
		mysqli_close($dbConnect);
	}else{
		header("Location: ../login.php");
	}
?>