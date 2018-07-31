<?php

//Form Data
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$mname = $_POST['middlename'];
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email1'];
$phone = $_POST['phone'];
$address = $_POST['address'];

//Database login information
$server = 'localhost';
$dbname = 'survey_db_2018';
$tbl_name = 'users';
$username = 'root';
$password = '';
$conn = mysqli_connect($server,$username,$password,$dbname) or die('Something went wrong');

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($conn, $server);
$sql = "INSERT INTO $tbl_name(fname , mname , lname , user_id , password , email , phone, address) VALUES ('$fname' , '$mname' , '$lname' , '$user' , '$pass' , '$email' , '$phone' , '$address')";
$result = mysqli_query($conn,$sql);
if($result)
{
	echo "<script>alert('Successfully Registered!'); window.location.href='/team_project/Home.php';</script>";
	}
else 
{
	echo "<script>alert('Username already exists! Please try again!'); window.location.href='/team_project/register.php';</script>";
}

mysqli_close($conn);
?>
