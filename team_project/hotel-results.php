
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

</head>
<body>
  	<nav class="navbar navbar-inverse " data-spy="affix" data-offset-top="120" >
  		<div class="container-fluid">
    		<div class="navbar-header">
      		<a class="navbar-brand" href="index.php">TravelCo</a>
    		</div>
    		<div class="collapse navbar-collapse" id="myNavbar">
      		<ul class="nav navbar-nav">
        		<li><a href="index.php">HOME</a></li>
          </ul>
    		</div>
  		</div>
	</nav>

  <div id ="background">
    <br>
    <div class="container-fluid">
      <form action="hotelcheckout.php"  method="post">
     <table class="table table-bordered, home-panel">
      <thead>
        <tr>
          <th>Select</th>
          <th>Hotel Name</th>
          <th>address</th>
          <th>phone</th>
          <th>rooms</th>
          <th>price</th>

        </tr>
      </thead>
      <tbody>
     <?php
      $servername = "localhost";
      $username = "root";
$password = "";
$dbname = "survey_db_2018";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT  h.hotel_id,name, address, phone,room_id,price
         FROM hotels h, hotel_availibility b
         WHERE h.hotel_id = b.hotel_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
            echo'<tr>
                <td><label class="radio-inline"><input type="radio" name="optradio"  value='.$row["hotel_id"].' unchecked required></label></td>
                <td>'.$row["name"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["room_id"].'</td>
                <td>$'.$row["price"].'</td>
              </tr>';
        }
      }

        mysqli_close($conn);
        ?>
      </tbody>
    </table>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
  </form>
  </div>




</div>
  	<footer class="footer-distributed">
		<div class="footer-left">
			<h3><span>TravelCo</span></h3>
			<p class="footer-links">
			</p>
			<p class="footer-company-name">TravelCo &copy; 2018 Developed by Harsh Patni, Ethan Stewart, Nikitha, Zachary Languell</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fas fa-map-marker-alt"></i>
				<p href="#"><span>TravelCo</span> Austin, USA</p>
			</div>
			<div>
				<i class="fas fa-phone"></i>
				<a href="tel:+1(512)214-2062">+1(512)214-2062</a>
			</div>
			<div>
				<i class="fas fa-envelope"></i>
				<p><a href="mailto:support@travelco.com">support@travelco.com</a></p>
			</div>
		</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>About the company</span>
					TravelCo was created to make your life easier. We provide a hassle free booking process for flights and hotels. Please do not hesitate to contact us with any questions!
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="#"><i class="fab fa-github"></i></a>
				</div>

			</div>
		</footer> </body>
</html>
