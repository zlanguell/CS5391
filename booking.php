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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="header1.css">
  <link rel="stylesheet" type="text/css" href="login.css">
  
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
</head>
 
<body>

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

 <div>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">WELCOME!!</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="customerhomepage.php">HOME</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">FLIGHTS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Booking</a></li>
            <li><a href="cancelticket.php">Cancellation</a></li>
          </ul>
        </li>
     
        <li><a href="Aboutus.php">ABOUT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>WELCOME  <input type="text" style="background-color: khaki; color: red; font-weight: bold; text-transform: uppercase;" value="<?php echo $user;?>" readonly></a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

  <div class="fullscreen" style="background-image:url('flight1.jpg');" data-img-width="1650" data-img-height="1064">
	<div class="container"  id="loginform">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="page-header" style="margin-top:5px;">
						<center><b><font id="formhead">BOOK DOMESTIC FLIGHT TICKETS</font></b><center>
				</div>
				<form class="form-inline" name="myform" id="myform" method="post" action="confirm.php">
					<div class="row">
						<div class="col-md-6">
						<div class="form-group">
							<label for="" >From</label>
							<select class="form-control" id="source" name="source">
								<option value=""  selected disabled>Enter Departure City</option>
							  <option>MUMBAI</option>
							  <option>BENGLURU</option>
							  <option>AHMEDABAD</option>
							  <option>KOLKATA</option>
							  <option>DELHI</option>
							   <option>CHENNAI</option>
							  <option>HYDERABAD</option>
							  <option>KOCHI</option>
							  <option>BHOPAL</option>
							  <option>LUCKNOW</option>
							  <option>JAMMU</option>
							  <option>CHANDIGARH</option>
							  <option>AMRITSAR</option>
							  <option>JAMNAGAR</option>
							  <option>NAGPUR</option>
							  <option>BHUHNESHWAR</option>
							  <option>RANCHI</option>
							  <option>JAIPUR</option>
							  <option>SHIMLA</option>
							</select>
						</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-4">
						<div class="form-group">
							<label for="">To</label>
								<select id="destination" name="destination" class="form-control" placeholder="">
							 		<option value=""id="destination" name="destination" selected disabled>Enter Destination City</option>
							  <option>MUMBAI</option>
							  <option>BENGLURU</option>
							  <option>AHMEDABAD</option>
							  <option>KOLKATA</option>
							  <option>DELHI</option>
							   <option>CHENNAI</option>
							  <option>HYDERABAD</option>
							  <option>KOCHI</option>
							  <option>BHOPAL</option>
							  <option>LUCKNOW</option>
							  <option>JAMMU</option>
							  <option>CHANDIGARH</option>
							  <option>AMRITSAR</option>
							  <option>JAMNAGAR</option>
							  <option>NAGPUR</option>
							  <option>BHUHNESHWAR</option>
							  <option>RANCHI</option>
							  <option>JAIPUR</option>
							  <option>SHIMLA</option>
							</select>
						</div>
						</div>
						</div>
							 </br>
							 <div class="row">
								<div class="col-md-5">
								<div class="form-group">
								<label for="usr">Date of Journey</label>
									<input type="Date" id="doj" class="form-control" name="doj">
								</div>
								</div>
						<div class=" col-sm-offset-2 col-md-5">
								<div class="form-group">
									<label for="">Select your airlines</label>
							<select id="flight" name="flight" class="form-control" placeholder="">
							 <option value=""id="flight" name="flight" selected disabled>Select your airlines</option>
							  <option>INIDAN AIRLINES</option>
							  <option>KINGFISHER AIRLINES</option>
							  <option>SPICE JET</option>
							  <option>INDIGO</option>
							  <option>AIR INDIA</option>
							</select>
								</div>
								</div>
						</div>
							 </div>
							 </br>
							 	 <div class="row">
								<div class="col-md-5">
								<div class="form-group">
								<label for="usr">Cabin Class</label>
									<label class="radio-inline">
									<input type="radio" name="class" id="class" value="Economy">Economy</label>
									<input type="radio" name="class" id="class"  value="Bussiness">Bussiness</label>
								</div>
								</div>
								<div class="col-sm-offset-2 col-md-5">
								<div class="form-group">
								  <label for="At">Adult Travelling</label>
								  <select class="form-control" name="at" id="at">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								  </select>
								</div>
								</div>
							 </div>
							 </br>
							 <div class="row">
							 	<div class="col-md-5">
								<div class="form-group">
								  <label for="St">Senior Travelling</label>
								  <select class="form-control" id="st" name="st">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								  </select>
								</div>
								</div>
								 <div class="col-sm-offset-2 col-md-5">
								<div class="form-group">
								  <label for="Ct">Children Travelling</label>
								  <select class="form-control" id="ct" name="ct">
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								  </select>
								</div>
								</div>	
							</div>
							</br></br>
							<div class="row">
								<div class="col-sm-offset-5 col-sm-10">
								<input type="hidden" name="submitted" value="true">
								<button type="submit" data-toggle="tooltip" data-placement="right" title="Search Flights" class="btn btn-primary">Search Flights</button>
								</div>
							</div>
							
			</div>
			</form>
				
			</div>
		</div>
		
	</div>
	</div
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

				<p class="footer-company-name">FlyingStar &copy; 2015 Developed by Harsh Patni</p>
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
