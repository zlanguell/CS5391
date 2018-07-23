<?php
#phpinfo();

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['eid'];
$mobile = $_POST['mob'];
$server = 'localhost';
$dbname = 'airlinefinal';
$tbl_name = 'signup';
$username = 'root';
$password = '';
#$conn = mysqli_connect($server,$username,$password);
$conn = mysqli_connect($server,$username,$password,$dbname) or die('Something went wrong');

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($conn,$dbnames);
$sql = "INSERT INTO $tbl_name(fname , lname , username , password , email , mobile) VALUES ('$fname' , '$lname' , '$user' , '$pass' , '$email' , '$mobile')";
$result = mysqli_query($conn,$sql);
if($result)
{
	echo "<script>";
	echo "alert('You have successfully registered')";
	header('location:login.php');
	}
else 
{
	echo "not added";
}

mysqli_close($conn);
?>
