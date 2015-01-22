<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Manage Offerings</h4>
</div>
<?php
	/* Authorize the user*/
	$ch = curl_init("http://localhost/DSHairSensation/Scripts/getOfferings.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "Logged=1");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = rtrim(curl_exec($ch));
	if(curl_errno($ch)){
		echo 'Curl error: ' . curl_error($ch);
	}else{
		$result = rtrim(curl_exec($ch));
	}
	curl_close($ch);
	if($result == null || $result == "[]" ){
		echo '<div class="alert alert-danger alert-dismissible" style="position:absolute;top:10px;right:10px;width:350px;	"role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Wrong Login.</strong>  Use your correct Username and Password and try again.
		</div>';
	}else{
		$offerings = json_decode($result, true);
?>
		<form class="form-horizontal">
			<fieldset>
				<div class="form-group">
					<label class="col-md-4 control-label" for="LocationSelect">Location</label>
					<div class="col-md-4">
						<select id="LocationSelect" name="LocationSelect" onchange="displayLocation()" class="form-control">
							<option value="Sonia">Sonia</option>
							<option value="Diony">Diony</option>
						</select>
					</div>
				</div>
			</fieldset>
		</form>
		<table class="table table-hover" >   
			<thead>
			  <tr>
				 <th class="col-md-2">Offering (English)</th>
				 <th class="col-md-2">Offering (Spanish)</th>
				 <th class="col-md-2">Section</th>
				 <th class="col-md-2"></th>
			  </tr>
		   </thead>
		<tbody id="offerings">
<?php
		foreach($offerings as $offering){
			echo '<tr id="tr'.$offering["ID"].'" class="'.$offering["Location"].' Location">';
			echo '<form id="'.$offering["ID"].'" action="JavaScript:manageOffering(this.form)" method="GET">';
			//echo '<input type="hidden" name="Link" value="'.$offering["Link"].'">';
			//echo '<td><img style="max-width:120px;" src="'.$offering["Link"].'"></td>';
			echo '<td><textarea class="form-control nameEdit" id="nameEnglish" name="NameEnglish" style="height:100%;" >'.$offering["NameEnglish"].'</textarea><span class="nameDisplay" id="nameEnglishText'.$offering["ID"].'">'.$offering["NameEnglish"].'</span></td>';
			echo '<td><textarea class="form-control nameEdit" id="nameSpanish" name="NameSpanish" style="height:100%;" >'.$offering["NameSpanish"].'</textarea><span class="nameDisplay" id="nameSpanishText'.$offering["ID"].'">'.$offering["NameSpanish"].'</span></td>';
			echo '<td><textarea class="form-control nameEdit" id="section" name="Section" style="height:100%;" >'.$offering["Section"].'</textarea><span class="nameDisplay" id="sectionText'.$offering["ID"].'">'.$offering["Section"].'</span></td>';
			echo '<td>
					<div class="btn-group btn-group-lg" role="group">
					  <button type="button" onClick="manageOffering(this.form)" id="save'.$offering["ID"].'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageOffering(this.form)" id="edit'.$offering["ID"].'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
					  <button type="button" onClick="manageOffering(this.form)" id="delete'.$offering["ID"].'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
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
	$(".Diony").hide();	
	$(".save").hide();	
	$(".nameEdit").hide();
	$('#2').on('hidden.bs.modal', function (e) {
  		resetModal();
	})
	function resetModal(){
		$(".Diony").hide();
		$(".captionEdit").hide();
		$(".save").hide();	
		$(".Sonia").show();
		$(".delete").show();	
		$(".edit").show();
		$(".captionDisplay").show();
	}
	function displayLocation() {
		var x = document.getElementById("LocationSelect");
		var gal = "." + x.value;
		$(".Location").hide();
		$(gal).show();
	}
	function manageOffering(form){
		var btn = event.currentTarget.id;
		var saveID = "#save" + form.id;
		$(".save").hide();	
		$(".delete").show();	
		$(".edit").show();		
		if(btn.indexOf("edit") > -1){
			var editID = "#edit" + form.id;
			$(editID).hide();
			$(saveID).show();
			editOffering(form);
		}else if(btn.indexOf("save") > -1){
			saveOffering(form.id, form.nameEnglish.value, form.nameSpanish.value, form.section.value);
		}else if(btn.indexOf("delete") > -1){
			deleteOffering(form.id, form.Link.value);
		}
	}
	function saveOffering(picId, captionEnglish, captionSpanish, section){
		$.ajax({ url: 'Scripts/updateOffering.php',
		 data: {ID: picId, 
		 		NameEnglish: captionEnglish, 
		 		NameSpanish: captionSpanish,
		 		Section: section
		 },
		 type: 'post',
		 success: function(output) {
				if(output=="Success"){
					$(".nameDisplay").show();
					$(".nameEdit").hide();
					var captionEnglishText = "captionEnglishText" + picId;
					var captionSpanishText = "captionSpanishText" + picId;
					document.getElementById(captionEnglishText).innerHTML = captionEnglish;
					document.getElementById(captionSpanishText).innerHTML = captionSpanish;
					$("body").prepend('<div class="alert alert-success alert-dismissible" role="alert" style="z-index:100;float:right;clear:both; margin:10px 10px 0 0; width:300px;"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success!</strong> Picture information has been updated.</div>');
				}else{
					$("body").prepend('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Failed!</strong> Picture information has not been updated. Contact your webmaster to resolve this issue.</div>');
				}
			}
		}); 
	}
	function editOffering(form){
		$(".nameEdit").hide();
		$(".nameDisplay").show();
		var nameEnglishText = "#nameEnglishText" + form.id;
		var nameSpanishText = "#nameSpanishText" + form.id;
		var sectionText = "#sectionText" + form.id;
		$(nameEnglishText).hide();
		$(form.nameEnglish).show();
		$(nameSpanishText).hide();
		$(form.nameSpanish).show();
		$(sectionText).hide();
		$(form.section).show();
	}
	function deleteOffering(picId, link){
		var r = confirm("Are you sure you want to delete this offering?");
		if (r == true) {
 			$.ajax({ url: 'Scripts/deleteOffering.php',
			 data: {ID: picId, Link: link},
			 type: 'post',
			 success: function(output) {
					if(output=="Success"){
						var childID = "tr" + picId;
						var par = document.getElementById("offerings");
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