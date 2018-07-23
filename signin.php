<?php 
$connect = mysqli_connect("localhost","root","","airlinefinal") or die('Something went wrong');
//mysql_select_db($dbname,$conn);
if(isset($_POST['submitted']))
{
	/*$user=htmlspecialchars($user);
	$pass=htmlspecialchars($pass);*/
	$user = $_POST['username'];
	$pass = $_POST['password'];

//mysqli_select_db("$dbname")or die("cannot select DB");


// To protect MySQL injection (more detail about MySQL injection)
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);
$nouser="";
	if(empty($user) || empty($pass))
	{
		echo "<script>";
		echo "alert('INCOMPLETE FIELDS')";
		echo "</script>";
	}
	else
	{
		$query = mysqli_query($connect,"select username, password from signup");
		if($query)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				if($row['username'] == $user)
				{
					if($row['password'] == $pass)
					{
						$nouser = '1';
						session_start();
						$_SESSION["user"]= $user;
						$_SESSION["login"]= true;
						header("location: customerhomepage.php");
					}
					else
					{
						echo '<script language="javascript">';
						echo'alert("Incorrect password")';
						echo '</script>';
						exit;
					}
				}
			}
			if($nouser!='1')
			{
				echo "<script>";
				echo "alert('No such user registered')";
				echo "</script>";
				exit;
			}
			
		}
		else
		{
				echo '<script language="javascript">';
				echo'alert("Something went wrong - Try again")';
				echo '</script>';
			
		}
	
	}	
}
?>