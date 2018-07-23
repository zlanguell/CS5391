<?php
		$connect=mysqli_connect("localhost","root","","airlinefinal")or die("Server not found");
			//	mysql_select_db("ovs") or die("Database not found");
		$query = mysqli_query($connect,"SELECT ID FROM booking");
	if(isset($_POST['ID']))
	{
		if($ID = $_POST['ID'])
		{
			while ($row=mysqli_fetch_assoc($query))
			{
				if($row['ID']==$ID)
				{
					if($del = mysqli_query($connect,"DELETE FROM booking where ID = '$ID' "))
					{
						echo "<script>";
						echo "alert('')";
						echo "</script>";
						header("location: cancelticket.php");
					}
				}
			}
		}
		mysqli_close($connect);
	}
		?>