<?php
	require 'dbconfig/config.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Medication</title>
<link rel="stylesheet" href="css/health.css">

<style>
table{
	font-color:#046865;
}
</style>

</head>
<body>
<div class="main">
	<div class="title"><h2>Medication Reminder</h2>
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
	<br>
	<div>
		<h2>Daily Medication Reminder:</h2>
		<table width="100%" border="2px solid black">
			<tr>
				<th>Timing</th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
				<th>Sunday</th>
			</tr>
			<tr>
				<th>Morning</th>
				<td><?php getmed("monday","morning")?></td>
				<td><?php getmed("tuesday","morning")?></td>
				<td><?php getmed("wednesday","morning")?></td>
				<td><?php getmed("thursday","morning")?></td>
				<td><?php getmed("friday","morning")?></td>
				<td><?php getmed("saturday","morning")?></td>
				<td><?php getmed("sunday","morning")?></td>
			</tr>
			<tr>
				<th>Afternoon</th>
				<td><?php getmed("monday","afternoon")?></td>
				<td><?php getmed("tuesday","afternoon")?></td>
				<td><?php getmed("wednesday","afternoon")?></td>
				<td><?php getmed("thursday","afternoon")?></td>
				<td><?php getmed("friday","afternoon")?></td>
				<td><?php getmed("saturday","afternoon")?></td>
				<td><?php getmed("sunday","afternoon")?></td>
			</tr>
			<tr>
				<th>Evening</th>
				<td><?php getmed("monday","evening")?></td>
				<td><?php getmed("tuesday","evening")?></td>
				<td><?php getmed("wednesday","evening")?></td>
				<td><?php getmed("thursday","evening")?></td>
				<td><?php getmed("friday","evening")?></td>
				<td><?php getmed("saturday","evening")?></td>
				<td><?php getmed("sunday","evening")?></td>
			</tr>
			<tr>
				<th>Night</th>
				<td><?php getmed("monday","night")?></td>
				<td><?php getmed("tuesday","night")?></td>
				<td><?php getmed("wednesday","night")?></td>
				<td><?php getmed("thursday","night")?></td>
				<td><?php getmed("friday","night")?></td>
				<td><?php getmed("saturday","night")?></td>
				<td><?php getmed("sunday","night")?></td>
			</tr>
		</table>
	</div>
	
	<br>
	<button id="reset" onclick="openForm()">Enter New Medication Details</button><br><br>

	<div id="myForm" style="display:none;">
	<fieldset style="border-radius:6px; max-width:250px; padding:25px;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>New Medication</h2>

		<label><b>Medication Name</b></label>
		<input type="text" placeholder="Type here" name="medname" required><br><br>

		<label><b>Days of the week</b></label><br>
			<select name="dow" id="cars">
				<option value="Monday">Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thursday">Thursday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
				<option value="Sunday">Sunday</option>
			</select><br><br>
		
		<label for="cars"><b>Time of the day:</b></label>
			<select name="timing" id="cars">
				<option value="Morning">Morning</option>
				<option value="Afternoon">Afternoon</option>
				<option value="Evening">Evening</option>
				<option value="Night">Night</option>
			</select><br><br>
			
		<label><b>Other Details:</b></label>
			<textarea name="details" rows="3" cols="25"></textarea><br><br>
		<center>
		<input type="submit" name="submit-btn" id="submit" value="Submit"/><br><br>
		<input type="button" id="back" onclick="closeForm()" value="Close"/>
		</center>
	</form>
	</fieldset>
	</div>
	
</div>
</body>
</html>

<?php
	function getmed($day,$time)
	{
		require 'dbconfig/config.php';
		$username=$_SESSION['username'];
		$query="select * from medication where pusername='$username' and dow='$day' and time='$time'";
		$query_run=mysqli_query($con,$query);
						
		if(mysqli_num_rows($query_run)>0)
		{
			while($row = $query_run->fetch_assoc()) 
			{
				echo $row['medname']."<br><br>";
			}
		}
	}
	
	if(isset($_POST['submit-btn']))
	{
		$username=$_SESSION['username'];
		
		$medname=$_POST['medname'];
		$dow=$_POST['dow'];
		$time=$_POST['timing'];
		$details=$_POST['details'];
		
		$query="insert into medication(`pusername`, `medname`, `dow`, `time`, `details`)values ('$username','$medname','$dow','$time','$details')";
		$query_run=mysqli_query($con,$query);
		
		if(($query_run)==TRUE)
		{
			echo '<script type="text/javascript">alert("Successfully entered new medication info.")</script>';
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