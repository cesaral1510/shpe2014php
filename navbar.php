<?php
echo '<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <img alt ="Brand" src = "http://web.njit.edu/~fgl4/shpelogoshit.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
         
         <li><a href="#">Opportunity<span class="sr-only"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">E-Board <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://web.njit.edu/~cal23/shpe2014/eboard.php">Current E-Board</a></li>
            <li class="divider"></li>
            <li><a href="#">Advisors</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Past Events</a></li>
            <li><a href="#">Future Events</a></li>
            <li><a href="#">Gala</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Form <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Gallery <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About Us <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Mission & Vision</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Testimonials</a></li>
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
       <button type="button" class="btn btn-default navbar-btn">GBM Check-In</button>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';




?>