<?php
	session_start();
	if($_SESSION["login"]!==true)
	{
		header("location: admin.php");
	}
	else
	{
		$user = $_SESSION['user'];
	}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>P&P TRAVELLERS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/header1.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  
  <style>
 
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
     top: 10px;
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</head>
 
<body>

<div >
<table width="100%" border="1">
<table  width="100%" background="images/h1.jpg">
<tr align="center">
<td>
<img src="images/logo.png" >
</td>
<td>
<font id="heading-name"><b>P&P TRAVELLERS</b><sup id="tm">&#0153;</sup></font>
</td>
</tr>
</table>
</div>

 <div>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
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
        <li><a href="adminhomepage.php">HOME</a></li>

        <li><a href="flightadding.php"">ADD FLIGHTS</a></li>
	
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  	  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>WELCOME  <input type="text" style="background-color: khaki; color: red; font-weight: bold; text-transform: uppercase;" value="<?php echo $user;?>" readonly></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

  <div class="fullscreen" style="background-image:url('images/flight1.jpg');" data-img-width="1650" data-img-height="1064">
	<div class="container padding-top-10"  id="loginform">
	  <div class="panel panel-default">
		<div class="panel-heading">
		<b><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">ADD FLIGHTS</font></b>
		</div>
		<div class="panel body">
			<form name="flightadd" action="flightadd.php" method="post">
			<label for="Flightno" class="control-label">Flight No:</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input type="text" class="form-control" id="flightno" name="flightno" placeholder="Enter Flight Number"/>
				</div>
				
			</div>
			<label for="Flight name" class="control-label">Flight Name:</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input type="text" class="form-control" id="flightname" name="flightname" placeholder="Enter Flight Name"/>
				</div>
			</div>
			<label for="Price" class="control-label">Price:</label>
			<div class="row padding-top-12">
				<div class="col-md-4">
					<input type="text" class="form-control" id="at" name="at" placeholder="at price"/>
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="st" name="st" placeholder="st price"/>
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" id="ct" name="ct" placeholder="ct price"/>
				</div>
			</div>
			<label for="Time" class="control-label">Time</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input type="Time" class="form-control" id="time" name="time" placeholder="Enter Flight Time"/>
				</div>
			</div>
			
		
			
			

			
			</div>
			<div class="row padding-top-10">
				<div class="col-sm-offset-5 col-sm-10">
					<button type="submit" data-toggle="tooltip" data-placement="right" title="REGISTER!" class="btn btn-primary">SUBMIT</button>
				</div>
					
				
			</div>
				
			</form>
		
		</div>
	  </div>
  </div>
</div>


	

<footer class="footer-distributed">
		   <div class="footer-left">

				<h3>P&P<span>Travellers</span></h3>

				<p class="footer-links">

				</p>

				<p class="footer-company-name">P&P TRAVELLERS &copy; 2015 Developed by YASH PANCHAL & PREM PANCHAL</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p href="#"><span>K.J.S.I.E.I.T</span> MUMBAI, INDIA</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+91 8879347035 / +91 9702207759</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">pnptravellers@gmail.com</a></p>
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
