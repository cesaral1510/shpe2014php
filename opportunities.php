<!DOCTYPE>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
  	
    <div class = "container">
  		  
  	<?php include 'navbar.php';?>
      
    </div>

    
      <div id ="newsthing">
        <h1><center>News</center></h1>
        <hr>
        
        <div class="list-group container-fluid col-lg-9 col-md-9 col-sm-9 col-xs-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" id="accordion" role="tablist" aria-multiselectable="true" id="">
          <div class="list-group-item">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Collapsible Group Item #1
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body"> Body 1      </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Collapsible Group Item #2
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">Body 2              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">Body 3              </div>
            </div>
          </div>
        </div>
      </div>


  </body>

</html>