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
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/Javascript">
			function validate()
			{
				if(document.signup.firstname.value=="")
				{
					alert("Please enter your Firstname");
					document.signup.firstname.focus();
					return false;
				}
				if(document.signup.lastname.value=="")
				{
					alert("Please enter your LastName");
					document.signup.lastname.focus();
					return false;
				}
				if(document.signup.username.value=="")
				{
					alert("Please enter your UserName");
					document.signup.username.focus();
					return false;
				}
				if(document.signup.username.value.length<8)
				{
					alert("Username Should be atleast 8 Characters");
					document.signup.username.focus();
					return false;
				}
				if(document.signup.password.value=="")
				{
					alert("Please enter valid Password");
					document.signup.password.focus();
					return false;
				}
				if(document.signup.password.value.length<8)
				{
					alert("Password Should be atleast 8 Characters");
					document.signup.username.focus();
					return false;
				}
				if(!(document.signup.password.value==document.signup.password1.value))
				{
					alert("Password Not matching");
					document.signup.password1.focus();
					return false;
				}
				
				if(document.signup.eid1.value=="")
				{
					alert("Please enter your Email-id");
					document.signup.eid1.focus();
					return false;
				}
					if(!(document.signup.eid.value==document.signup.eid1.value))
				{
					alert("EmailID Not matching");
					document.signup.eid1.focus();
					return false;
				}
				
				if(document.signup.mob.value.length>10)
				{
					alert("pls enter valid mobile number");
					document.signup.mob.focus();
					return false;
				}
				if(isNaN(document.signup.mob.value))
				{
					alert("No blank space and alphabets allowed");
					document.signup.mob.focus();
					return false;
				}

			}
</script>
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
        <li><a href="index.php">HOME</a></li>

        <li><a href="login.php">FLIGHTS</a></li>
        <li><a href="about.php">ABOUT US</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>

  <div class="fullscreen" style="background-image:url('images/flight1.jpg');" data-img-width="1650" data-img-height="1064">
	<div class="container padding-top-10"  id="loginform">
	  <div class="panel panel-default">
		<div class="panel-heading">
		<b><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">SIGN UP</font></b>
		</div>
		<div class="panel body">
			<form name="signup" action="signup.php" onsubmit="return validate()" method="post">
			<label for="firstname" class="control-label">Name:</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First"/>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last"/>
				</div>
			</div>
			<label for="address1" class="control-label padding-top-10">Username:</label>
			<div class="row padding-top-10">
				<div class="col-md-12">
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter any username which you would use to login"/>
				</div>
			</div>
			<label for="address1" class="control-label padding-top-10">Password:</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Upto 8 characters"/>
				</div>
				<div class="col-md-6">
					<input type="password" class="form-control" id="password1"name="password1" placeholder="Confirm password"/>
				</div>
			</div>
			
			
			<label for="email" class="control-label padding-top-10">Email:</label>
			<div class="row padding-top-10">
				<div class="col-md-12">
					<input  type="text" class="form-control" id="email1" name="eid" placeholder="Enter your Email ID" data-toggle="tooltip" data-placement="right" title="Enter valid Email ID for Account Verification "/>
				</div>
			</div>
			<div class="row padding-top-10">
				<div class="col-md-12">
					<input  type="text" class="form-control" id="email2" name="eid1" placeholder="Confirm your Email ID" />
				</div>
			</div>
			<label for="mobile" class="control-label padding-top-10">Mobile No:</label>
			<div class="row padding-top-10">
				<div class="col-md-6">
					<input  type="text" class="form-control" id="mobile" name="mob" placeholder="Enter your Mobile Number"/>
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

				<h3>Flying<span>Star</span></h3>

				<p class="footer-links">

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
					<p><a href="mailto:support@company.com">flyingstar@gmail.com</a></p>
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
