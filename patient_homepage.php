<?php
	require 'dbconfig/config.php';
	session_start();
	$username=$_SESSION['username'];
	$fname=$_SESSION["fname"];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">
	<div class="title"><h2>Your Health Assist</h2>
	</div class="title">
	<div class="navbar">
		<a href="patient_homepage.php">Home</a>
		<a href="medication.php">Medication</a>
		<a href="appointments.php">Appointments</a>
		<a href="bmi.php">BMI</a>
		<a href="phonebook.php">Phonebook</a>
		<a href="index.php" onclick="session_destroy()">Log out</a>
		<a href="settings.php">Settings</a>
	</div class="navbar">
	<div class="crop"><img src="images/1.png" class="imgcenter"></div class="crop">
	<center>
	<div>
		<h2>Welcome back <?php echo $fname ?>!</h2>
		This website exists to help you and assist you in taking care of your health. If you need to calculate your BMI or schedule appointments with your doctor or even create your own personalized medication calendar, you can count on this application! Whenever you need and wherever you need, it is always there ready for you to use. 
	</div>
	</center>
	
</div class="main">
</body>
</html>
