<?php
	include 'utility.php';
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
		#background{
	    background: url(images/flight1.jpg);
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



	</style>
<body>
	<?php echo get_header();?>
	<div class="container-fluid" id="background">
	<div class="container padding-top-10"  id="login-form">
	  <div class="panel panel-default register-panel">
			<div class="panel-heading">
				<b><font size="8px" style="font-family: 'Josefin Sans', sans-serif;">SIGN UP</font></b>
			</div>
			<div class="panel body">
				<form name="signup" action="signup.php" onsubmit="return validate()" method="post">
					<label for="firstname" class="control-label">Name:</label>
					<div class="row padding-top-10">
						<div class="col-md-3">
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First"/>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last"/>
						</div>
					</div>
					<br>
					<label class="control-label padding-top-10">Username:</label>
					<div class="row padding-top-10">
						<div class="col-md-3">
							<input type="text" class="form-control" id="username" name="username" placeholder="Enter username (used for login)"/>
						</div>
					</div>
					<br>
					<label class="control-label padding-top-10">Password:</label>
					<div class="row">
						<div class="col-md-3">
							<input type="password" class="form-control" id="password" name="password" placeholder="Upto 8 characters"/>
						</div>
						<div class="col-md-3">
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Confirm password"/>
						</div>
					</div>
					<br>
					<label for="email" class="control-label padding-top-10">Email:</label>
					<div class="row">
						<div class="col-md-3">
							<input  type="text" class="form-control" id="email1" name="eid" placeholder="Enter Email" data-toggle="tooltip" data-placement="right" title="Enter valid Email ID for Account Verification "/>
						</div>
						<div class="col-md-3">
							<input  type="text" class="form-control" id="email2" name="eid1" placeholder="Confirm Email" />
						</div>						
					</div>
					<br>
					<label for="mobile" class="control-label padding-top-10">Mobile No:</label>
					<div class="row padding-top-10">
						<div class="col-md-3">
							<input  type="text" class="form-control" id="mobile" name="mob" placeholder="Enter Phone Number"/>
						</div>
					</div>			
			<br><br>
			<div class="row padding-top-10">
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