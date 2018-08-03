<?php
include 'utility.php';

?>

<?php echo(get_header());?>

<?php


$output = array();
    $output1 = array();
    global $count;
    global $count1;
    global $maker;
    global $maker1;
    $maker='';
    $maker1='';
    $count=0;
    $count1=0;


                        if(isset($_POST['submitted'])) {
                            
                            
                            $leaving_going = $_POST['Make'];  //make value
                            
                            $going_to = $_POST['Make1'];
                            $dd_date = $POST['dept_date'];
                            $rr_date = $POST['return_date'];
                            $maker = mysql_real_escape_string($_POST['selected_text']);
                            //$maker1 = mysql_real_escape_string($_POST['selected_text1']);
                            $d_date = mysql_real_escape_string($_POST['dept_date']);
                            $r_date = mysql_real_escape_string($_POST['return_date']);
                            $no_travellers = mysql_real_escape_string($_POST['selected_text2']);
                            $airline_name = mysql_real_escape_string($_POST['selected_text3']);
                            
                            session_start();
                            $_SESSION['sessionvar'] = $no_travellers;
                            
                            //echo $maker, $maker1;
                            //echo $r_date;
                            //echo $dd_date, $rr_date, $leaving_from, $going_to;
                        }
                        ?>
                        
                        
                        <?php
                        $value = '';
                        if(isset($_POST['submitted'])) {
                         
                            switch($_POST['radio']) {
                                    case"1":
                                        $value = "Economy";
                                        break;
                                    case"2":
                                        $value = "Bussiness";
                                        break;
                            }
                            //echo $value;
        
                        }
                         ?>
                        
                        
                        <?php
                        
                        if(isset($_POST['submitted'])) {
                            if($value == "Economy") {
                                
                                
                                $d_date = date('y-m-d', strtotime($d_date));
                                
                                $query = mysql_query("SELECT * FROM `flights` WHERE dept_airport='Make' AND arr_airport='Make1' dept_date LIKE '%$d_date'") or die("Could not search flights");
                                $count = mysql_num_rows($query);
                                
                                if($count == 0){
                                    $output[] = 'There was no search results';
                                }
                                
                                else {
                                    
                                    while($row = mysql_fetch_array($query)) {
                                        $from1 = $row['dept_airport'];
                                        $to1 = $row['arr_airport'];
                                        $flight_id = $row['flight_id'];
                                        $depart_date = $row['dept_date'];
                                        $fare = $row['fare_dollars'];
                                        $time = $row['journey_hr'];
                                        $dist = $row['distance'];
                                        
                                        $output[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart Date: '.$depart_date.' '."</br>".' '."</br>".' Journey Time: '.$time.' '."</br>".' '."</br>".' '.' Distance: '.$dist.' miles.'.' '."</br>".' '."</br>".' Fare: '.$fare.' '."</br>";
                                        
                                    }
                                }
                                
                                $r_date = date('y-m-d', strtotime($r_date));
                                
                                $query = mysql_query("SELECT * FROM `flights` WHERE dept_airport='Make' AND arr_airport='Make1' dept_date LIKE '%$r_date'");
                                $count1 = mysql_num_rows($query);
                                
                                if(count1 == 0){
                                    $output1[] = 'There was no flights while coming!.';
                                }
                                
                                else {
                                     
                                    while($row = mysql_fetch_array($query)) {
                                        $from1 = $row['dept_airport'];
                                        $to1 = $row['arr_airport'];
                                        $flight_id = $row['flight_id'];
                                        $return_date = $row['dept_date'];
                                        $fare = $row['fare_dollars'];
                                        $time = $row['journey_hr'];
                                        $dist = $row['distance'];
                                        
                                        $output1[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart Date: '.$return_date.' '."</br>".' '."</br>".' Journey Time: '.$time.' '."</br>".' '."</br>".' '.' Distance: '.$dist.' miles.'.' '."</br>".' '."</br>".' Fare: '.$fare.' '."</br>";
                                    
                                }
                                
                                
                                }
                            
                            
                            }
                            
                        else if(value == "Bussiness") {
                            
                             $d_date = date('y-m-d', strtotime($d_date));
                                
                                $query = mysql_query("SELECT * FROM `flights` WHERE dept_airport='Make' AND arr_airport='Make1' dept_date LIKE '%$d_date'") or die("Could not search flights");
                                $count = mysql_num_rows($query);
                                
                                if($count == 0){
                                    $output[] = 'There was no search results';
                                }
                                
                                else {
                                    
                                    while($row = mysql_fetch_array($query)) {
                                        $from1 = $row['dept_airport'];
                                        $to1 = $row['arr_airport'];
                                        $flight_id = $row['flight_id'];
                                        $depart_date = $row['dept_date'];
                                        $fare = $row['fare_dollars'];
                                        $time = $row['journey_hr'];
                                        $dist = $row['distance'];
                                        
                                        $output[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart Date: '.$depart_date.' '."</br>".' '."</br>".' Journey Time: '.$time.' '."</br>".' '."</br>".' '.' Distance: '.$dist.' miles.'.' '."</br>".' '."</br>".' Fare: '.$fare.' '."</br>";
                                        
                                    }
                                }
                                
                                $r_date = date('y-m-d', strtotime($r_date));
                                
                                $query = mysql_query("SELECT * FROM `flights` WHERE dept_airport='Make' AND arr_airport='Make1' dept_date LIKE '%$r_date'");
                                $count1 = mysql_num_rows($query);
                                
                                if(count1 == 0){
                                    $output1[] = 'There was no flights while coming!.';
                                }
                                
                                else {
                                     
                                    while($row = mysql_fetch_array($query)) {
                                        $from1 = $row['dept_airport'];
                                        $to1 = $row['arr_airport'];
                                        $flight_id = $row['flight_id'];
                                        $return_date = $row['dept_date'];
                                        $fare = $row['fare_dollars'];
                                        $time = $row['journey_hr'];
                                        $dist = $row['distance'];
                                        
                                        $output1[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart Date: '.$return_date.' '."</br>".' '."</br>".' Journey Time: '.$time.' '."</br>".' '."</br>".' '.' Distance: '.$dist.' miles.'.' '."</br>".' '."</br>".' Fare: '.$fare.' '."</br>";
                               
                            
                        }
                        }
                        }
                            
                            else{
                                $output[] = 'Please select the locations! ';
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
</head>
<style>
body {
  font-family: Arial;
  margin: 0px;

}

#background{
    background: url(images/vacation-web.jpg);
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

                 <form action="booking_confirm.php" method="post">

<?php

//check
if ($value == "round_trip"){
echo '<h3>Going flights</h3>';
$i = 0;
if ($count > 0 ) {
    while ($i < $count) {
        $output[$i];
        echo '<input type="radio" name="hi" checked="checked" value="' . $output[$i] . '" >';
    echo $output[$i];
    
    echo '</br>';
        $i = $i+1;
    }
}
else{
    echo "No going flights are available...";
}


//returning flights printing
echo '<h3>Returning flights</h3>';
$j = 0;
if ($count1 > 0 ) {
    while ($j < $count1) {
        echo '<input type="radio" name="hii" checked="checked" value="' . $output1[$j] . '" >';
    echo $output1[$j]; 
    
    echo '</br>';
        $j = $j+1;
    }
}
else{
    echo "No returning flights are available...";
}
}//closing of round_trip
else{
    echo '<h3>Going flights</h3>';
$i = 0;
if ($count > 0 ) {
    while ($i < $count) {
        $output[$i];
        echo '<input type="radio" name="hi" checked="checked" value="' . $output[$i] . '" >';
    echo $output[$i];
    
    echo '</br>';
        $i = $i+1;
    }
}
else{
    echo "No going flights are available...";
}
}
?>

<br>
<?php
if ($count1 > 0 | $count > 0) {
echo '<input type="submit" value="Continue >>"/>';
}
?>

</form>
                



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