<!DOCTYPE>

<html>

<head>
<?php
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://web.njit.edu/~cal23/shpe2014/scripts/getEvents.php');
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    $output = curl_exec( $ch );
    $errmsg = curl_error( $ch );
    $info=json_decode($output,true);
    var_dump($info);
    curl_close( $ch );

?>


    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="css/events.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>

<body>

  <div class = "container">

      <?php include 'navbar.php';?>

         <div class="well">

            <p id="event-title"> Events</p>



           <img class="event-image" src="img/board.jpg">

           <div class="event-info">

           <p class="event-name">Dinner by the sea</p>

           <b><p class="font-16 no-margin">Newark Port Tier </p></b>

           <b><p class="font-16 "> Friday January 23rd 7pm-10pm</p> </b>

          <p class="font-16">Modus graecis signiferumque pri id, per prima scriptorem ei. Ea iusto neglegentur vis. Duis delectus at his. Pri eu sale appareat detraxit. Cu vocibus nostrum detraxit mea, regione quaestio ut eam, no his omnis similique.
ivendum laboramus, qui duis numquam dissentias eu. Dicam doming luptatum ei qui, in mei propriae qualisque. No nam rebum petentium, eu saepe ubique voluptatum ius. Omnes iisque qui te. Eu eam ridens insolens adversarium, mazim gloriatur vituperata vel an, ea vel utroque deseruisse.</p> 

          

           </div><!--end of event-info  -->

           <div class="blue-bar">
           <span id="white-color">Sort by Year<span>

           <select id="black-color">
              <option>2015</option>
            <option>2014</option>
             <option>2013</option>
             <option>2012</option>
           </select>


           </div>
           <div class="past-events">
           <img class="past-event-image" src="img/board.jpg">
           <img class="past-event-image middle" src="img/board.jpg">
           <img class="past-event-image middle" src="img/board.jpg">
           <img class="past-event-image margin-top" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           <img class="past-event-image margin-top middle" src="img/board.jpg">
           </div><!--past events-->

         </div><!--end of well  -->

      </div><!--end of container-->

</body>





</html>