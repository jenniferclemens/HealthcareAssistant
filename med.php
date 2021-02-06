<?php
	require 'dbconfig/config.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Medication</title>
<link rel="stylesheet" href="css/health.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body>
<div class="main">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						Healthcare Assist
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="patient_homepage.php">Home</a></li>
						<li><a href="medication.php">Medication</a></li>
						<li><a href="appointments.php">Appointments</a></li>
						<li><a href="bmi.php">BMI</a></li>
						<li><a href="phonebook.php">Phonebook</a></li>
						<li><a href="index.php">Log Out</a></li>
						<li><a href="settings.php">Settings</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Log out</a></li>
						<li><a href="settings.php"><span class="glyphicon glyphicon-log-in"></span>Settings</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="title"><h2>Medication Reminder</h2></div>
		</div>
	</div>
</div>
</body>
</html>
