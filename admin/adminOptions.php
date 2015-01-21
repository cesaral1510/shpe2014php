<?php
	session_start();
	if(isset($_SESSION['Logged'])){
		
	?>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="styles/bootstrap-timepicker.min.css" />
		<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
		<script src="js/bootstrap-formhelpers.min.js"></script>
		<link href="styles/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	      <script src="js/respond.min.js"></script>
	    <![endif]-->
		<style>
			body {
			  padding-top: 50px;
			}
			.starter-template {
			  padding: 40px 15px;
			  text-align: center;
			}
		</style>
</head>
<body>
	<?php
		if(isset($_GET['alert'])&& $_GET['alert']!=''){
			$alert = $_GET['alert'];
			switch ($alert) {
			    case "contactSuccess":
			    ?>
					<div class="alert alert-success alert-dismissible" role="alert" style="float:right; clear:both; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Success!</strong> Contact information was updated.
					</div>
			    <?php
			    	break;
			    case "contactFail":
			    ?>
					<div class="alert alert-danger alert-dismissible" role="alert" style="float:right; clear:both; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Failed!</strong> Contact information was not updated. Contact your webmaster to resolve this issue.
					</div>
			    <?php
			        break;
			    case "pictureDeleteSuccess":
			    ?>
					<div class="alert alert-success alert-dismissible" role="alert" style="float:right; clear:both; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Success!</strong> Picture deletion completed.
					</div>
			    <?php
			        break;
			    case "pictureDeleteFail":
			    ?>
					<div class="alert alert-danger alert-dismissible" role="alert" style="float:right; clear:both; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Fail!</strong> Picture deletioned not completed. Contact your webmaster to resolve this issue.
					</div>
			    <?php
			        break;
			    case "pictureAddSuccess":
			    ?>
					<div class="alert alert-success alert-dismissible" role="alert" style="float:right; clear:both; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Success!</strong> Picture was added.
					</div>
			    <?php
			        break;
			    case "pictureAddFail":
			    ?>
					<div class="alert alert-danger alert-dismissible" role="alert" style="float:right; margin:10px 10px 0 0; width:300px;">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>Fail!</strong> Picture was not added. Contact your webmaster to resolve this issue.
					</div>
			    <?php
			        break;
			}
		}
	?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NJIT SHPE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="Scripts/logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
	
      <div class="starter-template">
        <h1>Administration</h1>
        <p class="lead">Welcome to the management site for dshairsensation.com.<br> Click a button to perform the action stated.</p>
      </div>

    </div><!-- /.container -->
	<!-- Large modal -->
	<center>
	<div class="btn-group btn-group-lg" role="group">
		<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#1">Add Pictures</button>
	</div>
	<div id="1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<?php include "Partials/addPicture.php"; ?>
		</div>
	  </div>
	</div>
	<!-- Large modal -->
	<div class="btn-group btn-group-lg" role="group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#2">Manage Testimonials</button>
	</div>
		<div id="2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php include "Partials/manageTestimonials.php"; ?>
			</div>
		  </div>
		</div>

	<!-- Large modal -->
	<div class="btn-group btn-group-lg" role="group">	
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#3">Change Hours</button>
	</div>
	<div id="3" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php include "Partials/changeHours.php"; ?>
			</div>
		</div>
	</div>
	<div class="btn-group btn-group-lg" role="group">	
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#4">Update Contact Info</button>
	</div>
	<div id="4" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php include "Partials/updateContactInfo.php"; ?>
			</div>
		</div>
	</div>
	<div class="btn-group btn-group-lg" role="group">	
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#5">Update Offerings</button>
	</div>
	<div id="5" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php include "Partials/updateOfferings.php"; ?>
			</div>
		</div>
	</div>

	<!-- Large modal -->
	<div class="btn-group btn-group-lg" role="group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#6">Manage Users</button>
	</div>
		<div id="3" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<?php include "Partials/manageUsers.php"; ?>
			</div>
		  </div>
		</div>

	</center>
  </body>
	<?php
	}
	else{
	header('Location: login.php');
	}
?>