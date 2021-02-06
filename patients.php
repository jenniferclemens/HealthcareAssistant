<?php
	require 'dbconfig/config.php';
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Appointments</title>
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
	
	<br><br>
	
	<div><center>
		<form action="patients.php" method="post">
			<label style="margin-left:10px;"><b>Search patient by first name:</b></label>
			<input name="name" type="text" required/>
			<input id="back" type="submit" name="submit_btn" value="Search"/><br><br>
		</form>
	</div></center>
	<br><br>
	<div>
		<?php
		if(isset($_POST['submit_btn']))
		{
		$name=$_POST['name'];
		$username=$_SESSION["username"];
		
		$query="select * from patient where fname like '%$name%'";
		$query_run=mysqli_query($con,$query);
		
		if(mysqli_num_rows($query_run)==1)
		{
			echo '<h2>Search Results:</h2>';
			print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>First Name</th><th>Last Name</th><th>Username</th><th>Phone Number</th><th>Diagnosed with</th><th>Other Details</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["fname"].'</td><td>'.$row["lname"].'</td><td>'.$row["pusername"].'</td><td>'.$row["phone"].'</td><td>'.$row["medication"].'</td><td>'.$row["others"].'</td></tr>';
				}
				print "</table><br>";
		}
		else
		{
			echo '(No contact in that name.)';
		}
		}
		?>
	</div>
	
	<div>
		<h2>Patients:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from patient order by fname";
			$query_run=mysqli_query($con,$query);
			if (mysqli_num_rows($query_run)>0) 
			{
				print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>First Name</th><th>Last Name</th><th>Username</th><th>Phone Number</th><th>Diagnosed with</th><th>Other Details</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["fname"].'</td><td>'.$row["lname"].'</td><td>'.$row["pusername"].'</td><td>'.$row["phone"].'</td><td>'.$row["medication"].'</td><td>'.$row["others"].'</td></tr>';
				}
				print "</table>";
			} 
			else 
			{
				echo "(No contacts.)";
			}
		?>
	</div>
	
	<br><br>
	
	<input type="button" id="back" onclick="openForm()" value="Fix Appointment"/>
	
	<br><br>
	
	<div id="myForm" style="display:none;">
	<fieldset style="border-radius:6px; max-width:250px; padding:25px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>New Appointment</h2>

		<label><b>Patient Username</b></label>
		<input type="text" placeholder="Type here" name="pun" required><br><br>

		<label><b>Date of Appointment</b></label>
		<input type="date" placeholder="Type here" name="date" required><br><br>
		
		<label><b>Time of Appointment</b></label>
		<input type="time" placeholder="Type here" name="time" required><br><br>
			
		<label><b>Reason:</b></label>
			<textarea name="reason" rows="3" cols="25"></textarea><br><br>
		<center>
		<input type="submit" name="submit-btn" id="submit" value="Submit"/><br><br>
		<input type="button" id="back" onclick="closeForm()" value="Close"/>
		</center>
	</form>
	</fieldset>
	</div>
	
	<br><br>
	
	<div>
		<h2>Your Appointments:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from appointment a, patient p where a.pusername=p.pusername and a.dusername='$username' order by date";
			$query_run=mysqli_query($con,$query);
			if (mysqli_num_rows($query_run)>0) 
			{
				print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>Patient Name</th><th>Date</th><th>Time</th><th>Reason</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["fname"].' '.$row["lname"].'</td><td>'.$row["date"].'</td><td>'.$row["time"].'</td><td>'.$row["reason"].'</td></tr>';
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

<?php

	if(isset($_POST['submit-btn']))
	{
		$dun=$_SESSION["username"];
		
		$pun=$_POST['pun'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$reason=$_POST['reason'];
	
		$query="insert into appointment(`pusername`, `dusername`, `date`, `time`, `reason`)values ('$pun','$dun','$date','$time','$reason')";
		$query_run=mysqli_query($con,$query);
		
		if(($query_run))
		{
			echo '<script type="text/javascript">alert("Successfully entered new appointment details.")</script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Error!")</script>';
		}
	}

?>

<script type="text/javascript">
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
