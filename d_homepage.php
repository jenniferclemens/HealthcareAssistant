<?php
	require 'dbconfig/config.php';
	session_start();
	$username=$_SESSION['username'];
	$dfname=$_SESSION['dfname'];
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
		<a href="d_homepage.php">Home</a>
		<a href="patients.php">Patients</a>
		<a href="dphonebook.php">Phonebook</a>
		<a href="index.php" onclick="session_destroy()">Log out</a>
		<a href="dsettings.php">Settings</a>
	</div class="navbar">
	<div class="crop"><img src="images/1.png" class="imgcenter"></div class="crop">
	
	<center>
	<div>
		<h2>Welcome back <?php echo $dfname ?>!</h2>
		This website exists to help you and assist you in taking care of your patients' health. If you need to schedule appointments with your patients or even look at details about your patients, you can count on this application! Whenever you need and wherever you need, it is always there ready for you to use. 
	</div>
	</center>
	
</div>
</body>
</html>
