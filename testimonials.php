<?php
  /* Authorize the user*/
    $ch = curl_init("https://web.njit.edu/~jag33/SHPE2014php/scripts/getTestimonials.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = rtrim(curl_exec($ch));
    if(curl_errno($ch)){
      echo 'Curl error: ' . curl_error($ch);
    }else{
      $result = rtrim(curl_exec($ch));
    }
    curl_close($ch);
  $testimonials = json_decode($result,true);
  $split = 0;
  $leftTests = array();
  $rightTests = array();
  foreach ($testimonials as $testimonial) {
    if($split == 0){
      $leftTests[] = $testimonial;
      $split = 1;
    }
    else{
      $rightTests[] = $testimonial;
      $split = 0;
    }
  }
?>
<!DOCTYPE>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
  	
    <div class = "container">
  	<!-- how am i going to change the active tab  -->
  	  <?php include 'navbar.php';?>
      


    
      <div class="well">
        <div> 
            <h1 class="titles"><center>Testimonials</center></h1>
            <hr>
            <div id="leftColumn">
              <?php
                foreach($leftTests as $lefty){
              ?>
                <div id="testimonial<?php echo $lefty['testID'];?>" class="testWrapper">
                  <div class="testimonialHeader">
                      <img class="testImage" src="<?php echo $lefty['link_img'];?>">
                      <div class="testName" >
                        <span class="title"><?php echo $lefty['firstName'];?> <?php echo $lefty['lastName'];?></span>
                      </div>
                  </div>
                  <div class="testBody">
                    <img src="img/startingQuote.png" class="startingQuote">
                    <p>
                      <?php echo stripslashes($lefty['body']);?>
                    </p>
                    <img src="img/endingQuote.png" class="endingQuote">
                  </div>
                </div>
              <?php 
                }
              ?>
            </div>
            <div id="rightColumn">
              <?php
                foreach($rightTests as $righty){
              ?>
                <div id="testimonial<?php echo $righty['testID'];?>" class="testWrapper">
                  <div class="testimonialHeader">
                      <img class="testImage" src="<?php echo $righty['link_img'];?>">
                      <div class="testName" >
                          <span class="title"><?php echo $righty['firstName'];?> <?php echo $righty['lastName'];?></span>
                        </div>
                  </div>
                  <div class="testBody">
                    <img src="img/startingQuote.png" class="startingQuote">
                    <p>
                      <?php echo stripslashes($lefty['body']);?>
                    </p>
                    <img src="img/endingQuote.png" class="endingQuote">
                  </div>
                </div>
              <?php 
                }
              ?>
            </div>
        </div>
      </div>
    </div>

  </body>
</html>