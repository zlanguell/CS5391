<?php 
include 'utility.php';
$dealresults = '';
if(isset($_POST['selected-deal']))
{
	if(!empty($_POST['deal'])){
		//get deal number from form
		$dealNum = $_POST['deal'];
		$dealNum--;

		//select corresponding deal row in the deals array
		$selectedDeal = array();
		$selectedDeal = $_SESSION['deals'];

		//pass deal array row to session variable for confirmation
		$_SESSION['passDeals'] = $selectedDeal[$dealNum];
		print_r($_SESSION['passDeals']);
	}
	else
		echo "Deal not selected!!!!!!!!!!!!!!!!!";
}
if(isset($_POST['deals-submit']))
{

	$connect = mysqli_connect("localhost","root","","survey_db_2018") or die('Error Connecting To Databse');
	$sourceCity = $_POST['source'];
	$destCity = $_POST['destination'];
	$startingdate = $_POST['starting-date'];
	$endingdate = $_POST['ending-date'];
	$guests = $_POST['guests'];
	$rooms = $_POST['rooms'];
	$lowrange = $_POST['low'];
	$highrange = $_POST['high'];
	$sourceAirport;
	$destAirport;

	$stmtSource = "SELECT airport_id from airport_detail where city='$sourceCity'";
	$sourceQuery = mysqli_query($connect, $stmtSource);
	if(mysqli_num_rows($sourceQuery) > 0){
		$row = $sourceQuery->fetch_array(MYSQLI_ASSOC);
		$sourceAirport = $row['airport_id'];
		echo $sourceAirport;
	}

	$stmtDest = "SELECT airport_id from airport_detail where city='$destCity'";
	$destQuery = mysqli_query($connect, $stmtDest);
	if(mysqli_num_rows($destQuery) > 0){
		$row = $destQuery->fetch_array(MYSQLI_ASSOC);
		$destAirport = $row['airport_id'];
		echo $destAirport;
	}

	echo $sourceCity . " " . $destCity . " " . $startingdate . " " . $endingdate . " " . $guests . " " . $rooms . " " . $lowrange . " " . $highrange . " ";

	$stmt = "SELECT * FROM deals, hotel_availibility, hotels, flights, airlines, rooms WHERE deals.deal_price >= '$lowrange' and deals.deal_price <= '$highrange' and begin_date >= '$startingdate' and end_date <= '$endingdate' and deals.hotel_avail_id = hotel_availibility.hotel_avail_id and hotels.hotel_id = hotel_availibility.hotel_id and deals.arr_airport = '$destAirport' and deals.dept_airport = '$sourceAirport' and flights.flight_id=deals.flight_id and flights.airline_id = airlines.airline_id and rooms.room_id = hotel_availibility.room_id";
	$query = mysqli_query($connect, $stmt);

	$deals = array();
	if(mysqli_num_rows($query) > 0)
	{
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
		print_r($row);
		$record = array(
			"flight_no"=>$row['flight_no'],
			"airline_name" => $row['airline_name'],
			"dept_airport" => $row['dept_airport'],
			"arr_airport" => $row['arr_airport'],
			"dept_date" => $row['dept_date'],
			"dept_time" => $row['dept_time'],
			"return_date" => $row['return_date'],
			"return_dept_time" => $row['return_dept_time'],
			"cabin_type" => $row['cabin_type'],
			"hotel_name" => $row['name'],
			"room_id" => $row['room_id'],
			"hotel_address"=> $row['address'],
			"check_in" => $row['dept_date'],
			"check_out" => $row['return_date'],
			"deal_price" => $row['deal_price'],
			"deal_mileage" => $row['deal_mileage'],
			"star" => $row['star']
			);
		array_push($deals, $record);
	}
	$_SESSION["deals"]= $deals;
	//echo "Deal count = " . sizeof($deals);
		//$flightstatus = $row["flight_status_id"];
// 		$dealresults = <<<HTML
// 		<html>
// 			<body>
// 			<label><input type="radio" id='express' name="optradio" value="1">Deal-1</label>
// 			<div style="overflow-x:auto;">
// 				<table border="3" height="120" class="table table-responsive">
// 					<tbody>
// 						<tr>
// 							<td align = "center" style="color: white;"><strong>Flight Number</strong></td>
// 							<td align = "center" style="color: white;"><strong>Airline</strong></td>
// 							<td align = "center" style="color: white;"><strong>Departure Date</strong></td>
// 							<td align = "center" style="color: white;"><strong>Return Date</strong></td>
// 							<td align = "center" style="color: white;"><strong>Source</strong></td>
// 							<td align = "center" style="color: white;"><strong>Destination</strong></td>
// 							<td align = "center" style="color: white;"><strong>Flight Type</strong></td>
// 							<td align = "center" style="color: white;"><strong>Dept Time</strong></td>
// 							<td align = "center" style="color: white;"><strong>Return Time</strong></td>
// 							<td align = "center" style="color: white;"><strong>Cabin</strong></td>
// 						</tr>

// 					</tbody>
// 				</table>
// 				</div>
// 				<br><br>
// 			</body>
// 		</html>

// HTML;
	}
		else
		{
			echo '<script language="javascript">';
			echo'alert("No Deals Found!")';
			echo '</script>';			
		}	
	mysqli_close($connect);
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
  	<link rel="stylesheet" type="text/css" href="css/page.css">

	<style>
	</style>

	<script type="text/Javascript">
		function validate()
		{
			if(document.dealResults.deal.value=="")
			{
				alert("Please select a deal!");
				document.dealResults.deal.focus();
				return false;
			}
		}
	</script>

	</head>

<body>
	<?php echo get_header();?>
	<div class="container-fluid" id="background-login">
	<div class="container padding-top-10"  id="login-form">
	  <div class="panel panel-default register-panel">
			<div class="panel-heading">
				<b><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">DEAL RESULTS</font><i class="fas fa-dollar-sign fa-3x" style="margin-left: 20px"></i></b>
			</div>
			<div class="panel body">
				<form name="dealResults" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()" method="post">
					<br>
					<div class="row padding-top-10">
						<div class="col-md-12"  style="overflow-x:auto;"">
							<?php
							$dealCount = 1;
							$sessionDeals = $_SESSION["deals"];
								foreach($sessionDeals as $dealRecord){	
									//Flight Display-----------------------------------------------------------------------------
									echo "<table border=\"3\" height = \"120\">";
									echo "<label style='font-size:20px;'><input type=\"radio\" id='deal' name='deal' style='margin-right: 5px;' value='$dealCount'>Deal-$dealCount </label>";	
									echo "<span style='margin-left: 20px;'>" . "<strong><span style='color:red; font-size:20px;'>Deal Price: $" . $dealRecord['deal_price'] ."<span style='margin-left:20px'>" . "Deal Mileage: ". $dealRecord['deal_mileage'] . "</strong></span></span></span>";
									echo "<tbody>";
									echo "<tr>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Flight Number</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Airline</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Source</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Destination</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Dept Date</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Dept Time</strong></td>";
									echo  "<td align = \"center\" style=\"color: white;\"><strong>Return Date</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Return Time</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Cabin</strong></td>";
									echo	"</tr>";
									echo "<tr>"; 
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['flight_no'] . "</td>"; 		/*<!-- Trip Number   	-->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['airline_name'] . "</td>"; 	/*<!-- Number Travelers	-->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_airport'] . "</td>"; 		/*<!-- Hotel Name    	-->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['arr_airport'] . "</td>"; 	/*<!-- Hotel Check-in      -->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_date'] . "</td>"; /*<!-- Hotel Check-out   -->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_time'] . "</td>"; 	/*<!-- Airline Name    -->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['return_date'] . "</td>"; 	/*<!-- Departure Airport -->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['return_dept_time'] . "</td>"; 		/*<!-- Departure Date/Time  -->*/
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['cabin_type'] . "</td>"; 									/*<!-- Arrival Airport   -->*/
									echo "</tr>";
									echo "<tr></tr>";
									echo "</table>";
									echo "</tbody>";

									//Hotel Display--------------------------------------------------------------------------------
									echo "<table border=\"3\" height = \"120\">";
									echo "<tbody>";
									echo "<tr>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Hotel</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Room Type</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Location</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Check-In</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Check-Out</strong></td>";
									echo	"<td align = \"center\" style=\"color: white;\"><strong>Star Rating</strong></td>";
									echo	"</tr>";
									echo "<tr>"; 
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['hotel_name'] . "</td>"; 		
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['room_id'] . "</td>"; 								
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['hotel_address'] . "</td>"; 	
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_date'] . "</td>"; 
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['return_date'] . "</td>";
									echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['star'] . "</td>";
									echo "</tr>";
									echo "<tr></tr>";
									echo "</table>";
									echo "</tbody>";
									$dealCount++;
								}
							?>
						</div> 
					</div>

			<br><br>
			<div class="row padding-top-10">
			<input type="hidden" name="selected-deal" value="true">
				<div class="col-sm-offset-5 col-sm-10">
					<button type="submit" data-toggle="tooltip" data-placement="right" title="REGISTER!" class="btn btn-primary">SUBMIT</button>
				</div>				
			</div>				
		</form>
	</div>
	</div>
</div>
</div>
  <?php echo get_footer();?>
	</body>
</html>
