<?php
	if(isset($_POST['loginForm'])){
		$un = $_POST['Login'];
		$pw = hash('sha512', $_POST['Password']);

		/* Authorize the user*/
		$ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/checkLogin.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$un&pass=$pw");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = rtrim(curl_exec($ch));
		if(curl_errno($ch)){
			echo 'Curl error: ' . curl_error($ch);
		}else{
			$result = rtrim(curl_exec($ch));
		}
		curl_close($ch);
		if($result != 'true'){
			echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;top:10px;right:10px;width:350px;	"role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>Wrong Login.</strong>  Use your correct Username and Password and try again.
			</div>';
			header('Location: login.php');
		}else{
			session_start();
			$_SESSION['Logged'] = 1;
			header('Location: adminOptions.php');
		}
	}else{
		header('Location: login.php');
	}
?>