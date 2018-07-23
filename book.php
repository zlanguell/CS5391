<?php
echo "".$GLOBALS['name'];
if(isset($_POST['submit']))
{
$connect = mysqli_connect("localhost","root","","airlinefinal") or die("Something Went Wrong");
$name = $GLOBALS['name'];
$source = $GLOBALS['source'];
$destination = $GLOBALS['destination'];
$doj = $GLOBALS['doj'];
$flight = $GLOBALS['flight'];
$total = $GLOBALS['total'];
if(mysqli_query($connect,"INSERT INTO booking (name, source, destination, doj, flight, class, total) VALUES ( '$name','$source','$destination','$doj','$flight','$total')"))
{
header("location: customerhomepage.php");
}
else
{
	echo "Something went wrong";
}
}
?>