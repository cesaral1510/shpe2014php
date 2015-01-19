<?php
  if(isset($_SESSION['Logged'])){
		/* Authorize the user*/
		$ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/getContact.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "Name=Diony");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = rtrim(curl_exec($ch));
		$Diony = json_decode($result,true);
		if(curl_errno($ch)){
			echo 'Curl error: ' . curl_error($ch);
		}else{
			$result = rtrim(curl_exec($ch));
		}
		curl_close($ch);

		/* Authorize the user*/
		$ch = curl_init("http://web.njit.edu/~jag33/DSHairSensation/Scripts/getContact.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "Name=Sonia");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = rtrim(curl_exec($ch));
		$Sonia = json_decode($result,true);
		if(curl_errno($ch)){
			echo 'Curl error: ' . curl_error($ch);
		}else{
			$result = rtrim(curl_exec($ch));
		}
		curl_close($ch);

?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Update Contact Info</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" action="Scripts/changeContact.php" method="POST" enctype="multipart/form-data">
		<fieldset>
		<div class="form-group">
			<label class="col-md-4 control-label" for="contactSelect">Contact</label>
			<div class="col-md-4">
				<select id="contactSelect" name="contactSelect" onchange="displayContact()" class="form-control">
					<option value="Sonia">Sonia</option>
					<option value="Diony">Diony</option>
				</select>
			</div>
		</div>
		<!-- Form Name -->

		<!-- File Button --> 

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="contactInfoEnglish">Contact Info (English)</label>
		  <div class="col-md-4">                     
			<textarea rows="5" required class="form-control Contact Sonia" id="contactInfoEnglish" name="contactInfoEnglish" ><?php echo $Sonia['ContactInfoEnglish'];?></textarea>
			<textarea rows="5" required class="form-control Contact Diony" id="contactInfoEnglish" name="contactInfoEnglish" ><?php echo $Diony['ContactInfoEnglish'];?></textarea>
		  </div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="contactInfoSpanish">Contact Info (Spanish)</label>
		  <div class="col-md-4">                     
			<textarea rows="5" required class="form-control Contact Sonia" id="conctactInfoSpanish" name="contactInfoSpanish"><?php echo $Sonia['ContactInfoSpanish'];?></textarea>
			<textarea rows="5" required class="form-control Contact Diony" id="conctactInfoSpanish" name="contactInfoSpanish"><?php echo $Diony['ContactInfoSpanish'];?></textarea>
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="phone">Phone</label>
		  <div class="col-md-4">
			<input type="text" required id="phone" name="phone" class="form-control bfh-phone Contact Sonia" value="<?php echo $Sonia['Phone'];?>" data-format="+1 (ddd) ddd-dddd">		
			<input type="text" required id="phone" name="phone" class="form-control bfh-phone Contact Diony" value="<?php echo $Diony['Phone'];?>" data-format="+1 (ddd) ddd-dddd">
		  </div>
		</div>

		<div class="form-group">
		  <label class="col-md-4 control-label" for="address">Address</label>
		  <div class="col-md-4">                     
			<textarea rows="5" class="form-control Contact Sonia" id="address" name="address" required><?php echo $Sonia['Address'];?></textarea>
			<textarea rows="5" class="form-control Contact Diony" id="address" name="address" required><?php echo $Diony['Address'];?></textarea>
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
	$(".Diony").hide();
	$(".Diony").attr('disabled','true');
	$(".Sonia").show();
	$(".Sonia").removeAttr('disabled');
	function displayContact() {
		var x = document.getElementById("contactSelect");
		if(x.value=="Diony"){
			$(".Sonia").hide();
			$(".Sonia").attr('disabled','true');
			$(".Diony").show();
			$(".Diony").removeAttr('disabled');
		}else{
			$(".Diony").hide();
			$(".Diony").attr('disabled','true');
			$(".Sonia").show();
			$(".Sonia").removeAttr('disabled');
		}
	}
</script>
<?php
  }else{
    header("Location: ../login.php");
  }
?>