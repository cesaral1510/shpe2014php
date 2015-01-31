<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Manage Testimonials</h4>
</div>
<div class="modal-body">
<?php
	/* Authorize the user*/
	/* $ch = curl_init("https://shpe.njit.edu/scripts/getTestimonials.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "Logged=1");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = rtrim(curl_exec($ch));
	if(curl_errno($ch)){
		echo 'Curl error: ' . curl_error($ch);
	}else{
		$result = rtrim(curl_exec($ch));
	}
	curl_close($ch);*/
	include 'Scripts/connect.php';

	$sql="SELECT * FROM `testimonials` ORDER BY testID DESC;";

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
		//$Testimonials = json_decode($result, true);
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
		   <style>
				.custom-file-input {
				  visibility: hidden;
				  width: 0;
				  position: absolute;
				}
				.custom-file-input::before {
				  content: 'Add Picture';
				  text-align:center;
				  line-height:95px;
				  display: inline-block;
				  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
				  border: 1px solid #999;
				  width:120px;
				  height:110px;
				  border-radius: 3px;
				  padding: 5px 8px;
				  margin-left:-5px;
				  outline: none;
				  white-space: nowrap;
				  -webkit-user-select: none;
				  cursor: pointer;
				  text-shadow: 1px 1px #fff;
				  font-weight: 700;
				  font-size: 10pt;
				  visibility: visible;
				  position: absolute;
				}
				.custom-file-input:hover::before {
				  border-color: black;
				}
				.custom-file-input:active::before {
				  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
				}
				#imagePreviewWrapper{
					background-size:cover;
					position:relative;
					top:0;
					margin-bottom:5px;
				}
				#imagePreview{
					width:100%;
					visibility:hidden;
				}
				#imagePreviewDelete{
					position:absolute;
					text-align:center;
					left:0;
					top:0;
					opacity:0;
					z-index:2;
					width:inherit;
					height:inherit;
					background-color:gray;
				}
				#imagePreviewDelete:hover{
					opacity:.6;
				}
				#imagePreviewDeleteText{
					position:relative;
					top:50%;
					font-size:100px;
					margin-top:-68px;
					color:red;
				}
				#submitNewTest{
					width:100%;
				}
		   </style>
		<tbody id="Testimonials">
			<tr class="Gallery" id="newTestRow">
				<td colspan="5" class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding:0;border:0;margin:0;">
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration:none">
					          <button id="addTest" class="btn btn-success">Add Testimonial</button>
					          <button id="discardTest" class="btn btn-warning">Discard Testimonial</button>
					        </a>
					      </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					      <div class="panel-body" style="padding-left:0;">
					      	<form id="newTestimonial" action="JavaScript:addTestimonial(this.form)" method="GET">
					      		<div class="col-md-2">
					      			<div id="imagePreviewWrapper">
					      				<img id="imagePreview" src="#" alt="your image"/>
					      				<div id="imagePreviewDelete">
					      					<div id="imagePreviewDeleteText">&times;</div>
					      				</div>
					      			</div>
					      			<input type="file" id="testImage" name="testImage" class="custom-file-input" required>
					      		</div>
								<div class="col-md-2">
									<textarea rows="1" class="form-control" id="firstName" name="firstName" placeholder="First Name" required></textarea>
								</div>
								<div class="col-md-2">
									<textarea rows="1" class="form-control" id="lastName" name="lastName"  placeholder="Last Name" required></textarea>
								</div>
								<div class="col-md-4">
									<textarea rows="5" class="form-control" id="body" name="body" style="height:100%;" placeholder="Body" required></textarea>
								</div>
								<div class="col-md-2">
					  				<button type="button" onClick="addTestimonial(this.form)" id="submitNewTest" name="submitNewTest" class="btn btn-success">Submit</button>
								</div>
							</form>
					      </div>
					    </div>
					  </div>
				</td>
			</tr>
<?php
		foreach($testimonials as $testimonial){
			echo '<tr id="tr'.$testimonial["testID"].'" class="Gallery">';
			echo '<form id="'.$testimonial["testID"].'" action="JavaScript:manageTestimonial(this.form)" method="GET">';
			echo '<input type="hidden" name="link_img" value="'.$testimonial["link_img"].'">';
			echo '<td><img style="max-width:120px;" src="../'.$testimonial["link_img"].'"></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="firstName" name="firstName" style="height:100%;" >'.$testimonial["firstName"].'</textarea><span class="captionDisplay" id="firstNameText'.$testimonial["testID"].'">'.$testimonial["firstName"].'</span></td>';
			echo '<td><textarea rows="1" class="form-control captionEdit" id="lastName" name="lastName" style="height:100%;" >'.$testimonial["lastName"].'</textarea><span class="captionDisplay" id="lastNameText'.$testimonial["testID"].'">'.$testimonial["lastName"].'</span></td>';
			echo '<td><textarea class="form-control body" id="body" name="body" style="height:100%;" disabled>'.$testimonial["body"].'</textarea></td>';
			echo '<td>
					<div class="btn-group btn-group-lg" role="group">
					  <button type="button" onClick="manageTestimonial(this.form)" id="save'.$testimonial["testID"].'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageTestimonial(this.form)" id="edit'.$testimonial["testID"].'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageTestimonial(this.form)" id="delete'.$testimonial["testID"].'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
					</div>
				  </td>';
			echo '</form>';
			echo '</tr>';

		}
		echo '</tbody></table>';
	}
?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<script>
	var inputControl = $("#testImage");
	$(".save").hide();	
	$(".captionEdit").hide();
	$("#imagePreviewWrapper").hide(); 
	$("#discardTest").hide();
	$('#2').on('hide.bs.modal', function (e) {
  		resetModal2();
	});
	function resetModal2(){
		$(".captionEdit").hide();
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();
		$(".captionDisplay").show();
		$(".body").attr('disabled','disabled');	
		if($("#discardTest").is(':visible')){
			$("#discardTest").click();
		}
	}
	function manageTestimonial(form){
		var btn = event.currentTarget.id;
		var saveID = "#save" + form.id;
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();	
		if(btn.indexOf("edit") > -1){
			var editID = "#edit" + form.id;
			$(editID).hide();
			$(saveID).show();
			editTestimonial(form);
		}else if(btn.indexOf("save") > -1){
			saveTestimonial(form);
		}else if(btn.indexOf("delete") > -1){
			deleteTestimonial(form.id);
		}
	}
	function saveTestimonial(form){
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
					createAutoClosingAlert("success", "<strong>Success!</strong> Testimonial has been saved.", 3500);
				}else{
					createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been saved. Contact your webmaster to resolve this issue.", 3500);
				}
			},
		 error: function() {
			createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been saved. Contact your webmaster to resolve this issue.", 3500);
		 }
		}); 
	}
	function editTestimonial(form){
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
	function deleteTestimonial(testID){
		var r = confirm("Are you sure you want to delete this Testimonial?");
		if (r == true) {
 			$.ajax({ url: 'Scripts/deleteTestimonial.php',
			 data: {testID: testID},
			 type: 'post',
			 success: function(output) {
			 		console.log(output);
					if(output.indexOf("Success") > -1){
						var childID = "tr" + testID;
						var par = document.getElementById("Testimonials");
						var child = document.getElementById(childID);
						par.removeChild(child);
						createAutoClosingAlert("success", "<strong>Success!</strong> Testimonial has been deleated.", 3500);
					}else{
						createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been deleted. Contact your webmaster to resolve this issue.", 3500);
					}
			 },
			 error: function() {
				createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been deleted. Contact your webmaster to resolve this issue.", 3500);
			 }
			}); 
		} 
	}
	function addTestimonial(form){
		console.log(form);
		if(form.firstName.value != "" && form.firstName.value != "" && form.body.value != "" && form.testImage.value != ""){
			var files = form.testImage.files;
			var fileSelect = $('#testImage');
			var uploadButton = $('#upload-button');

			var formData = new FormData();
			formData.append('testImage' , files[0], files[0].name);
			formData.append('firstName', form.firstName.value);
			formData.append('lastName', form.lastName.value);
			formData.append('body', form.body.value);
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'Scripts/addTestimonial.php', true);
			// Set up a handler for when the request finishes.
			xhr.onload = function () {
			  if (xhr.status === 200) {
			    // File(s) uploaded.
			    if(xhr.responseText.indexOf("Success") > -1){
			    	var newTestID = xhr.responseText.slice( xhr.responseText.indexOf('testID{') + 7, xhr.responseText.indexOf('}testID') );
			    	var newLinkImg = xhr.responseText.slice( xhr.responseText.indexOf('link_img{') + 9, xhr.responseText.indexOf('}link_img') );
					var sib = document.getElementById("newTestRow");
					var child = document.createElement("tr");
					child.setAttribute('id','tr'+newTestID);
					child.setAttribute('class', 'Gallery');
					child.innerHTML ='<td colspan="5"><form id="'+newTestID+'" action="JavaScript:manageTestimonial(this.form)" method="GET"><div class="col-md-2" style="padding-left:0px;"><input type="hidden" name="link_img" value="'+newLinkImg+'"><img style="max-width:120px;" src="../'+newLinkImg+'"></div><div class="col-md-2" style="padding-left:4px;"><textarea rows="1" class="form-control captionEdit" id="firstName" name="firstName" style="height:100%;" >'+form.firstName.value+'</textarea><span class="captionDisplay" id="firstNameText'+newTestID+'">'+form.firstName.value+'</span></div><div class="col-md-2" style="padding-left:10px;"><textarea rows="1" class="form-control captionEdit" id="lastName" name="lastName" style="height:100%;" >'+form.lastName.value+'</textarea><span class="captionDisplay" id="lastNameText'+newTestID+'">'+form.lastName.value+'</span></div><div class="col-md-4" style="padding-left:11px;padding-right:2px;"><textarea class="form-control body" id="body" name="body" style="height:100%;" disabled>'+form.body.value+'</textarea></div><div class="col-md-2"><div class="btn-group btn-group-lg" role="group"><button type="button" onClick="manageTestimonial(this.form)" id="save'+newTestID+'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button><button type="button" onClick="manageTestimonial(this.form)" id="edit'+newTestID+'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" onClick="manageTestimonial(this.form)" id="delete'+newTestID+'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button></div></div></form></td>';
    				sib.parentNode.insertBefore(child, sib.nextSibling);
    				resetModal2();
					createAutoClosingAlert("success", "<strong>Success!</strong> Testimonial has been added.", 3500);
				}else{
					createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been added. Contact your webmaster to resolve this issue.", 3500);
				}
			  }else {
				createAutoClosingAlert("danger", "<strong>Failed!</strong> Testimonial information has not been added. Contact your webmaster to resolve this issue.", 3500);
			  }
			};
			xhr.send(formData);
		}else{
			alert('Please fill out all fields before submitting');
		}
	}
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            	$('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewWrapper').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreviewDelete').css('height', '100%');
                $('#imagePreviewDelete').css('width', '100%');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#testImage").change(function(){
    	$("#testImage").css('z-index', '-1');
    	$("#imagePreviewWrapper").show();
    	$('#imagePreviewWrapper').css('background-image', 'url(../img/ajax_loader.gif)');
        readURL(this);
    });
    $("#imagePreviewDelete").click(function(){
	   	$("#imagePreviewWrapper").hide();
	   	inputControl.replaceWith( inputControl = inputControl.clone( true ) );
	   	$("#testImage").css('opacity', '1');
	   	$("#testImage").css('z-index', '1');
    });
    $("#addTest").click(function(){
    	$("#discardTest").show();
    	$("#addTest").hide();

    });
    $("#discardTest").click(function(){
    	$("#discardTest").hide();
    	$("#addTest").show();
    	$("#imagePreviewWrapper").hide();
	   	inputControl.replaceWith( inputControl = inputControl.clone( true ) );
	   	$("#testImage").css('z-index', '1');
    	document.getElementById("newTestimonial").reset();
    });
</script>
<?php
  }else{
    header("Location: ../login.php");
  }
?>