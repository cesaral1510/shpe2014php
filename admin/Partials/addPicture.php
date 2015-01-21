<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Add Pictures</h4>
</div>
<div class="modal-body">
	<form id="addPictureForm" class="form-horizontal" action="Scripts/uploadPicture.php" method="POST" enctype="multipart/form-data">
		<fieldset>

		<!-- Form Name -->

		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="Picture">Picture</label>
		  <div class="col-md-4">
			<input id="Picture" name="Picture" class="input-file" type="file" accept="image/*" required>
		  </div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="captionEnglish">Caption(English)</label>
		  <div class="col-md-4">                     
			<textarea class="form-control" id="captionEnglish" name="CaptionEnglish" placeholder="Caption(English)"></textarea>
		  </div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="captionSpanish">Caption(English)</label>
		  <div class="col-md-4">                     
			<textarea class="form-control" id="captionSpanish" name="CaptionSpanish" placeholder="Caption(Spanish)"></textarea>
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="gallery">Gallery</label>
		  <div class="col-md-4">
			<select id="gallery" name="Gallery" class="form-control" required>
			  <option value="Sonia">Sonia</option>
			  <option value="Diony">Diony</option>
			</select>
		  </div>
		</div>

		</fieldset>

</div>	
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
<script>
	$('#1').on('hidden.bs.modal', function (e) {
  		resetModal1();
	})
	function resetModal1(){
		document.getElementById("addPictureForm").reset();
	}
</script>
<?php
  }else{
    header("Location: ../login.php");
  }
?>