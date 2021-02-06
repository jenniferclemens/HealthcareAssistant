<?php
	require 'dbconfig/config.php';
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Healthcare Assist</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">

	<div class="title"><h2>Healthcare Assistant</h2></div class="title"><br>
	
	<div class="cropface"><img src="images/face1.jpg" class="imgcenter"></div>
	
	<div>
		<center><h3>Interested in our services?<br>Sign up here!</h3>
		<a href="patient_signup.php"><input id="reset" type="button" value="Sign Up"/></a></center><br><br>
	</div>
	<div>
		<center><h3>Already have an account?</h3>
		<a href="patient_signin.php"><input id="back" type="button" value="Login In"/></a></center><br><br><br>
	</div>
	
	<div class="cropface"><img src="images/face2.jpg" class="imgcenter"></div>

	<div >
		<a href="d_login.php"><input id="back" type="button" style="background-color:#BFD685; padding: 10px 30px; font-size: 14px; text-align:right;" value="Sign in as a Doctor"/></a><br><br>
		<a href="d_signup.php"><input id="back" type="button" style="background-color:#D5BDEF; padding: 10px 30px; font-size: 14px; text-align:right;" value="New Doctor?"/></a><br><br>
	</div>
	
	<div class="footer"><h5>Developed by Jen</h5></div class="footer"><br>
	
</div class="main">

</body>
</html>