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
<?php
if(isset($_POST['submitted1']))
{
$connect = mysqli_connect("localhost","root","","airlinefinal") or die("Something Went Wrong");
$query = mysqli_query($connect,"INSERT INTO booking (name, source, destination, doj, flight, class, at, st, ct) VALUES ('$user','$source', '$destination', '$doj', '$flight', '$class' ,'$at', '$st', '$ct')");
header("location: customerhomepage.php");
}
?>
<?php
	if(isset($_POST['submitted']))
	{
		$GLOBALS['name'] = $_SESSION['user'];
		$GLOBALS['source'] = $_POST['source'];
		$GLOBALS['destination'] = $_POST['destination'];
		$GLOBALS['doj'] = $_POST['doj'];
		$GLOBALS['flight'] = $_POST['flight'];
		$GLOBALS['class'] = $_POST['class'];
		$GLOBALS['at'] = $_POST['at'];
		$GLOBALS['st'] = $_POST['st'];
		$GLOBALS['ct'] = $_POST['ct'];
		if(empty($source) || empty($destination) || empty($doj) || empty($flight) || empty($class))
		{
			echo "<script>";
			echo "alert('INCOMPLETE FIELDS')";
			echo "</script>";
			header("location: booking.php");
		}
		else
		{
			
			$connect = mysqli_connect("localhost","root","","airlinefinal");
			
		$query2 = mysqli_query($connect,"SELECT * FROM flight_details where Name = '$flight'");
			while ($row=mysqli_fetch_array($query2))
			{
				$fno = $row['Flight_no'];
				$fname = $row['Name'];
				$stc = $st * $row['st'];
				$atc = $at * $row['at'];
				$ctc = $ct * $row['ct'];
				$time = $row['time'];
				$total = $stc + $atc + $ctc;	
			}
			mysqli_query($connect,"INSERT INTO booking (name, source, destination, doj, flight, class, total) VALUES ( '$name','$source','$destination','$doj','$flight','$class','$total')");
		}
	}
?>
<html>
<style type="text/css">
fieldset
{
	width: 40%;
	height 50%;
	float: left;
	margin-left: 30%;
	line-height: 2em;
	box-shadow: 8px 8px gray;
	margin-top: 100px;
}
label
{
	font-weight: bold;
	color: darkred;
	margin-right: 20px;
}
</style>
<head><title>Confirm Booking</title>

}
</script>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="header1.css">
  </head>
<body>
<fieldset align="center" width="300" height="400">
<h2>SUMMARY OF YOUR BOOKING</h2>
<div id="ticket">
<h3><font style="font-family: 'Josefin Sans', sans-serif;"><b>FlyingStar</b></font></h3>
<form name="confirm" id="confirm" action="customerhomepage.php" onload="window.print()" align="center" width="300" height="400">
<label>USER NAME : </label><?php echo $user;?><br>
<label>SOURCE : </label><?php echo $source;?><br>
<label>DESTINATION :</label> <?php echo $destination;?><br>
<label>DATE : </label><?php echo $doj;?><br>
<label>FLIGHT : </label><?php echo $flight;?><br>
<label>TIME : </label><?php echo $time;?><br>
<label>TOTAL FARE :</label><?php echo $total;?><br>
<input type="hidden" value="submit" name="true">
</div>>
<input type="submit" onclick="alert('YOUR BOOKING IS UNDER PROCESS')" value="CONFIRM" name="submit">
<input type="button" value="PRINT" onclick="window.print();" target="_blank" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="booking.php">CANCEL</a>

</fieldset>
</body>
</html>
