<!DOCTYPE>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
  	
    <div class = "container">
  	<!-- how am i going to change the active tab  -->
  	<?php include 'navbar.php';?>
      
    </div>

    
      <div id ="newsthing">
        <h1><center>News</center></h1>
        <hr>
        
        <div class="list-group container-fluid col-lg-9 col-md-9 col-sm-9 col-xs-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="opp-list">
            <div class="panel-heading" role="tab" id="headingOne">
              <h3 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h3><img src="#"> Name of Internship</h3>
                </a>
              </h3>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body opp-body">
                <b><h4>Internship Opportunities Just for SHPE</h4></b>
                <p> This is the details of the internship</br></br> <b> The date range of when it expires to apply</b></p>
                <button type="button" class="btn btn-success">Apply Here</button>
              </div>
            </div>
          </div>
          <div class="opp-list">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h3><img src="#"> Name of Internship</h3>
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body opp-body">
                <b><h4>Internship Opportunities Just for SHPE</h4></b>
                <p> This is the details of the internship</br></br> <b> The date range of when it expires to apply</b></p>
                <button type="button" class="btn btn-success">Apply Here</button>
              </div>
            </div>
          </div>
          <div class="opp-list">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                 <h3><img src="#"> Name of Internship</h3>
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body opp-body">
                <b><h4>Internship Opportunities Just for SHPE</h4></b>
                <p> This is the details of the internship</br></br> <b> The date range of when it expires to apply</b></p>
                <button type="button" class="btn btn-success">Apply Here</button>
              </div>
            </div>
          </div>
      </div>


  </body>

</html>