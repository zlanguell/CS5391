<?php/*

$tbl_name = "tripTable";
$tripID = $_POST['tripID'];

$conn = mysqli_connect("localhost","root","","airlinefinal");
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$sql = "INSERT INTO $tbl_name(feedback) VALUES ('$uFeedback') WHERE tripNumber == $tripID";
$result = mysql_query($sql,$conn);
if($result)
{
	echo "<script>";
	echo "alert('Feedback Updated!')";
	header('location:userAccountPage.php');
}
else 
{
	echo "Error leaving feedback...";
}



mysql_close($conn);

*/?>