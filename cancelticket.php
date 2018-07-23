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

  table th
{
	background-color:#eeeeee ;
	border-width: 2px;
	padding-left: 10px;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	font-size: 20px;
	font-family:Verdana;
}
table td
{
	padding-left: 10px;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	font-size: 20px;
	background-color:;
}
tr :hover
{
	background-color: ;
	
}
.contentofreply
{
	margin-top: 10%;
	margin-left: 40%

}

  </style>
<script>
function ps()
{
			var con=document.forms["reply"]["ID"].value;
			var cnt=/^[0-9]+$/;

			if(con=="" || con==null)
			{
				alert("Enter the ID");
				return false;		
			}

			else if(!cnt.test(con))
				{
					alert(" Only digits are allowed");
					return false;		
				}
			else
			{
				alert("Cancellation request is under process");
				document.reply.submit();
				return true;
			}		
		}

</script>
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
            <li><a href="#">Cancellation</a></li>
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

<table border="2" align="left" style="line-spacing: 200; border-collapse: collapse; background-color: white; margin-left:80px; margin-top: 30px; padding: 5px; border-spacing: 3px;">
   <tr>
		<th>ID</th>
		<th>NAME</th>
      <th>SOURCE</th>
      <th>DESTINATION</th>
	  <th>DATE OF JOURNEY</th>
      <th>FLIGHT</th>
      <th>CLASS</th>
	  <th>TOTAL</th>
	  
	</tr>
 <?php
 $name = $_SESSION['user'];
$connect = mysqli_connect('localhost','root','','airlinefinal') or die("Something Went Wrong");
$query3 = mysqli_query($connect,"SELECT * FROM booking where name = '$name' ");
    while ($row=mysqli_fetch_assoc($query3))
    {
		echo "<tr>";
		echo "<td>" . $row['ID'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['source'] . "</td>";
		echo "<td>" . $row['destination'] . "</td>";
		echo "<td>" . $row['doj'] . "</td>";
		echo "<td>" . $row['flight'] . "</td>";
		echo "<td>" . $row['class'] . "</td>";
		echo "<td>" . $row['total'] . "</td>";
		echo "</tr>";	
	
    }
	?>
</table>
<div class="contentofreply">
		<form action='delete.php' method='post' id="reply" name="reply">
		<input type="text" id="ID" name="ID" width="25px;" placeholder="ENTER ID" style="display: block;"/>
		<span><input type='submit' id='submit' onclick="return ps();" value='CANCEL TICKET' style='display: block; background-color: #3399FF;border: 1px solid black; padding: 2px;'/></span>
		</form>
	</div>


<footer class="footer-distributed">
		   <div class="footer-left">

				<h3>Flying<span>Star</span></h3>



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
