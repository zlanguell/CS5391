<?php 

session_start();
//$uName = $_POST['uName'];
$uName = "JKFen";

 
$conn = mysqli_connect("localhost","root","","survey_db_2018");
if (mysqli_connect_errno()) {
    die('Could not connect: ' . mysqli_connect_error());
}

//mysql_select_db($dbname,$conn);
$sql = "SELECT * FROM users WHERE user_id = '$uName'";
$accInfo = mysqli_query($conn, $sql);


$sql = "SELECT * FROM creditcard WHERE user_id = '$uName'";
$ccInfo = mysqli_query($conn, $sql);


$sql = "SELECT * FROM trips WHERE user_id = '$uName'";
$tripInfo = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($tripInfo);
$trips=array();
if($num_rows > 0){ //If customer took one or more trips
		
		for($i = 0; $i < $num_rows; $i++) { //cycle through each trip
			$trip = $tripInfo->fetch_array(MYSQLI_ASSOC);
			
			//Get all the hotel information
			$hbook_id =$trip["hbook_id"];
			$sql = "SELECT * FROM hotel_bookings WHERE hbook_id ='$hbook_id'";
			$hotelTripInfo = mysqli_query($conn, $sql); //Get hotel information for trip start/end dates
			$hotelTrip = $hotelTripInfo->fetch_array(MYSQLI_ASSOC);
			$hotel_id = $hotelTrip["hotel_id"];
			$sql = "SELECT * FROM hotels WHERE hotel_id = '$hotel_id'";
			$hotelInfo = mysqli_query($conn, $sql); // Get actual hotel stayed in 
			$hotel = $hotelInfo->fetch_array(MYSQLI_ASSOC);
			
			//Get all the flight information
			$fbook_id = $trip["fbook_id"];
			$sql = "SELECT * FROM flight_booking WHERE fbook_id = '$fbook_id'";
			$flightTripInfo = mysqli_query($conn, $sql);
			$flightTrip = $flightTripInfo->fetch_array(MYSQLI_ASSOC);
			$flight_id = $flightTrip["flight_id"];
			$sql = "SELECT * FROM flights WHERE flight_id = '$flight_id'";
			$flightInfo = mysqli_query($conn, $sql);
			$flight = $flightInfo->fetch_array(MYSQLI_ASSOC);
			$airline_id = $flight["airline_id"];
			$sql = "SELECT * FROM airlines WHERE airline_id = '$airline_id'";
			$airlineInfo = mysqli_query($conn, $sql);
			$airline = $airlineInfo->fetch_array(MYSQLI_ASSOC);
			
			//Create trip record for display on user page
			$record = array(
				"trips_id"=>$trip["trips_id"],
				"hotel_name"=>$hotel["name"],				
				"hotel_check_in"=>$hotelTrip["check_in"],
				"hotel_check_out"=>$hotelTrip["check_out"],				
				"airline_name"=>$airline["airline_name"],
				"dept_airport"=>$flight["dept_airport"],
				"dept_date"=>$flight["dept_date"],
				"dept_time"=>$flight["dept_time"],
				"arr_airport"=>$flight["arr_airport"],
				"arr_date"=>$flight["return_date"],
				"arr_dept_time"=>$flight["return_dept_time"],
				"flight_status"=>$flight["flight_status_id"],
				"feedback"=>""
			);
			
			array_push($trips, $record);
		}
}
mysqli_close($conn);
?>

<?php 
include 'utility.php';
echo get_header(); ?>

<!-- Account Information Table -->
<p><span><strong>Account Information</strong></span></p>
<table border="1" height="120">
<tbody>
<tr>
<td align = "center"><strong>Username</strong></td>
<td align = "center"><strong>First Name</strong></td>
<td align = "center"><strong>Middle Name</strong></td>
<td align = "center"><strong>Last Name</strong></td>
<td align = "center"><strong>Address</strong></td>
<td align = "center"><strong>Phone Number</strong></td>
<td align = "center"><strong>Email</strong></td>
<td align = "center"><strong>Mileage</strong></td>
</tr>
<?php
	/*Test Account
	$accInfo = array("USERID", "myName", "John", "J", "Doe", "1234 Fake Street San Marcos, TX 78666", "jjDoe@gmail.com", 
			array("Visa", "12345678901234", "11/20"));*/
	$acc = $accInfo->fetch_array(MYSQLI_ASSOC);
	echo "<tr>";					     
	echo "<td align = \"center\">" . $acc["user_id"] . "</td>"; 		 /*<!-- Username    -->*/
	echo "<td align = \"center\">" . $acc["fname"] . "</td>";   		 /*<!-- First Name  -->*/
	echo "<td align = \"center\">" . $acc["mname"] . "</td>";   		 /*<!-- Midd Name   -->*/
	echo "<td align = \"center\">" . $acc["lname"] . "</td>";   		 /*<!-- Last Name   -->*/
	echo "<td align = \"center\">" . $acc["address"] . "</td>"; 		 /*<!-- Address     -->*/
	echo "<td align = \"center\">" . $acc["phone"] . "</td>";   		 /*<!-- Phone Number-->*/
	echo "<td align = \"center\">" . $acc["email"] . "</td>";   		 /*<!-- Email       -->*/
	echo "<td align = \"center\">" . $acc["mileage"] . "</td>";   		 /*<!-- Mileage     -->*/	
	echo "<td align = \"center\"><a href=\"updateAccountInfo.php\">change</a></td>";
	echo "</tr>";
?>
</tbody>
</table>


<!-- Credit Card Information Table -->
<p><strong><span>Credit Card Information</span></strong></p>
<table border="1" height="120">
<tbody>
<tr>
<td align = "center"><strong>CC Type</strong></td>
<td align = "center"><strong>CC Number</strong></td>
<td align = "center"><strong>Expiration Date</strong>(mm/yyyy)</td>
</tr>
<?php
//$ccInfo = $accInfo[7];
$cc = $ccInfo->fetch_array(MYSQLI_ASSOC);
echo "<tr>";
echo "<td align = \"center\">" . $cc["creditcard_type"] . "</td>";  /*<!-- CC Type     -->*/
echo "<td align = \"center\">" . $cc["creditcard"] . "</td>";   /*<!-- CC Num      -->*/
echo "<td align = \"center\">" . $cc["Exp_date"] . "</td>";     /*<!-- CC Expr     -->*/
echo "<td align = \"center\"><a href=\"addRemoveCC.php\">add/remove</a></td>";
echo "</tr>";
?>

</tbody>
</table>


<!-- Trip Information Table -->
<p><strong><span>Trip Information</span></strong></p>
<table border="1" height = "120">
<tbody>
<tr>
<td align = "center"><p><strong>Trip Number</strong></p></td>
<td align = "center"><strong>Hotel</strong></td>
<td align = "center"><strong>Check-in</strong></td>
<td align = "center"><strong>Check-out</strong></td>
<td align = "center"><strong>Airline</strong></td>
<td align = "center"><strong>Departure Airport</strong></td>
<td align = "center"><strong>Dept. Date/Time</strong></td>
<td align = "center"><strong>Arrival Airport</strong></td>
<td align = "center"><strong>Arrival Dept. Date/Time</strong></td>
<td align = "center"><strong>Status</strong></td>
<td align = "center"><strong>Feedback</strong></td>
</tr>
<?php
	/*Test Trip
	$trips = array
	(
		array("1234","USERID", "06/07/08", "06/09/08", "UA6574", "H56789", "****"),
		array("4567","USERID", "09/20/09", "10/15/09", "AA1298", "H54321", "")
	);*/
	
	foreach($trips as $tripRecord){			
		echo "<tr>"; 
		echo "<td align = \"center\">" . $tripRecord["trips_id"] . "</td>"; 		/*<!-- Trip Number   	-->*/											  
		echo "<td align = \"center\">" . $tripRecord["hotel_name"] . "</td>"; 		/*<!-- Hotel Name    	-->*/
		echo "<td align = \"center\">" . $tripRecord["hotel_check_in"] . "</td>"; 	/*<!-- Hotel Check-in      -->*/
		echo "<td align = \"center\">" . $tripRecord["hotel_check_out"] . "</td>"; /*<!-- Hotel Check-out   -->*/
		echo "<td align = \"center\">" . $tripRecord["airline_name"] . "</td>"; 	/*<!-- Airline Name    -->*/
		echo "<td align = \"center\">" . $tripRecord["dept_airport"] . "</td>"; 	/*<!-- Departure Airport -->*/
		echo "<td align = \"center\">" . $tripRecord["dept_date"] . "  at  " . $tripRecord["dept_time"] ."</td>"; 		/*<!-- Departure Date/Time  -->*/
		echo "<td align = \"center\">" . $tripRecord["arr_airport"] . "</td>"; 									/*<!-- Arrival Airport   -->*/
		echo "<td align = \"center\">" . $tripRecord["arr_date"] . "  at  " . $tripRecord["arr_dept_time"] ."</td>"; 	/*<!-- Airline Name    -->*/
		echo "<td align = \"center\">" . $tripRecord["flight_status"] . "</td>"; 									/*<!-- Flight Status   	-->*/
		
		if($tripRecord["feedback"] != ""){
			echo "<td align = \"center\">" . $tripRecord["feedback"] . "</td>"; /*<!-- Feedback  -->*/
		}
		else{ echo "<td align = \"center\"><a href=\"feedback.php\">leave feedback</a></td>";}
		echo "</tr>";
	}
?>
</tbody>
</table>
<?php 
//include 'utility.php';
echo get_footer(); ?>