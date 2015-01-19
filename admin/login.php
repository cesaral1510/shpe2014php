<?php
	session_start();
	if(!isset($_SESSION['Logged'])){
	?>
<html>
	<head>
		<title>NJIT SHPE - Admin</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		
		<style>
			body{
				padding: 50px;
			}
			#containter{
				width:23%;
				height:20%;
				margin-left: auto;
				margin-right: auto;
				max-width:500px;
				max-height:500px;
			}
			.modal-dialog {
				width: 300px;
			}
			.modal-footer {
				height: 70px;
				margin: 0;
			}
			.modal-footer .btn {
				font-weight: bold;
			}
			.modal-footer .progress {
				display: none;
				height: 32px;
				margin: 0;
			}
			.input-group-addon {
				color: #fff;
				background: #3276B1;
			}
		</style>
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DSHairSensation</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<div id="containter">
			<form role="form" action="index.php" method="POST">
			<h2 class="form-signin-heading"><center>Admin</center></h2>
						<div class="form-group">
							<div class="input-group">
								<input name="Login" type="text" class="form-control" id="Login" placeholder="Username">
								<label for="Login" class="input-group-addon glyphicon glyphicon-user"></label>
							</div>
						</div> <!-- /.form-group -->

						<div class="form-group">
							<div class="input-group">
								<input name="Password" type="password" class="form-control" id="Password" placeholder="Password">
								<label for="Password" class="input-group-addon glyphicon glyphicon-lock"></label>
							</div> <!-- /.input-group -->
						</div> <!-- /.form-group -->

						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
						<input type="submit" class="form-control btn btn-primary" submit name="loginForm">

			</form>
		</div>
	<script>
	$(document).ready(function(){
		$('.modal-footer button').click(function(){
			var button = $(this);

			if ( button.attr("data-dismiss") != "modal" ){
				var inputs = $('form input');
				var title = $('.modal-title');
				var progress = $('.progress');
				var progressBar = $('.progress-bar');

				inputs.attr("disabled", "disabled");

				button.hide();

				progress.show();

				progressBar.animate({width : "100%"}, 100);

				progress.delay(1000)
						.fadeOut(600);

				button.text("Close")
						.removeClass("btn-primary")
						.addClass("btn-success")
						.blur()
						.delay(1600)
						.fadeIn(function(){
							title.text("Log in is successful");
							button.attr("data-dismiss", "modal");
						});
			}
		});

		$('#myModal').on('hidden.bs.modal', function (e) {
			var inputs = $('form input');
			var title = $('.modal-title');
			var progressBar = $('.progress-bar');
			var button = $('.modal-footer button');

			inputs.removeAttr("disabled");

			title.text("Log in");

			progressBar.css({ "width" : "0%" });

			button.removeClass("btn-success")
					.addClass("btn-primary")
					.text("Ok")
					.removeAttr("data-dismiss");
					
		});
		function createAutoClosingAlert(selector, delay) {
		   var alert = $(selector).alert();
		   window.setTimeout(function() { alert.alert('close') }, delay);
		}
	});
	</script>
	</body>
</html>

	<?php
	}
	else{
	header('Location: adminOptions.php');
	}
?>