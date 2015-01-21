<?php
  if(isset($_SESSION['Logged'])){
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Change Hours</h4>
</div>
<div class="modal-body">
  <form class="form-horizontal" action="Scripts/updateHours.php" method="POST">
	<fieldset>
	<div class="form-group">
		 <label class="col-md-4 control-label" for="location">Location</label>
		<div class="col-md-4">
			<select id="location" name="location" class="form-control">
				<option value="Sonia">Sonia</option>
				<option value="Diony">Diony</option>
			</select>
		</div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Monday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="MondayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="MondayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="MondayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Tuesday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="TuesdayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="TuesdayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="TuesdayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Wednesday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="WednesdayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="WednesdayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="WednesdayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Thursday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="ThursdayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="ThursdayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="ThursdayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Friday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="FridayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="FridayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="FridayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Saturday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="SaturdayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="SaturdayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="SaturdayClosed">Closed
		</div>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-2 control-label" for="textinput">Sunday</label>  
	  <div class="col-md-9">
		<label class="col-md-2 control-label" for="textinput">Opening</label>  

		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="SundayOpening" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<label class="col-md-2 control-label" for="textinput">Closing</label>  
		<div class="bootstrap-timepicker col-md-3">
			<input id="timepicker3" name="SundayClosing" type="text" class="timepicker form-control input-md col-lg-6">
		</div>
		<div class="col-md-2 checkbox">
			<input type="checkbox" name="SundayClosed">Closed
		</div>
	  </div>
	</div>
	</fieldset>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
 </form>
</div>
<?php
  }else{
    header("Location: ../login.php");
  }
?>