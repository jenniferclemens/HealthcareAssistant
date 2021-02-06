<?php
	require 'dbconfig/config.php';
	session_start()
?>

<!DOCTYPE html>
<html>
<head>
<title>Phonebook</title>
<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">
	<div class="title"><h2>Emergency Phonebook</h2>
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
	
	<br><br><br>
	
	<div  id="phonebook" style="display:block;">
		<h2>Your contacts:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from phonebook where pusername='$username' or pusername='' order by cname";
			$query_run=mysqli_query($con,$query);
			if (mysqli_num_rows($query_run)>0) 
			{
				print '<table width="100%" border="2px solid black"> ';
				print "<tr><th>Contact ID</th><th>Name</th><th>Phone Number</th></tr> ";
				while($row = $query_run->fetch_assoc()) 
				{
					echo '<tr><td>'.$row["cid"].'</td><td>'.$row["cname"].'</td><td>'.$row["cphone"].'</td></tr>';
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
	
	<div><center>
		<form action="phonebook.php" method="post">
			<label style="margin-left:10px;"><b>Search by name:</b></label>
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
		
		$query="select * from phonebook where cname like '%$name%'and (pusername='$username' or pusername='')";
		$query_run=mysqli_query($con,$query);
		
		if(mysqli_num_rows($query_run)==1)
		{
			print '<table width="100%" border="2px solid black"> ';
			print "<tr><th>Contact ID</th><th>Name</th><th>Phone Number</th></tr> ";
			while($row = $query_run->fetch_assoc()) 
			{
				echo '<tr><td>'.$row["cid"].'</td><td>'.$row["cname"].'</td><td>'.$row["cphone"].'</td></tr>';
			}
			print "</table>";
		}
		else
		{
			echo '(No contact in that name.)';
		}
		}
		?>
	</div>
	
</div>
</body>
</html>