<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Manage Pictures</h4>
</div>
<?php
	/* Authorize the user*/
	$ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/selectPictures.php");
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
		$pictures = json_decode($result, true);
?>
		<form class="form-horizontal">
			<fieldset>
				<div class="form-group">
					<label class="col-md-4 control-label" for="GallerySelect">Gallery</label>
					<div class="col-md-4">
						<select id="GallerySelect" name="GallerySelect" onchange="displayGallery()" class="form-control">
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
				 <th class="col-md-2">Picture</th>
				 <th class="col-md-2">Created Date</th>
				 <th class="col-md-2">Last Edited</th>
				 <th class="col-md-2">Caption(English)</th>
				 <th class="col-md-2">Caption(Spanish)</th>
				 <th class="col-md-2"></th>
			  </tr>
		   </thead>
		<tbody id="pictures">
<?php
		foreach($pictures as $picture){
			echo '<tr id="tr'.$picture["ID"].'" class="'.$picture["Gallery"].' Gallery">';
			echo '<form id="'.$picture["ID"].'" action="JavaScript:managePicture(this.form)" method="GET">';
			echo '<input type="hidden" name="Link" value="'.$picture["Link"].'">';
			echo '<td><img style="max-width:120px;" src="'.$picture["Link"].'"></td>';
			echo '<td>'.$picture["CreatedDate"].'</td>';
			echo '<td>'.$picture["EditedDate"].'</td>';
			echo '<td><textarea class="form-control captionEdit" id="captionEnglish" name="CaptionEnglish" style="height:100%;" >'.$picture["CaptionEnglish"].'</textarea><span class="captionDisplay" id="captionEnglishText'.$picture["ID"].'">'.$picture["CaptionEnglish"].'</span></td>';
			echo '<td><textarea class="form-control captionEdit" id="captionSpanish" name="CaptionSpanish" style="height:100%;" >'.$picture["CaptionSpanish"].'</textarea><span class="captionDisplay" id="captionSpanishText'.$picture["ID"].'">'.$picture["CaptionSpanish"].'</span></td>';
			echo '<td>
					<div class="btn-group btn-group-lg" role="group">
					  <button type="button" onClick="managePicture(this.form)" id="save'.$picture["ID"].'" name="save" class="btn btn-default save"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
					  <button type="button" onClick="managePicture(this.form)" id="edit'.$picture["ID"].'" name="edit" class="btn btn-default edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
					  <button type="button" onClick="managePicture(this.form)" id="delete'.$picture["ID"].'" name="delete" class="btn btn-default delete"><span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span></button>
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
	$(".captionEdit").hide();
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
	function displayGallery() {
		var x = document.getElementById("GallerySelect");
		var gal = "." + x.value;
		$(".Gallery").hide();
		$(gal).show();
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
			savePicture(form.id, form.captionEnglish.value, form.captionSpanish.value);
		}else if(btn.indexOf("delete") > -1){
			deletePicture(form.id, form.Link.value);
		}
	}
	function savePicture(picId, captionEnglish, captionSpanish){
		$.ajax({ url: 'Scripts/updatePicture.php',
		 data: {ID: picId, CaptionEnglish: captionEnglish, CaptionSpanish: captionSpanish},
		 type: 'post',
		 success: function(output) {
				if(output=="Success"){
					$(".captionDisplay").show();
					$(".captionEdit").hide();
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
	function editPicture(form){
		$(".captionEdit").hide();
		$(".captionDisplay").show();
		var captionEnglishText = "#captionEnglishText" + form.id;
		var captionSpanishText = "#captionSpanishText" + form.id;
		$(captionEnglishText).hide();
		$(form.captionEnglish).show();
		$(captionSpanishText).hide();
		$(form.captionSpanish).show();
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