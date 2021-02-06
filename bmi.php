<?php
	require 'dbconfig/config.php';
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
<title>BMI</title>
<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">
	<div class="title"><h2>Your BMI Calculator</h2>
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
	<center>
	
	<h2>Calculate your BMI</h2>
	
	<form action="bmi.php" method="post">
		<label style="margin-left:10px;"><b>Height(in m)</b></label>
			<input name="height" type="text" required/><br><br>
		<label style="margin-left:10px;"><b>Weight(in kg)</b></label>
			<input name="weight" type="text" required/><br><br>
		<input id="submit" type="submit" name="submit_btn" value="Get BMI"/><br><br>
		<input id="reset" type="reset" value="Reset"/><br><br>
	</form>
	
	</center>
	</div>
	
	<div>
		<h2>Your previous BMI records:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from bmi where pusername='$username'";
			$query_run=mysqli_query($con,$query);
			if (mysqli_num_rows($query_run)>0) 
			{
				print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>Date</th><th>Height</th><th>Weight</th><th>BMI Value</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["date"].'</td><td>'.$row["height"].'</td><td>'.$row["weight"].'</td><td>'.$row["bmivalue"].'</td></tr>';
				}
				print "</table>";
			} 
			else 
			{
				echo "(No history.)";
			}
		?>
	</div>
	
	<br><br>
	
	<div><img src="images/bmi.jpg" width="100%"></div >
	
</div>
</body>
</html>

<?php
	
	if(isset($_POST['submit_btn']))
	{
		$username=$_SESSION['username'];
		
		$height=$_POST['height'];
		$weight=$_POST['weight'];
		$date=date("Y/m/d");
		$bmivalue=$weight/($height*$height);
		
		$query="insert into bmi(`pusername`, `height`, `weight`, `bmivalue`, `date`)values ('$username','$height','$weight','$bmivalue','$date')";
		$query_run=mysqli_query($con,$query);
		
		if(($query_run)==TRUE)
		{
			echo '<script type="text/javascript">alert("Revisit page to view your bmi.")</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Error.")</script>';
		}
	}
?>
