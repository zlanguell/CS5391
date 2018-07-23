<?php 
$connect = mysqli_connect("localhost","root","","airlinefinal") or die('Something went wrong');
//mysql_select_db($dbname,$conn);
if(isset($_POST['submitted']))
 {
		$connect= mysqli_connect("localhost","root","","airlinefinal")or die("Server not found");
			//	mysql_select_db("ovs") or die("Database not found");
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == 'admin1' || $username == 'admin2')
		{
			if($password == '1234admin' || $password == '5678admin')
			{
				session_start();
				$_SESSION["user"]= $username;
				$_SESSION["login"]= true;
				header("location: adminhomepage.php");
			}
			else
			{
				echo "<script>";
				echo"alert('Incorrect Password')"; 
				echo "</script>";
			}
		}
		else
		{
			echo "<script>";
			echo"alert('Invalid Admin ID')";
			echo "</script>";
		}
		mysqli_close($connect);
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
<table  width="100%" background="images\h1.jpg">
<tr align="center">
<td>
<img src="logo.png" >
</td>
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


    
    
      </ul>

    </div>
  </div>
</nav>
</div>

  <div class="fullscreen" style="background-image:url('images/flight1.jpg');" data-img-width="1650" data-img-height="1064">
	<div class="container"  id="loginform">
	  <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="myform" id="myform" method="post">
		<fieldset>
	  <legend><font size="8px" style="font-family: 'Josefin Sans', sans-serif;"><b>ADMIN LOGIN</b></font></legend>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="email">Adminname:</label>
		  <div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username" placeholder="Enter email">
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="pwd">Password:</label>
		  <div class="col-sm-10">          
			<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
			  <label><input type="checkbox"> Remember me</label>
			</div>
		  </div>
		</div>
		<div class="form-group">        
		  <div class="col-sm-offset-2 col-sm-10">
		  <input type="hidden" name="submitted" value="true">
			<input type="submit" class="btn btn-primary" value="LOGIN">
			<a href="registration.php"><button type="button" class="btn btn-success">New User,Register</button></a>
		  </div>
		</div>
		</fieldset>
	  </form>
  </div>
</div>


	

<footer class="footer-distributed">
		   <div class="footer-left">

				<h3>P&P<span>Travellers</span></h3>

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
