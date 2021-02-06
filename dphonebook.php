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
	<div class="title"><h2>Phonebook</h2>
	</div class="title">
	<div class="navbar">
		<a href="d_homepage.php">Home</a>
		<a href="patients.php">Patients</a>
		<a href="dphonebook.php">Phonebook</a>
		<a href="index.php" onclick="session_destroy()">Log out</a>
		<a href="dsettings.php">Settings</a>
	</div class="navbar">
	
	<div>
		<h2>Contacts:</h2>
		<?php
			require 'dbconfig/config.php';
			$username=$_SESSION['username'];
			$query="select * from phonebook where role='p' or role='d' order by cname";
			$query_run=mysqli_query($con,$query);
			if ($query_run) 
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
		<form action="dphonebook.php" method="post">
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
		
		$query="select * from phonebook where cname like '%$name%'and (role='p' or role='d')";
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