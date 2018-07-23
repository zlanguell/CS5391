<?php
	session_start();
	if($_SESSION["login"]!==true)
	{
		header("location: login.php");
	}
	else
	{
		$user = $_SESSION['user'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FlyingStar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="header1.css">
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img 
  {
      width: 100%;
	  margin:auto;
	   

  }
    body {
      position: relative; 
  }
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }

  .affix ~ .container-fluid {
     position: relative;
     top: 50px;
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}

  </style>
<body >

<div >
<table width="100%" border="1">
<table  width="100%" background="h1.jpg">
<tr align="center">

<td>
<font id="heading-name"><b>FlyingStar</b><sup id="tm">&#0153;</sup></font>
</td>
</tr>
</table>
</div>

 
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="customerhomepage.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">FLIGHTS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="booking.php">Booking</a></li>
            <li><a href="cancelticket.php">Cancellation</a></li>
          </ul>
        </li>
   
        <li><a href="about.php">ABOUT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>WELCOME  <input type="text" style="background-color: khaki; color: red; font-weight: bold; text-transform: uppercase;" value="<?php echo $user;?>" readonly></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

 <div class="content"> 
  <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="flight5.jpg" alt="flights" width="460" height="345">
        <div class="carousel-caption">
          <h3>EASE OF FLIGHTS BOOKING</h3>
         
        </div>
      </div>

      <div class="item">
        <img src="flight2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>EXCELLENT FACILITIES PROVIDED</h3>
          
        </div>
      </div>
    
      <div class="item">
        <img src="flight3..jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>TIPS AND BAGGAGE MENU PROVIDED</h3>
          
        </div>
      </div>

      <div class="item">
        <img src="flight4.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>SERVICE AT ITS BEST</h3>
         
        </div>
      </div>
	   
	   <div class="item">
        <img src="flight7.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>TRAVEL ACCROSS THE COUNTRY WITHIN SHORTEST SPAN OF TIME</h3>
         
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
  
  
  <div class="container">
 <a href="login.php"><button type="button" class="btn btn-primary btn-block">CLICK HERE FOR BOOKINGS</button></a>
 </div>
 
<footer class="footer-distributed">
		   <div class="footer-left">

				<h3>Flying<span>Star</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Bookings</a>
					·
					<a href="#">Cancellations</a>
					·
					<a href="#">My ticket </a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">About Us</a>
				</p>

				<p class="footer-company-name">FlyingStar &copy; 2017 Developed by Harsh Patni</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p href="#"><span>FlyingStar</span> Austin, USA</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1(512)214-2062</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">flystar@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					Our Company is about Booking the Online Domestic Airline Ticket in quick and easy way.For Further Details Contact Us.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>
			</footer>



</body>
</html>
