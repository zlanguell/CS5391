<?php
	session_start();
	include 'utility.php';
	
	//$uName = $_SESSION['user'];
	//$flightRecord = $_SESSION["flightSelection"];
	//$hotelRecord = $_SESSION["hotelSelection"];
	$uName = "JKFen";
	$flightRecords = array( array("num_travelers"=>"2", "airline_name"=>"Delta", "flight_no"=>"D4365", "cabin"=>"Economy", "fare_mileage"=>"25000",
								"dept_airport"=>"AUS", "dept_city"=>"Austin", "dept_date"=>"10/10/2018", "dept_time"=>"06:30 am",
								"arr_airport"=>"IND", "arr_city"=>"Indianapolis", "arr_date"=>"10/10/2018", "arr_dept_time"=>"10:30 am", "fare_dollars"=>"250"
								)
						);
	
	$hotelRecord = array("num_rooms"=>"2", "hotel_name"=>"Holiday Inn", "hotel_address"=>"Austin, TX", "room_id"=>"Queen",
								"hotel_check_in"=>"10/10/2018", "hotel_check_out"=>"10/13/2018", "price"=>"175"							
							);
	
	
	$conn = mysqli_connect("localhost","root","","survey_db_2018");
	if (mysqli_connect_errno()) {
		die('Could not connect: ' . mysqli_connect_error());
	}
	//mysql_select_db($dbname,$conn);
	$sql = "SELECT * FROM users WHERE user_id = '$uName'";
	$result = mysqli_query($conn, $sql);
	$accInfo = $result->fetch_array(MYSQLI_ASSOC);
	if(isset($_POST["Submit"])){		
		if(isset($_POST["hotel_name"])){		
			//LOAD HOTEL INFO INTO DATABASE
			$sql = "INSERT INTO hotel_transactions ( user_id, creditcard, amount)
				VALUES('$uName', '$creditcard', '$total')";
			if (mysqli_query($conn, $sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo "hotel_transactions table updated successfully";
			} else {
				echo "Error inserting hotel transaction: " . $conn->error;
			}
			
			$sql = "INSERT INTO hotel_bookings ( htrans_id, check_in, check_out, hotel_id)
				VALUES('$last_id', '$check_in', '$check_out', '$hotel_id')";				
			if (mysqli_query($conn, $sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo "hotel_bookings table updated successfully";
			} else {
				echo "Error updating hotel_bookings: " . $conn->error;
			}
			
			$num = $_POST["num_rooms"];
			$sql = "INSERT INTO trips ( hbook_id, user_id, num_travelers)
				VALUES('$last_id', '$uName', '$num')";				
			if (mysqli_query($conn, $sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo "trips table insert successfully";
			} else {
				echo "Error updating trips: " . $conn->error;
			}
			$tripRecordUpdated = $last_id;
		}
		
		//UPDATE FLIGHT DATABASE INFO
		if(isset($_POST["airline"])){
			
			//INSERT INTO FLIGHT_TRANSACTIONS
			$sql = "INSERT INTO flight_transactions ( user_id, creditcard, amount)
				VALUES('$uName', '$creditcard', '$total')";
			if (mysqli_query($conn, $sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo "flight_transactions table updated successfully";
			} else {
				echo "Error inserting flight transaction: " . $conn->error;
			}
			
			//UPDATE FLIGHT BOOKINGS TABLE
			$sql = "INSERT INTO flight_bookings ( trans_id, flight_id)
				VALUES('$last_id', '$flight_id')";				
			if (mysqli_query($conn, $sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo "flight_bookings table updated successfully";
			} else {
				echo "Error updating flight_bookings: " . $conn->error;
			}
			
			//UPDATE TRIPS TABLE IF HOTEL, INSERT IF NO HOTEL
			if(isset($_POST["hotel_name"])){ //HOTEL CREATED TRIP, UPDATE TRIP
				$sql = "UPDATE trips SET fbook_id='$last_id' WHERE trips_id = '$tripRecordUpdated'";								
				if (mysqli_query($conn, $sql) === TRUE) {
					$last_id = $conn->insert_id;
					echo "trips table update successfully";
				} else {
					echo "Error updating trips: " . $conn->error;
				}
			}
			else{ // NO HOTEL MUST INSERT
				$num = $_POST["num_travelers"];
				$sql = "INSERT INTO trips ( fbook_id, user_id, num_travelers)
					VALUES('$last_id', '$uName', '$num')";				
				if (mysqli_query($conn, $sql) === TRUE) {
					$last_id = $conn->insert_id;
					echo "trips table insert successfully";
				} else {
					echo "Error updating trips: " . $conn->error;
				}
			}
			
			//UPDATE USER MILEAGE IN USERS TABLE
			$sql = "UPDATE users SET mileage='$userMileage' WHERE user_id='$uName'";
			if (mysqli_query($conn, $sql) === TRUE) {
					$last_id = $conn->insert_id;
					echo "users table updated successfully";
			} else {
				echo "Error updating users: " . $conn->error;
			}
			
			//UPDATE SEATS_AVAIL TABLE
			$flightID = '$_POST["flight_id"]';
			$sql = "SELECT * FROM seats_avail WHERE flight_id = $flightID";
			$seatsRecord = mysqli_query($conn, $sql);
			$seats = $seatsRecord->fetch_array(MYSQLI_ASSOC);
			if($_POST["cabin_type"]== "economy"){
				$currentSeats = $seats["eco_seats_remaining"];
				$newSeats = $currentSeats - $_POST["num_travelers"];
				$sql = "UPDATE seats_avail SET eco_seats_remaining='$newSeats' WHERE flight_id='$flightID'";				
			}
			else{
				$currentSeats = $seats["first_seats_remaining"];
				$newSeats = $currentSeats - $_POST["num_travelers"];
				$sql = "UPDATE seats_avail SET first_seats_remaining='$newSeats' WHERE flight_id='$flightID'";				
			}
			if (mysqli_query($conn, $sql) === TRUE) {
					$last_id = $conn->insert_id;
					echo "seats_avail table updated successfully";
				} else {
					echo "Error updating seats_avail: " . $conn->error;
				}
		}
		
		$conn->close();	
		//$_SESSION["trips_Record"] = array("trips_id"=>'$tripRecordUpdated');
		echo '<meta http-equiv="refresh" content="0;URL=feedback.php" />';
	}	
	
?>
<html>

	<head>
  	<title>TravelCo</title>
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
  	<link rel="stylesheet" type="text/css" href="css/login.css">

	<style>
		#background{
	    <!--background: url(images/flight1.jpg);-->
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
		}

		.register-panel, .panel-default>.panel-heading, .panel .body{
	 		background: rgba(0,0,0,0.4);
	   	color: white;
		}

		.panel .body{
			padding: 15px;
		}

		.panel{
			margin-bottom: 0;
		}
		
		legend {			 
			color: #FFFFFF;		
		}
		
	</style>
	<script type="text/Javascript">
		function validate()
		{
			if(document.feedback.rating.value=="")
			{
				alert("Please select a rating");
				document.feedback.rating.focus();
				return false;
			}
			
			if(document.feedback.comments.value=="")
			{
				alert("Please enter comments");
				document.feedback.comments.focus();
				return false;
			}
			
		}
	</script>

	</head>

	<body>
	<?php echo get_header();?>
	<div class="container-fluid" id="background">
		<div class="container padding-top-10"  id="login-form"> 
			<div class="panel panel-default register-panel">
				<div class="panel-heading" align = "center">
					<b><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">Confirmation</font></b>				
				</div>
				<div class="panel body">
					<?php
						if($flightRecords){
							foreach($flightRecords as $flightRecord){
							echo '<table border="1" bordercolor="ffffff" height = "120" color = "white">';
							echo '<tbody>';
							echo '<tr>';					
							echo '<td align = "center" style="color: white;"><p><strong>Travelers</strong></p></td>';				
							echo '<td align = "center" style="color: white;"><strong>Flight</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Cabin</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Departure Airport</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Dept. Date/Time</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Arrival Airport</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Arrival Dept. Date/Time</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Fare(before taxes + fees)</strong></td>';
							echo '</tr>';				
				
							echo "<tr>";					
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["num_travelers"] . "</td>";					
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["airline_name"] . " Flight " . $flightRecord["flight_no"] . "</td>"; 
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["cabin"] . "</td>";
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["dept_airport"] . ", " . $flightRecord["dept_city"] . "</td>"; 	
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["dept_date"] . "  at  " . $flightRecord["dept_time"] ."</td>"; 		
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["arr_airport"]. ", " . $flightRecord["arr_city"] . "</td>"; 									
							echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord["arr_date"] . "  at  " . $flightRecord["arr_dept_time"] ."</td>"; 
							echo "<td align = \"center\" style=\"color: white;\">" . "$" . $flightRecord["fare_dollars"] . "</td>"; 
							echo "</tr>";				
							
							echo '</tbody>';
							echo '</table>';				
							echo '<br><br>';
							}
						}
					?>
					<?php
						if($hotelRecord){
							echo "<table border=\"1\" bordercolor=\"ffffff\" height = \"120\" color = \"white\">";
							echo "<tbody>";
							echo "<tr>";					
							echo '<td align = "center" style="color: white;"><p><strong>Rooms</strong></p></td>';
							echo '<td align = "center" style="color: white;"><strong>Hotel</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Room Type</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Check-in</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Check-out</strong></td>';
							echo '<td align = "center" style="color: white;"><strong>Per Night</strong></td>';							
							echo '</tr>';
							
							echo "<tr>"; 					
							echo "<td align = \"center\" style=\"color: white;\">" . $hotelRecord["num_rooms"] . "</td>"; 	/*<!-- Number Travelers	-->*/
							echo "<td align = \"center\" style=\"color: white;\">" . $hotelRecord["hotel_name"] . " at " . $hotelRecord["hotel_address"]. "</td>"; 		/*<!-- Hotel Name    	-->*/
							echo "<td align = \"center\" style=\"color: white;\">" . $hotelRecord["room_id"] . "</td>"; 
							echo "<td align = \"center\" style=\"color: white;\">" . $hotelRecord["hotel_check_in"] . "</td>"; 	/*<!-- Hotel Check-in      -->*/
							echo "<td align = \"center\" style=\"color: white;\">" . $hotelRecord["hotel_check_out"] . "</td>"; /*<!-- Hotel Check-out   -->*/										
							echo "<td align = \"center\" style=\"color: white;\">" . "$" . $hotelRecord["price"] . "</td>"; 
							echo "</tr>";
				
							echo '</tbody>';
							echo '</table>';
							echo '<br><br>';
						}
					?>
					<?php
						echo '<br><br>';
						echo '<table border="1" bordercolor="ffffff" height = "120" color = "white">';
						echo '<tbody>';							
							echo "<tr>";
								if($flightRecord){
									echo '<td align = "center" style="color: white;"><strong> Airline Cost </strong></td>';
								}
								if($hotelRecord){
									echo '<td align = "center" style="color: white;"><strong> Hotel Cost </strong></td>';
								}									
								echo '<td align = "center" style="color: white;"><strong> Tax + Fees </strong></td>';
								echo '<td align = "center" style="color: white;"><strong> Total </strong></td>';	
							echo "</tr>";
							
							echo "<tr>";
								$totalFlight = 0;
								$totalHotel = 0;
								if($flightRecord){
									$totalFlight = $flightRecord["num_travelers"] * $flightRecord["fare_dollars"];
									echo '<td align = "center" style="color: white;">' . "$" . $totalFlight . '</td>';
								}									
								if($hotelRecord){
									$totalHotel = $hotelRecord["num_rooms"] * $hotelRecord["price"];
									echo '<td align = "center" style="color: white;">' . "$" . $totalHotel . '</td>';
								}
								$taxTotal = ($totalFlight + $totalHotel)*0.15;
								echo '<td align = "center" style="color: white;">' . "$" . $taxTotal . '</td>';
								$total = $taxTotal + $totalHotel +$totalFlight;
								echo '<td align = "center" style="color: white;">' . "$" . $total . '</td>';
							echo "</tr>";
							
						echo '</tbody>';
						echo '<table>';
					?>
								
					<br>
					<form name="confirmation" action="confirmation.php" onsubmit="return validate()" method="post">					
						<br>
						<fieldset class="rating">
						<legend>Please Select a Payment Method:</legend>						
						<input type="radio" id="creditCardMethod" name="credit card" value="1" />
						<label for="creditCardMethod" style="padding-right: 3em;">Credit Card</label>
						<?php
							$userMileage = $accInfo["mileage"];
							$perTicketMileage = $flightRecord["fare_mileage"];
							$totalMileageCost = $flightRecord["fare_mileage"] * $flightRecord["num_travelers"];
							if($userMileage > 0){							
								$counter = $flightRecord["num_travelers"];
							}								
														
							while(($userMileage > $perTicketMileage)&&($counter > 0)){
								$userMileage = $userMileage - $perTicketMileage;
								echo "<br>";
								echo '<input type="radio" id="mileageMethod" name="mileage" value="'. $counter . '" />';
								echo '<label for="mileageMethod" title="Tickets" style="padding-right: 3em;">' . $counter . ' ticket(s) via mileage</label>';
								$counter--;
							}														
						?>
						</fieldset>				
			
			<div class="row padding-top-10">
				<div class="col-sm-offset-5 col-sm-10">
					<button type="Submit" data-toggle="tooltip" name="Submit" data-placement="right" title="Submit" class="btn btn-primary">CONFIRM</button>					
				</div>				
			</div>				
		</form>
	</div>
	</div>
</div>
</div>

</body>
</html>
<?php echo get_footer();?>