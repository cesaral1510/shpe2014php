<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Manage Testimonials</h4>
</div>
<?php
	/* Authorize the user*/
	/* $ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/selectPictures.php");
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

	$sql="SELECT * FROM `testimonials`;";

	$dbquery = mysqli_query($dbConnect,$sql);	

	if(!$dbquery) {
		echo 'Could not run query'.mysqli_error();
		exit;
	}
	else{
		$testimonials = array();
		while($row = mysqli_fetch_array($dbquery,MYSQL_ASSOC)){
			$testimonials[] = array(
				'testID' => $row['testID'],
				'firstName' => $row['firstName'],
				'lastName' => $row['lastName'],
				'link_img' => $row['link_img'],
				'body' => $row['body']
			);
		}
	}
	//echo json_encode($results);
	if($testimonials == null || $testimonials == "[]" ){
		echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;top:10px;right:10px;width:350px;	"role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Wrong Login.</strong>  Use your correct Username and Password and try again.
		</div>';
	}else{
		//$pictures = json_decode($result, true);
?>
		<form class="form-horizontal">
			<fieldset>
				<div class="form-group">
					<label class="col-md-12 control-label" for="GallerySelect"><center>Testimonials<scenter></label>
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
		<tbody id="pictures">
<?php
		foreach($testimonials as $testimonial){
			echo '<tr id="tr'.$testimonial["testID"].'" class="Gallery">';
			echo '<form id="'.$testimonial["testID"].'" action="JavaScript:managePicture(this.form)" method="GET">';
			echo '<input type="hidden" name="link_img" value="'.$testimonial["link_img"].'">';
			echo '<td><img style="max-width:120px;" src="../'.$testimonial["link_img"].'"></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="firstName" name="firstName" style="height:100%;" >'.$testimonial["firstName"].'</textarea><span class="captionDisplay" id="firstNameText'.$testimonial["testID"].'">'.$testimonial["firstName"].'</span></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="lastName" name="lastName" style="height:100%;" >'.$testimonial["lastName"].'</textarea><span class="captionDisplay" id="lastNameText'.$testimonial["testID"].'">'.$testimonial["lastName"].'</span></td>';
			echo '<td><textarea rows="4" class="form-control body" id="body" name="body" style="height:100%;" disabled>'.$testimonial["body"].'</textarea>';
			echo '<td>
					<div class="btn-group btn-group-lg" role="group">
					  <button type="button" onClick="managePicture(this.form)" id="save'.$testimonial["testID"].'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
					  <button type="button" onClick="managePicture(this.form)" id="edit'.$testimonial["testID"].'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
					  <button type="button" onClick="managePicture(this.form)" id="delete'.$testimonial["testID"].'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
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
	$('#2').on('hidden.bs.modal', function (e) {
  		resetModal();
	})
	function resetModal(){
		$(".captionEdit").hide();
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();
		$(".captionDisplay").show();
		$(".body").attr('disabled','disabled');
	}
	function managePicture(form){
		var btn = event.currentTarget.id;
		var saveID = "#save" + form.id;
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();	
		if(btn.indexOf("edit") > -1){
			var editID = "#edit" + form.id;
			$(editID).hide();
			$(saveID).show();
			editPicture(form);
		}else if(btn.indexOf("save") > -1){
			savePicture(form);
		}else if(btn.indexOf("delete") > -1){
			deletePicture(form.id, form.Link.value);
		}
	}
	function savePicture(form){
		$.ajax({ url: 'Scripts/updateTestimonial.php',
		 data: {testID: form.id, firstName: form.firstName.value, lastName: form.lastName.value, body: form.body.value},
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
					$("body").prepend('<div class="alert alert-success alert-dismissible" role="alert" style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> Picture information has been updated.</div>');
				}else{
					$("body").prepend('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Failed!</strong> Picture information has not been updated. Contact your webmaster to resolve this issue.</div>');
				}
			}
		}); 
	}
	function editPicture(form){
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
	function deletePicture(picId, link){
		var r = confirm("Are you sure you want to delete this picture?");
		if (r == true) {
 			$.ajax({ url: 'Scripts/deletePicture.php',
			 data: {ID: picId, Link: link},
			 type: 'post',
			 success: function(output) {
					if(output=="Successful!"){
						var childID = "tr" + picId;
						var par = document.getElementById("pictures");
						var child = document.getElementById(childID);
						par.removeChild(child);
						$("body").prepend('<div class="alert alert-success alert-dismissible" role="alert" style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> Picture has been deleted.</div>');
					}else{
						$("body").prepend('<div class="alert alert-danger alert-dismissible" role="alert"  style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Failed!</strong> Picture information has not been deleted. Contact your webmaster to resolve this issue.</div>');

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