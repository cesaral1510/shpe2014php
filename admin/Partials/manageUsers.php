<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Manage Users</h4>
</div>
<?php
	/* Authorize the user*/
	/* $ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/selectUsers.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "Logged=1");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = rtrim(curl_exec($ch));
	if(curl_errno($ch)){
		echo 'Curl error: ' . curl_error($ch);
	}else{
		$result = rtrim(curl_exec($ch));
	}
	curl_close($ch);*/
	include 'Scripts/connect.php';

	$sql="SELECT * FROM `user`;";

	$dbquery = mysqli_query($dbConnect,$sql);	

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$users = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$users[] = array(
				'userID' => $row['userID'],
				'firstName' => $row['firstName'],
				'lastName' => $row['lastName'],
				'email' => $row['email'],
				'linkedIn' => $row['linkedIn'],
				'major' => $row['major'],
				'gradDate' => $row['gradDate'],
				'gender' => $row['gender'],
				'number' => $row['number'],
				'dateOfBirth' => $row['dateOfBirth'],
				'middleName' => $row['middleName'],
				'ethnicity' => $row['ethnicity'],
				'legalStatus' => $row['legalStatus'],
				'address' => $row['address'],
				'city' => $row['city'],
				'state' => $row['state'],
				'country' => $row['country'],
				'postalCode' => $row['postalCode'],
				'degree' => $row['degree'],
				'gpa' => $row['gpa'],
				'gradeLevel' => $row['gradeLevel'],
				'resumeLink' => $row['resumeLink']
			);
		}
	}
	//echo json_encode($results);
	if($users == null || $users == "[]" ){
		echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;top:10px;right:10px;width:350px;	"role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Wrong Login.</strong>  Use your correct Username and Password and try again.
		</div>';
	}else{
		//$Users = json_decode($result, true);
?>
		<form class="form-horizontal">
			<fieldset>
				<div class="form-group">
					<label class="col-md-12 control-label" for="GallerySelect"><center>Users<scenter></label>
				</div>
			</fieldset>
		</form>
		<table class="table table-hover" >   
			<thead>
			  <tr>
				 <th class="col-md-2">Image</th>
				 <th class="col-md-2">First Name</th>
				 <th class="col-md-2">Last Name</th>
				 <th class="col-md-4">Body</th>
				 <th class="col-md-3"></th>
			  </tr>
		   </thead>
		<tbody id="Users">
<?php
		foreach($users as $user){
			echo '<tr id="tr'.$user["userID"].'">';
			echo '<form id="'.$user["userID"].'" action="JavaScript:manageUser(this.form)" method="GET">';
			//echo '<input type="hidden" name="link_img" value="'.$user["link_img"].'">';
			//echo '<td><img style="max-width:120px;" src="../'.$user["link_img"].'"></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="firstName" name="firstName" style="height:100%;" >'.$user["firstName"].'</textarea><span class="captionDisplay" id="firstNameText'.$user["userID"].'">'.$user["firstName"].'</span></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="lastName" name="lastName" style="height:100%;" >'.$user["lastName"].'</textarea><span class="captionDisplay" id="lastNameText'.$user["userID"].'">'.$user["lastName"].'</span></td>';
			//echo '<td><textarea rows="4" class="form-control body" id="body" name="body" style="height:100%;" disabled>'.$user["body"].'</textarea>';
			echo '<td>
					<div class="btn-group btn-group-lg" role="group">
					  <button type="button" onClick="manageUser(this.form)" id="save'.$user["userID"].'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageUser(this.form)" id="edit'.$user["userID"].'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageUser(this.form)" id="delete'.$user["userID"].'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
					</div>
				  </td>';
			echo '</form>';
			echo '</tr>';

		}
		echo '</tbody></table>';
	}
?>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<script>
	$(".save").hide();	
	$(".captionEdit").hide();
	$('#6').on('hidden.bs.modal', function (e) {
  		resetModalUser();
	})
	function resetModalUser(){
		$(".captionEdit").hide();
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();
		$(".captionDisplay").show();
		$(".body").attr('disabled','disabled');
	}
	function manageUser(form){
		var btn = event.currentTarget.id;
		var saveID = "#save" + form.id;
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();	
		if(btn.indexOf("edit") > -1){
			var editID = "#edit" + form.id;
			$(editID).hide();
			$(saveID).show();
			editUser(form);
		}else if(btn.indexOf("save") > -1){
			saveUser(form);
		}else if(btn.indexOf("delete") > -1){
			deleteUser(form.id, form.Link.value);
		}
	}
	function saveUser(form){
		$.ajax({ url: 'Scripts/updateuser.php',
		 data: {userID: form.id, firstName: form.firstName.value, lastName: form.lastName.value, body: form.body.value},
		 type: 'post',
		 success: function(output) {
				if(output.indexOf("Success") > -1){
					$(".captionDisplay").show();
					$(".captionEdit").hide();
					var firstNameText = "firstNameText" + form.id;
					var lastNameText = "lastNameText" + form.id;
					document.getElementById(firstNameText).innerHTML = form.firstName.value;
					document.getElementById(lastNameText).innerHTML = form.lastName.value;
					$(".body").attr('disabled','disabled');
					$("body").prepend('<div class="alert alert-success alert-dismissible" role="alert" style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> User information has been updated.</div>');
				}else{
					$("body").prepend('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Failed!</strong> User information has not been updated. Contact your webmaster to resolve this issue.</div>');
				}
			}
		}); 
	}
	function editUser(form){
		$(".captionEdit").hide();
		$(".captionDisplay").show();
		$(".body").attr('disabled','disabled');
		$(".body").attr('rows', '5');
		var firstNameText = "#firstNameText" + form.id;
		var lastNameText = "#lastNameText" + form.id;
		$(firstNameText).hide();
		$(form.firstName).show();
		$(lastNameText).hide();
		$(form.lastName).show();
		$(form.body).removeAttr('disabled');
		$(form.body).attr('rows', '10');
	}
	function deleteUser(picId, link){
		var r = confirm("Are you sure you want to delete this User?");
		if (r == true) {
 			$.ajax({ url: 'Scripts/deleteUser.php',
			 data: {ID: picId, Link: link},
			 type: 'post',
			 success: function(output) {
					if(output=="Successful!"){
						var childID = "tr" + picId;
						var par = document.getElementById("Users");
						var child = document.getElementById(childID);
						par.removeChild(child);
						$("body").prepend('<div class="alert alert-success alert-dismissible" role="alert" style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> User has been deleted.</div>');
					}else{
						$("body").prepend('<div class="alert alert-danger alert-dismissible" role="alert"  style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Failed!</strong> User information has not been deleted. Contact your webmaster to resolve this issue.</div>');

					}
				}
			}); 
		} 
	}
</script>
<?php
  }else{
    header("Location: ../login.php");
  }
?>