<?php
	require 'dbconfig/config.php';
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>
<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">
	<div class="title"><h2>Appoinment Schedule</h2>
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
	
	<div>
		<h2>Your scheduled appointments:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from appointment a, doctor d where a.dusername=d.dusername and a.pusername='$username' order by date";
			$query_run=mysqli_query($con,$query);
			if ($query_run) 
			{
				print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>Doctor Name</th><th>Date</th><th>Time</th><th>Reason</th><th>Pending</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["dfname"].' '.$row["dlname"].'</td><td>'.$row["date"].'</td><td>'.$row["time"].'</td><td>'.$row["reason"].'</td><td>'.$row["pending"].'</td></tr>';
				}
				print "</table>";
			} 
			else 
			{
				echo "(No appointments.)";
			}
		?>
	</div>
	
</div>
</body>
</html>