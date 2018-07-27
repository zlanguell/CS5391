<?php /*

session_start();
$uName = $_POST['uName'];
 
$conn = mysqli_connect("localhost","root","","airlinefinal");
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname,$conn);
$sql = "SELECT * FROM userTable WHERE userName = uName";
$accInfo = mysql_query($sql,$conn);
$userID = $accInfo[0];

$sql = "SELECT * FROM tripTable WHERE uID = $userID";
$trips = mysql_query($sql,$conn);

mysql_close($conn);
*/?>



<!-- Account Information Table -->
<p><span><strong>Account Information</strong></span></p>
<table border="1" height="120">
<tbody>
<tr>
<td><strong>Username</strong></td>
<td><strong>First Name</strong></td>
<td><strong>Middle Name</strong></td>
<td><strong>Last Name</strong></td>
<td><strong>Address</strong></td>
<td><strong>Email</strong></td>
</tr>
<?php
	/*Test Account*/
	$accInfo = array("USERID", "myName", "John", "J", "Doe", "1234 Fake Street San Marcos, TX 78666", "jjDoe@gmail.com", 
			array("Visa", "12345678901234", "11/20"));

	echo "<tr>";
										 /*<!-- User ID     -->*/
	echo "<td>" . $accInfo[1] . "</td>"; /*<!-- Username    -->*/
	echo "<td>" . $accInfo[2] . "</td>"; /*<!-- First Name  -->*/
	echo "<td>" . $accInfo[3] . "</td>"; /*<!-- Midd Name   -->*/
	echo "<td>" . $accInfo[4] . "</td>"; /*<!-- Last Name   -->*/
	echo "<td>" . $accInfo[5] . "</td>"; /*<!-- Address     -->*/
	echo "<td>" . $accInfo[6] . "</td>"; /*<!-- Email       -->*/
	echo "<td><a href=\"updateAccountInfo.php\">change</a></td>";
	echo "</tr>";
?>
</tbody>
</table>


<!-- Credit Card Information Table -->
<p><strong><span>Credit Card Information</span></strong></p>
<table border="1" height="120">
<tbody>
<tr>
<td><strong>CC Type</strong></td>
<td><strong>CC Number</strong></td>
<td><strong>Expiration Date</strong>(mm/yyyy)</td>
</tr>
<?php
$ccInfo = $accInfo[7];

echo "<tr>";
echo "<td>" . $ccInfo[0] . "</td>";
echo "<td>" . $ccInfo[1] . "</td>";
echo "<td>" . $ccInfo[2] . "</td>";
echo "<td><a href=\"addRemoveCC.php\">add/remove</a></td>";
echo "</tr>";
?>

</tbody>
</table>


<!-- Trip Information Table -->
<p><strong><span>Trip Information</span></strong></p>
<table border="1" height = "120">
<tbody>
<tr>
<td><p><strong>Trip Number</strong></p></td>
<td><strong>Start Date</strong></td>
<td><strong>End Date</strong></td>
<td><strong>Flight Information</strong></td>
<td><strong>Hotel Information</strong></td>
<td><strong>Feedback</strong></td>
</tr>
<?php
	/*Test Trip*/
	$trips = array
	(
		array("1234","USERID", "06/07/08", "06/09/08", "UA6574", "H56789", "****"),
		array("4567","USERID", "09/20/09", "10/15/09", "AA1298", "H54321", "")
	);
	
	foreach($trips as $trip) {
		echo "<tr>"; 
		echo "<td>" . $trip[0] . "</td>"; /*<!-- Trip Number   -->*/
										  /*<!-- User ID       -->*/
		echo "<td>" . $trip[2] . "</td>"; /*<!-- Start Date    -->*/
		echo "<td>" . $trip[3] . "</td>"; /*<!-- End Date      -->*/
		echo "<td>" . $trip[4] . "</td>"; /*<!-- Flight Info   -->*/
		echo "<td>" . $trip[5] . "</td>"; /*<!-- Hotel Info    -->*/
		if($trip[6] != ""){
			echo "<td>" . $trip[6] . "</td>"; /*<!-- Feedback  -->*/
		}
		else{ echo "<td><a href=\"feedback.php\">leave feedback</a></td>";}
		echo "</tr>";
   }
?>
</tbody>
</table>