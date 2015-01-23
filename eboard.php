<!DOCTYPE>
<html>
<head>
<?php
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://web.njit.edu/~cal23/shpe2014/scripts/getEboard.php');
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    $output = curl_exec( $ch );
    $errmsg = curl_error( $ch );
    $info=json_decode($output,true);
    
    curl_close( $ch );

?>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class = "container">
		  <?php include 'navbar.php';?>
          <div class = "well board">
              <div id ="newsthing">
                    <h1>EBOARD 2014-2015</h1>
                    <hr>
                      <div class ="row">
      <?php
          for($counter=0;$counter<count($info);$counter++){
          echo ' <div class="col-lg-12 board-container-left" >';
          echo '<img src ="'.$info[$counter][link].'">' ;
          echo '   <div class="info_eboard">';
          echo "<p class='title_eboard'><i>".$info[$counter][position]."</i></p>";
          echo "<p> Name: ".$info[$counter][firstName]." ".$info[$counter][lastName]."</p>";
          echo "<p> Major: ".$info[$counter][major]."</p>";
          echo "<p> Email: ".$info[$counter][email]."</p>";
          echo "<p> LinkedIn:</p>    </div> </div>";
        }
       ?>
                    </div><!--end of row-->
               </div><!--end of newsthing-->
                <div id ="newsthing">
                    <h1>Advisors</h1>
                    <hr>
                      <div class ="row">
     
          
           <div class="col-lg-12 board-container-left" >
         <img src ="Eboard/Oquendo.jpeg"> 
             <div class="info_eboard">
          <p class='title_eboard'>ADVISOR </p>
          <p> Name: Maria Oquendo</p>
          <p>EOP Assistant Director for Counseling Services</p>
          <p>Juniors</p>
          <p>Email: maria.l.oquendo@njit.edu</p>
            </div>
             <div class="col-lg-12 board-container-left" >
         <img src ="EBoard/Reyes.jpeg"> 
             <div class="info_eboard">
          <p class='title_eboard'>ADVISOR </p>
          <p> Name: Nisha Reyes</p>
          <p>SSSP Assistant Director</p>
          <p>Email: nisha.reyes@njit.edu</p>
            </div>
           

       
       </div>
        
      
                    </div><!--end of row-->
               </div><!--end of newsthing-->
             </div><!--end of well-->

             
            



      </div><!--end of container-->
</body>


</html>