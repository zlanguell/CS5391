<?php 
include 'utility.php';
//session_start();
$uName = $_SESSION['user'];
//$uName = "JKFen";
//$uName = "estewart";


 
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
			
			
			if($trip["feedback_id"] != NULL){				
			//Get Feedback
			$feedbackId = $trip["feedback_id"];
			$sql = "Select * FROM feedback WHERE feedback_id = '$feedbackId'";
			$feedbackTripInfo = mysqli_query($conn, $sql);
			$feedbackTrip = $feedbackTripInfo->fetch_array(MYSQLI_ASSOC);
			$feedback = $feedbackTrip["comments"] . "<br /> <br />" . $feedbackTrip["rating"] . " / 10";
			}
			else{$feedback = "";}
			
			
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
				"num_travelers"=>$trip["num_travelers"],
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
				"feedback" =>$feedback
				//"feedback"=>$feedbackTrip["comments"] . "<br /> <br />" . $feedbackTrip["rating"] . " / 10"
				//"feedback_comments"=>$feedbackTrip["comments"],
				//"feedback_rating" =>$feedbackTrip["rating"]
			);
			
			array_push($trips, $record);
		}
}
mysqli_close($conn);
?>

<?php 
echo get_header(); ?>
<html>

<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:700' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="css/footer.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="css/header1.css">
  	<link rel="stylesheet" type="text/css" href="css/page.css">
	
	
	<style>
		#background{
	    background: url(images/h3.jpg);
	    width: 100%;
	    height: auto;
	    background-size: cover;
	    background-position: center center;
	    background-attachment: fixed;
		}	
		.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }

		.navbar{
	  	border-radius: 0px !important;
	  	margin-bottom: 0px;
		}

		#login-form{
			padding-top: 6%;
			padding-bottom: 10%;
			background: rgba(0,0,0,.7)
		}

		.register-panel, .panel-default>.panel-heading, .panel .body{
	 		background: rgba(0,0,0,0.4);
	   	color: white;
		}

		.panel .body{
			padding: 15px;
		}
		.home-panel{
			background: rgba(0,0,0,0.4);
			color: white;
		}
		
		.panel{
			margin-bottom: 0;
		}
	</style>
	<title> TravelCo Account Page </title>
	<body>
	<div class="container-fluid" id="background">
	<div class="container padding-top-10"  id="login-form">
<!-- Account Information Table -->
<p align = "center" style="color: white;"><span><strong><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">Account Information</font></strong><i class="fas fa-user fa-3x" style="margin-left: 20px"></i></span></p>
<p style="color: white;"><span><strong><font size="6px" style="font-family: 'Josefin Sans', sans-serif;">User Information</font></strong></span></p>
<table border="3" height="120">
<tbody>
<tr>
<td align = "center" style="color: white;"><strong>Username</strong></td>
<td align = "center" style="color: white;"><strong>First Name</strong></td>
<td align = "center" style="color: white;"><strong>Middle Name</strong></td>
<td align = "center" style="color: white;"><strong>Last Name</strong></td>
<td align = "center" style="color: white;"><strong>Address</strong></td>
<td align = "center" style="color: white;"><strong>Phone Number</strong></td>
<td align = "center" style="color: white;"><strong>Email</strong></td>
<td align = "center" style="color: white;"><strong>Mileage</strong></td>
</tr>
<?php
	/*Test Account
	$accInfo = array("USERID", "myName", "John", "J", "Doe", "1234 Fake Street San Marcos, TX 78666", "jjDoe@gmail.com", 
			array("Visa", "12345678901234", "11/20"));*/
	$acc = $accInfo->fetch_array(MYSQLI_ASSOC);
	echo "<tr>";					     
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["user_id"] . "</td>"; 		 /*<!-- Username    -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["fname"] . "</td>";   		 /*<!-- First Name  -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["mname"] . "</td>";   		 /*<!-- Midd Name   -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["lname"] . "</td>";   		 /*<!-- Last Name   -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["address"] . "</td>"; 		 /*<!-- Address     -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["phone"] . "</td>";   		 /*<!-- Phone Number-->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["email"] . "</td>";   		 /*<!-- Email       -->*/
	echo "<td align = \"center\" style=\"color: white;\">" . $acc["mileage"] . "</td>";   		 /*<!-- Mileage     -->*/	
	echo "<td align = \"center\" style=\"color: white;\"><a href=\"updateAccountInfo.php\">change</a></td>";
	echo "</tr>";
?>
</tbody>
</table>


<!-- Credit Card Information Table -->
<p style="color: white; padding-top: 5%;"><span><strong><font size="6px" style="font-family: 'Josefin Sans', sans-serif;">Credit Card Information</font></strong></span></p>
<table border="3" height="120">
<tbody>
<tr>
<td align = "center" style="color: white;"><strong>CC Type</strong></td>
<td align = "center" style="color: white;"><strong>CC Number</strong></td>
<td align = "center" style="color: white;"><strong>Expiration Date</strong>(mm/yy)</td>
</tr>
<?php
//$ccInfo = $accInfo[7];
$cc = $ccInfo->fetch_array(MYSQLI_ASSOC);
echo "<tr>";
echo "<td align = \"center\" style=\"color: white;\">" . $cc["creditcard_type"] . "</td>";  /*<!-- CC Type     -->*/
echo "<td align = \"center\" style=\"color: white;\">" . $cc["creditcard"] . "</td>";   /*<!-- CC Num      -->*/
echo "<td align = \"center\" style=\"color: white;\">" . $cc["Exp_date"] . "</td>";     /*<!-- CC Expr     -->*/
echo "<td align = \"center\" style=\"color: white;\"><a href=\"addRemoveCC.php\">add/remove</a></td>";
echo "</tr>";
?>

</tbody>
</table>


<!-- Trip Information Table -->
<p style="color: white; padding-top: 5%;"><span><strong><font size="6px" style="font-family: 'Josefin Sans', sans-serif;">Trip Information</font></strong></span></p>
<table border="3" height = "120">
<tbody>
<tr>
<td align = "center" style="color: white;"><p><strong>Trip Number</strong></p></td>
<td align = "center" style="color: white;"><p><strong>Number of Travelers</strong></p></td>
<td align = "center" style="color: white;"><strong>Hotel</strong></td>
<td align = "center" style="color: white;"><strong>Check-in</strong></td>
<td align = "center" style="color: white;"><strong>Check-out</strong></td>
<td align = "center" style="color: white;"><strong>Airline</strong></td>
<td align = "center" style="color: white;"><strong>Departure Airport</strong></td>
<td align = "center" style="color: white;"><strong>Dept. Date/Time</strong></td>
<td align = "center" style="color: white;"><strong>Arrival Airport</strong></td>
<td align = "center" style="color: white;"><strong>Arrival Dept. Date/Time</strong></td>
<td align = "center" style="color: white;"><strong>Flight Status</strong></td>
<td align = "center" style="color: white;"><strong>Feedback</strong></td>
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
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["trips_id"] . "</td>"; 		/*<!-- Trip Number   	-->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["num_travelers"] . "</td>"; 	/*<!-- Number Travelers	-->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["hotel_name"] . "</td>"; 		/*<!-- Hotel Name    	-->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["hotel_check_in"] . "</td>"; 	/*<!-- Hotel Check-in      -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["hotel_check_out"] . "</td>"; /*<!-- Hotel Check-out   -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["airline_name"] . "</td>"; 	/*<!-- Airline Name    -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["dept_airport"] . "</td>"; 	/*<!-- Departure Airport -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["dept_date"] . "  at  " . $tripRecord["dept_time"] ."</td>"; 		/*<!-- Departure Date/Time  -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["arr_airport"] . "</td>"; 									/*<!-- Arrival Airport   -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["arr_date"] . "  at  " . $tripRecord["arr_dept_time"] ."</td>"; 	/*<!-- Airline Name    -->*/
		echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["flight_status"] . "</td>"; 									/*<!-- Flight Status   	-->*/
		
		if($tripRecord["feedback"] != ""){
			echo "<td align = \"center\" style=\"color: white;\">" . $tripRecord["feedback"] . "</td>"; /*<!-- Feedback  -->*/
		}
		
		else{ 
			$tripid = $tripRecord["trips_id"];
			$_SESSION['tripRecord' . $tripid] = $tripRecord;
			echo "<td align = \"center\"><a href=\"feedback.php?tripid=$tripid\">leave feedback</a></td>";
			}
		echo "</tr>";
	}

?>
</tbody>
</table>
</div>
</div>
</body>
<?php
echo get_footer(); ?>
</html>