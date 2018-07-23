<?php
$fno = $_POST['flightno'];
$flname = $_POST['flightname'];
$st = $_POST['st'];
$at = $_POST['at'];
$ct = $_POST['ct'];
$time = $_POST['time'];

 
$conn = mysqli_connect("localhost","root","","airlinefinal");
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname,$conn);
$sql = "INSERT INTO $tbl_name(Flight_no , Name , st , at , ct , time) VALUES ('$fno' , '$flname' , '$st' , '$st' , '$ct' , '$time')";
$result = mysql_query($sql,$conn);
if($result)
{
	echo "<script>";
	echo "alert('You have successfully addded the flight')";
	header('location:flightadding.php');
	}
else 
{
	echo "nt added";
}

mysql_close($conn);
?>
