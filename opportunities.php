<?php 
  //get the cURL resource
  $ch = curl_init();
  // Set Options
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, 'https://web.njit.edu/~mcd24/shpe2014php/scripts/getOpportunities.php');
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_POST, 1 );
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
  $output = curl_exec( $ch );
  $errmsg = curl_error( $ch );
  $info=json_decode($output,true);
  curl_close($ch);
?>

<!DOCTYPE>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>

  	<!-- =======================================Start Container ============================================-->
    <div class = "container">
  	<?php include 'navbar.php';?>
      <!-- =======================================Start Accordian ============================================-->
      <div class="well list-group" id="accordion" role="tablist" aria-multiselectable="true">
        <h1 class="title">Opportunities</h1>
        <hr>

        <?php

        
          for($counter=0;$counter<count($info);$counter++){
            echo '<div class="opp-list">
                  <div class="panel-heading" role="tab" id="heading'.$counter.'">
                  <h3 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$counter.'" aria-expanded="true" aria-controls="collapseOne">';
            echo '<img src="#" alt="Pic Not Found">';
            echo '</a>
                  </h3>
                  </div>
                  <div id="collapse'.$counter.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="'.$counter.'">
                  <div class="panel-body opp-body">';
            echo '<b><h4>'.$info[$counter][title].'</h4></b>';
            echo '<p>'.$info[$counter][description].'</br></br>';
            echo '<b>'.$info[$counter][startDate].'-'.$info[$counter][endDate].'</b></p>';
            echo '<a href="'.$info[$counter][link].'" class="btn btn-success" role="button">Apply Here</a>';
            echo '</div></div></div>';
          }

          echo '</div>';
          echo '</div>';     
        ?>    
      <!-- =======================================End Accordian ============================================-->
  </div>
  <!-- =======================================End Container ============================================-->
  </body>

</html>