<?php
include 'utility.php';
/*
  $string = "I am a PHP String!";
  $output = array();
   exec ("java HelloWorld $string", $output);
   echo '<pre>';
   foreach($output as $line){
    echo ($line);
  }
  echo '</pre>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_db_2018";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * from flights";
$result = $conn->query($sql);

 $row = $result->fetch_assoc();
 echo'<pre>';
 foreach ($row as $key => $value) {

   echo $value . "\n";
 }

 echo'</pre>';
  # code...
  */
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
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/header1.css">
  <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<style>
body {
  font-family: Arial;
  margin: 0px;

}

#header{
  background:url("./images/h1.jpg");
  font-size: 90px !important;
  background-repeat: none;
}

#header h1{
  font-size: 90px !important;
  font-weight: 600;
  font-family: 'Josefin Sans', sans-serif;
  min-height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
}
#header .container{
  line-height: 200px;
}

#background{
    background: url(./images/vacation-web.jpg);
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

.footer-distributed .footer-icons a{
  padding-top: 8px;
}

.footer-distributed .footer-center i{
  font-size: 18px;
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

</head>
<body>
  <?php echo(get_header());?>


<div id="background">
  <div id="search" class="container-fluid">
    <div class="container">
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#flights">Flights</a></li>
        <li><a data-toggle="pill" href="#flight-hotel">Flight + Hotel</a></li>
        <li><a data-toggle="pill" href="#hotel">Hotel</a></li>
        <li><a data-toggle="pill" href="#deals">Deals</a></li>
      </ul>
<!--Flight Search ==================================================================================-->
      <div class="tab-content">
          <div id="flights" class="tab-pane fade in active">
            <div class="panel panel-default home-panel">
              <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                  <center><b><font id="formhead">SEARCH FOR A FLIGHT</font></b><i class="fa fa-plane fa-3x" style="margin-left: 20px"></i><center>
                </div>
                <form class="form-inline" name="myform" id="myform" method="post" action="flight-results.php">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="source">Source</label>
                            <select class="form-control" id="source" name="source">
                              <option value=""  selected disabled>Enter Departure City</option>
                              <option>Austin</option>
                              <option>Houston</option>
                              <option>Las Vegas</option>
                              <option>Honolulu</option>
                              <option>Tampa</option>
                              <option>Los Angeles</option>
                            </select>
                     </div>
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="">Destination</label>
                        <select id="destination" name="destination" class="form-control" placeholder="">
                          <option value="" id="destination" name="destination" selected disabled>Enter Destination City</option>
                          <option>Austin</option>
                          <option>Houston</option>
                          <option>Las Vegas</option>
                          <option>Honolulu</option>
                          <option>Tampa</option>
                          <option>Los Angeles</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Departure Date</label>
                        <input type="Date" id="departure-date" class="form-control" name="departure-date">
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Return Date</label>
                        <input type="Date" id="return-date" class="form-control" name="return-date">
                      </div>
                    </div>
                  </div>
                  </br>
                  <div class="row">
                    <div class=" col-md-3">
                      <div class="form-group">
                        <label for="">Select your airlines</label>
                        <select id="flight" name="flight" class="form-control" placeholder="">
                          <option value=""id="flight" name="flight" selected disabled>Select your airlines</option>
                          <option>Delta</option>
                          <option>United</option>
                          <option>Southwest</option>
                          <option>Frontier</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-md-1">
                      <div class="form-group">
                        <label for="">Cabin Class</label>
                        <label class="radio-inline">
                          <input type="radio" name="class" id="class" value="Economy">Economy
                        </label>
                        <label class="radio-inline" style="margin-left: 0">
                         <input type="radio" name="class" id="class"  value="Bussiness">Bussiness
                        </label>
                      </div>
                    </div> 

                    <div class="col-sm-offset-2 col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Travelers</label>
                       <input type="number" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                  </div>
                  <br><br><br><br><br><br><br>
                  <div class="row">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input type="hidden" name="submitted" value="true">
                        <button type="submit" data-toggle="tooltip" data-placement="right" title="Search Flights" class="btn btn-primary">Search Flights</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
 <!--Flight + Hotel Search =============================================================================================-->
          <div id="flight-hotel" class="tab-pane fade">
            <div class="panel panel-default home-panel">
              <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                  <center><b><font id="formhead">SEARCH FOR A FLIGHT + HOTEL</font></b></center>
                  <center><i class="fa fa-hotel fa-3x" style="margin-left: 20px"></i><i class="fa fa-plus fa-2x" style="margin-left: 20px"></i> <i class="fa fa-plane fa-3x" style="margin-left: 20px"></i></center>
                </div>
                <form class="form-inline" name="myform" id="myform" method="post" action="flight-results.php">
                <h3>Flight Information:</h3>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="source">Source</label>
                            <select class="form-control" id="source" name="source">
                              <option value=""  selected disabled>Enter Departure City</option>
                              <option>Austin</option>
                              <option>Houston</option>
                              <option>Las Vegas</option>
                              <option>Honolulu</option>
                              <option>Tampa</option>
                              <option>Los Angeles</option>
                            </select>
                     </div>
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="">Destination</label>
                        <select id="destination" name="destination" class="form-control" placeholder="">
                          <option value="" id="destination" name="destination" selected disabled>Enter Destination City</option>
                          <option>Austin</option>
                          <option>Houston</option>
                          <option>Las Vegas</option>
                          <option>Honolulu</option>
                          <option>Tampa</option>
                          <option>Los Angeles</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Departure Date</label>
                        <input type="Date" id="departure-date" class="form-control" name="departure-date">
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Return Date</label>
                        <input type="Date" id="return-date" class="form-control" name="return-date">
                      </div>
                    </div>
                  </div>
                  </br>
                  <div class="row">
                    <div class=" col-md-3">
                      <div class="form-group">
                        <label for="">Select your airlines</label>
                        <select id="flight" name="flight" class="form-control" placeholder="">
                          <option value=""id="flight" name="flight" selected disabled>Select your airlines</option>
                          <option>Delta</option>
                          <option>United</option>
                          <option>Southwest</option>
                          <option>Frontier</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-md-1">
                      <div class="form-group">
                        <label for="">Cabin Class</label>
                        <label class="radio-inline">
                          <input type="radio" name="class" id="class" value="Economy">Economy
                        </label>
                        <label class="radio-inline" style="margin-left: 0">
                         <input type="radio" name="class" id="class"  value="Bussiness">Bussiness
                        </label>
                      </div>
                    </div> 

                    <div class="col-sm-offset-2 col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Travelers</label>
                       <input type="number" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <h3>Hotel Information:</h3>  
                  <br>   
                   <div class="row">
                    <div class=" col-md-2">
                      <div class="form-group">
                        <label for="">Destination</label>
                          <select id="destination" name="destination" class="form-control" placeholder="">
                            <option value="" id="destination" name="destination" selected disabled>Enter Destination City</option>
                            <option>Austin</option>
                            <option>Houston</option>
                            <option>Las Vegas</option>
                            <option>Honolulu</option>
                            <option>Tampa</option>
                            <option>Los Angeles</option>
                          </select>
                      </div>
                   </div>
                   <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Check-In</label>
                        <input type="Date" id="check-in" class="form-control" name="check-in">
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Check-Out</label>
                        <input type="Date" id="check-out" class="form-control" name="check-out">
                      </div>
                    </div>
                  </div> 
                  <br>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Guests</label>
                       <input type="number" id="guests" name="guests" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                    <div class="col-sm-offset-1 col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Rooms</label>
                       <input type="number" id="rooms" name="rooms" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="row">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input type="hidden" name="submitted" value="true">
                        <button type="submit" data-toggle="tooltip" data-placement="right" title="Search Hotels" class="btn btn-primary">Search Flight + Hotel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

<!--Hotel Search ===================================================================================================-->
          <div id="hotel" class="tab-pane fade">
            <div class="panel panel-default home-panel">
              <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                  <center><b><font id="formhead">SEARCH FOR A HOTEL</font></b><i class="fa fa-hotel fa-3x" style="margin-left: 20px"></i></center>
                </div>
                <form class="form-inline" name="myform" id="myform" method="post" action="hotel-results.php">
                   <div class="row">
                    <div class=" col-md-2">
                      <div class="form-group">
                        <label for="">Destination</label>
                          <select id="destination" name="destination" class="form-control" placeholder="">
                            <option value="" id="destination" name="destination" selected disabled>Enter Destination City</option>
                            <option>Austin</option>
                            <option>Houston</option>
                            <option>Las Vegas</option>
                            <option>Honolulu</option>
                            <option>Tampa</option>
                            <option>Los Angeles</option>
                          </select>
                      </div>
                   </div>
                   <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Check-In</label>
                        <input type="Date" id="check-in" class="form-control" name="check-in">
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Check-Out</label>
                        <input type="Date" id="check-out" class="form-control" name="check-out">
                      </div>
                    </div>
                  </div> 
                  <br>     
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Guests</label>
                       <input type="number" id="guests" name="guests" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                    <div class="col-sm-offset-1 col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Rooms</label>
                       <input type="number" id="rooms" name="rooms" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="row">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input type="hidden" name="submitted" value="true">
                        <button type="submit" data-toggle="tooltip" data-placement="right" title="Search Hotels" class="btn btn-primary">Search Hotels</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
<!--Deals Search =========================================================================================-->

          <div id="deals" class="tab-pane fade">
            <div class="panel panel-default home-panel">
              <div class="panel-body">
                <div class="page-header" style="margin-top:5px;">
                  <center><b><font id="formhead">SEARCH OUR DEALS</font></b><i class="fa fa-dollar-sign fa-3x" style="margin-left: 20px"></i></center>
                </div>
                <form class="form-inline" name="myform" id="myform" method="post" action="deal-results.php">
                   <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="source">Source</label>
                          <select class="form-control" id="source" name="source">
                            <option value=""  selected disabled>Source</option>
                            <option>Austin</option>
                            <option>Houston</option>
                            <option>Las Vegas</option>
                            <option>Honolulu</option>
                            <option>Tampa</option>
                            <option>Los Angeles</option>
                          </select>
                     </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class=" col-md-2">
                      <div class="form-group">
                        <label for="">Destination</label>
                          <select id="destination" name="destination" class="form-control" placeholder="">
                            <option value="" id="destination" name="destination" selected disabled>Destination</option>
                            <option>Austin</option>
                            <option>Houston</option>
                            <option>Las Vegas</option>
                            <option>Honolulu</option>
                            <option>Tampa</option>
                            <option>Los Angeles</option>
                          </select>
                      </div>
                   </div>
                   <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Starting Date</label>
                        <input type="Date" id="starting-date" class="form-control" name="starting-date">
                      </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Ending Date</label>
                        <input type="Date" id="ending-date" class="form-control" name="ending-date">
                      </div>
                    </div>
                  </div> 
                  <br>     
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Guests</label>
                       <input type="number" id="guests" name="guests" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                    <div class="col-sm-offset-1 col-md-2">
                      <div class="form-group">
                        <label for="At">Number of Rooms</label>
                       <input type="number" id="rooms" name="rooms" step="any" value="0" style="color: black;"> 
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price Range(Low)</label>
                          <input type="range" min="0" max="10000" value="50" step="100" class="low-slider" id="low">
                          <p>Value: <span id="low-range"></span></p>
                      </div>
                      <script>
                        var slider = document.getElementById("low");
                        var output = document.getElementById("low-range");
                        output.innerHTML = slider.value;
                        slider.oninput = function() {
                          output.innerHTML = this.value;
                        }
                      </script>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price Range(High)</label>
                          <input type="range" min="0" max="10000" value="50" step="100" class="high-slider" id="high">
                          <p>Value: <span id="high-range"></span></p>
                      </div>
                      <script>
                        var slider2 = document.getElementById("high");
                        var output2 = document.getElementById("high-range");
                        output.innerHTML = slider2.value;
                        slider2.oninput = function() {
                          output2.innerHTML = this.value;
                        }
                      </script>
                    </div>
                  </div>
                  <br><br><br><br>
                  <div class="row">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input type="hidden" name="submitted" value="true">
                        <button type="submit" data-toggle="tooltip" data-placement="right" title="Search Hotels" class="btn btn-primary">Search Deals</button>
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
  <?php echo(get_footer());?>
</body>
</html> 