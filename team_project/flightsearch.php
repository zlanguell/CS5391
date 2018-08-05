<?php
  include 'utility.php';
  //include 'home.php';

  echo "Top of the page";
  $output = array();
  $output1 = array();
  //global $count;
  global $count1;
  global $maker;
  global $maker1;
  $maker='';
  $maker1='';
  $count=0;
  $count1=0;


  $connect = mysqli_connect("localhost","root","","survey_db_2018") or die('Error Connecting To Databse');
  echo $_POST['flight-submit'];

  if(isset($_POST['flight-submit'])) {
    echo "Flight form submitted";
    
    $source = $_POST['source'];  //make value
    echo $source;
    
    $destination = $_POST['destination'];
    echo $destination;

    $dd_date = $_POST['departure-date'];
    $rr_date = $_POST['return-date'];
    echo $dd_date;
    echo $rr_date;
    $airline = $_POST['airline'];
    echo "Airline from form: " . $airline;
    //$maker1 = mysql_real_escape_string($_POST['selected_text1']);
   // $d_date = POST['dept_date']);
    //$r_date = $_POST['return_date']);
    $travelers = $_POST['travelers'];
    echo "$travelers" . $travelers;
    //$airline_name = mysqli_real_escape_string($connect,$_POST['selected_text3']);
    $class = $_POST['class'];
    echo "class: " . $class;

   // session_start();
    $_SESSION['sessionvar'] = $travelers;
    
    //echo $maker, $maker1;
    //echo $r_date;
    //echo $dd_date, $rr_date, $leaving_from, $going_to;
  
          $airlineQuery = (mysqli_query($connect,"SELECT airline_id from airlines where airline_name = '$airline'"));
          $count = mysqli_num_rows($airlineQuery); 
          $row = 0;
          //echo "airline query retured:" . $count;
          if($count > 0){
            $row = mysqli_fetch_assoc($airlineQuery);
          }   
          //echo "Airline id: " . $row['airline_id']; 
          //print_r($row);                               
         // $d_date = date('y-m-d', strtotime($d_date));
          $airportSourceQuery = (mysqli_query($connect,"SELECT airport_id from airport_detail where city = '$source'"));
          $count = mysqli_num_rows($airportSourceQuery); 
          //$row = mysqli_fetch_assoc($airportSourceQuery);
          //echo "airline source query retured:" . $count;
          //print_r($row);
          if($count > 0){
            $row = mysqli_fetch_array($airportSourceQuery);
            echo "found source!!!\n";
          }   
         // echo "Airport Source id: " . $row[0];  
          $sourceID = $row['airport_id'];
          //print_r($row);
          echo $sourceID;


          $airportDestQuery = (mysqli_query($connect,"SELECT airport_id from airport_detail where city = '$destination'"));
          $count = mysqli_num_rows($airportDestQuery); 
          //$row = 0;
          //echo "\nairline source query retured:" . $count;
          if($count > 0){
            $row = mysqli_fetch_array($airportDestQuery);
          }   
          //echo "Airport Dest id: " . $row[0];  
          $destID = $row['airport_id'];
          echo $destID;


          $query = mysqli_query($connect,"SELECT * FROM flights WHERE dept_airport='$sourceID' AND arr_airport='$destID' AND dept_date='$dd_date' AND return_date='$rr_date' AND cabin_type='$class'") or die("Could not search flights");
          $count = mysqli_num_rows($query);
          //echo $count;
          
          if($count == 0){
              $output[] = 'There was no search results';
          }
          
          else {
            echo "Row Count = " . $count;
            $flights = array();

              //$row = mysqli_fetch_array($query)
              while($row = $query->fetch_array(MYSQLI_ASSOC)) {
                $record = array(
                  "dept_airport" => $row['dept_airport'],
                  "arr_airport" => $row['arr_airport'],
                  "flight_id" => $row['flight_id'],
                  "dept_date" => $row['dept_date'],
                  "return_date" => $row['return_date'],
                  "fare_dollars" => $row['fare_dollars'],
                  "fare_mileage" => $row['fare_mileage'],
                  "journey_hr" => $row['journey_hr'],
                  "distance" => $row['distance']
                );

                array_push($flights, $record);
                //echo "hII";
                  
                 // $output[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart Date: '.$depart_date.' '."</br>".' '."</br>".' Return Date: '.$return_date.' '."</br>".' '."</br>".' Journey Time: '.$time.' '."</br>".' '."</br>".' '.' Distance: '.$dist.' miles.'.' '."</br>".' '."</br>".' Fare: '.$fare.' '."</br>";
                  
              }
              $_SESSION["flights"] = $flights;
              //echo "Hello";
          }
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
</head>
<style>
body {
  font-family: Arial;
  margin: 0px;

}

#background{
    background: url(images/flight1.jpg);
    width: 100%;
    height: auto;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
}

#search{
  padding-top: 6%;
  padding-bottom: 15%
}

#search-box{
  padding-left: 0;
  padding-right: 0;
}
.center{
  text-align: center;
}

.navbar{
  border-radius: 0px !important;
  margin-bottom: 0px;
}

.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
  background: #000;
}

.nav-pills a{
  background: #fff;
  color: #000;
}

.home-panel{
  background: rgba(0,0,0,0.4);
  color: white;
}
</style>


<body>
  <?php echo(get_header());?>


<div id="background">
  <div id="search" class="container-fluid">
    <div class="container">
      
<!--Flight Search ==================================================================================-->
      <div class="tab-content">
          <div id="flights" class="tab-pane fade in active">
            <div class="panel panel-default home-panel">
              <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                    <center><b><font id="formhead">SEARCH FOR A FLIGHT</font></b><i class="fa fa-plane fa-3x" style="margin-left: 20px"></i></center>
                </div>

  

  <div class="panel body">
        <form name="bookingconfirm" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()" method="post">
          <br>
          <div class="row padding-top-10">
            <div class="col-md-12"  style="overflow-x:auto;"">
              <?php
              $flightCount = 1;
              $sessionFlights = $_SESSION["flights"];
                foreach($sessionFlights as $flightRecord){  
                  //Flight Display-----------------------------------------------------------------------------
                  echo "<table border=\"3\" height = \"120\">";
                  echo "<label style='font-size:20px;'><input type=\"radio\" id='flight' name='flight' style='margin-right: 5px;' value='$flightCount'>Flight-$flightCount </label>"; 
                  echo "<span style='margin-left: 20px;'>" . "<strong><span style='color:red; font-size:20px;'>Price: $" . $flightRecord['fare_dollars'] ."<span style='margin-left:20px'>" . "Mileage Price: ". $flightRecord['fare_mileage'] . "</strong></span></span></span>";
                  echo "<tbody>";
                  echo "<tr>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Source</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Destination</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Dept Date</strong></td>";
                  //echo  "<td align = \"center\" style=\"color: white;\"><strong>Dept Time</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Return Date</strong></td>";
                  //echo  "<td align = \"center\" style=\"color: white;\"><strong>Return Time</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Journey Time (hrs)</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Distance (mi)</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Price</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Mileage Price</strong></td>";

                  echo  "</tr>";
                  echo "<tr>"; 
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['dept_airport'] . "</td>";    /*<!-- Trip Number    -->*/
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['arr_airport'] . "</td>";   /*<!-- Number Travelers -->*/
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['dept_date'] . "</td>";     /*<!-- Hotel Name     -->*/
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['return_date'] . "</td>";  /*<!-- Hotel Check-in      -->*/
                  //echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_date'] . "</td>"; /*<!-- Hotel Check-out   -->*/
                  //echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['dept_time'] . "</td>";  /*<!-- Airline Name    -->*/
                  //echo "<td align = \"center\" style=\"color: white;\">" . $dealRecord['return_date'] . "</td>";  /*<!-- Departure Airport -->*/
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['journey_hr'] . "</td>";     /*<!-- Departure Date/Time  -->*/
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['distance'] . "</td>";                  
                  echo "<td align = \"center\" style=\"color: white;\">" . "$" . $flightRecord['fare_dollars'] . "</td>";                   
                  echo "<td align = \"center\" style=\"color: white;\">" . $flightRecord['fare_mileage'] . "</td>";                   
                  echo "</tr>";
                  echo "<tr></tr>";
                  echo "</table>";
                  echo "</tbody>";

                  //Hotel Display--------------------------------------------------------------------------------
                  /*
                  echo "<table border=\"3\" height = \"120\">";
                  echo "<tbody>";
                  echo "<tr>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Hotel</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Room Type</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Location</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Check-In</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Check-Out</strong></td>";
                  echo  "<td align = \"center\" style=\"color: white;\"><strong>Star Rating</strong></td>";
                  echo  "</tr>";
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
                  */
                  $flightCount++;

                }
              ?>
            </div> 
          </div>

      <br><br>
      <div class="row padding-top-10">
      <input type="hidden" name="selected-flight" value="true">
        <div class="col-sm-offset-5 col-sm-10">
          <button type="submit" data-toggle="tooltip" data-placement="right" title="REGISTER!" class="btn btn-primary">SUBMIT</button>
        </div>        
      </div>        
    </form>
  </div>
                



              </div>
            </div>
          </div>




      </div>
    </div>
  </div>
</div>
  <?php 
      echo get_footer();
      ?>
</body>
</html> 