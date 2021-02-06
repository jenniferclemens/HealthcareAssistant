<?php
	require 'dbconfig/config.php';
	session_start();
					$fname1=$_SESSION["fname"];
					$lname1=$_SESSION["lname"];
					$dob1=$_SESSION["dob"];
					$gender1=$_SESSION["gender"];
					$country1=$_SESSION["country"];
					$email1=$_SESSION["email"];
					$phone1=$_SESSION["phone"];
					$address1=$_SESSION["address"];
					$ename1=$_SESSION["ename"];
					$ephone1=$_SESSION["ephone"];
					$others1=$_SESSION["others"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
<link rel="stylesheet" href="css/health.css">
</head>
<body>
<div class="main">
	<div class="title"><h2>Account Settings</h2>
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
		<form action="settings.php" id="userfrm" method="post">
			<fieldset>
			<legend style="background-color:#EDF6F9"><b>Personal Details</b></legend>
		
			<label style="margin-left:10px;"><b>First Name:</b></label>
			<input name="fname" type="text" value="<?php echo $fname1 ?>" placeholder="BLOCK LETTERS" /><br><br>
			
			<label style="margin-left:10px;"><b>Last Name:</b></label>
			<input name="lname" type="text" value="<?php echo $lname1 ?>" placeholder="BLOCK LETTERS" /><br><br>
			
			<label style="margin-left:10px;"><b>Date of Birth:</b></label>
			<input type="date" name="dob" value="<?php echo $dob1 ?>"/><br><br>
			
			<label style="margin-left:10px;"><b>Gender:</b></label>
			<input type="radio" name="gender" id="gen" value="F"/>
				<label>Female</label>
			<input type="radio" name="gender" id="gen" value="M"/>
				<label>Male</label>
			<input type="radio" name="gender" id="gen" value="O" checked/>
				<label>Prefer not to Mention</label><br><br>
				
			<label style="margin-left:10px;"><b>Country:</b></label>
			<input type="text" name="country" value="<?php echo $country1 ?>" /><br><br>
			
			<label style="margin-left:10px;"><b>Email ID:</b></label>
			<input type="email" name="emailid" value="<?php echo $email1 ?>"/><br><br>
			
			<label style="margin-left:10px;"><b>Phone Number:</b></label>
			<input type="text" minlength="10" name="phone" value="<?php echo $phone1 ?>"/><br><br>
			
			<label style="margin-left:10px;"><b>Address:</b></label>
			<textarea name="address" rows="4" cols="25" form="userfrm"><?php echo $address1 ?></textarea><br><br>
			
			<label style="margin-left:10px;"><b>Emergency contact(name):</b></label>
			<input type="text" name="ename" value="<?php echo $ename1 ?>"/><br><br>
			
			<label style="margin-left:10px;"><b>Emergency contact(phone number):</b></label>
			<input type="text" name="enumber" minlength="10" value="<?php echo $ephone1 ?>" placeholder="+91" /><br><br>
			
			</fieldset>
			
			<br>
			<fieldset>
			<legend style="background-color:#EDF6F9"><b>Medical Details</b></legend>
		
			<label style="margin-left:10px;"><b>Check whichever apply to you to update your account:</b></label><br>
			<input type="checkbox" value="Anxiety" name="med[]"/>
				<label>Anxiety</label><br>
			<input type="checkbox" value="Alcoholism" name="med[]"/>
				<label>Alcoholism</label><br>
			<input type="checkbox" value="Environmental Allergies" name="med[]"/>
				<label>Environmental allergies</label><br>
			<input type="checkbox" value="Alzheimer's" name="med[]"/>
				<label>Alzheimer's Disease</label><br>
			<input type="checkbox" value="Blodd Disease" name="med[]"/>
				<label>Blood Disease</label><br>
			<input type="checkbox" value="Breathing Problem" name="med[]"/>
				<label>Breathing Problem</label>	<br>
			<input type="checkbox" value="Chest Pain" name="med[]"/>
				<label>Chest Pain</label><br>
			<input type="checkbox" value="Diabetes" name="med[]"/>
				<label>Diabetes</label><br>
			<input type="checkbox" value="Epilepsy" name="med[]"/>
				<label>Epilepsy</label><br>
			<input type="checkbox" value="Heart Pacemaker" name="med[]"/>
				<label>Heart Pacemaker</label><br>
			<input type="checkbox" value="High Cholestrol" name="med[]"/>
				<label>High cholestrol</label><br>
			<input type="checkbox" value="High Blood Pressure" name="med[]"/>
				<label>High Blood Pressure</label><br>
			<input type="checkbox" value="Hives" name="med[]"/>
				<label>Hives</label><br>
			<input type="checkbox" value="Kidney Problems" name="med[]"/>
				<label>Kidney Problems</label><br>
			<input type="checkbox" value="Leukemia" name="med[]"/>
				<label>Leukemia</label><br>
			<input type="checkbox" value="Low Blood Pressure" name="med[]"/>
				<label>Low Blood Pressure</label><br>
			<input type="checkbox" value="Low Cholestrol" name="med[]"/>
				<label>Low Cholestrol</label><br>
			<input type="checkbox" value="Rheumatism" name="med[]"/>
				<label>Rheumatism</label>	<br>
			<input type="checkbox" value="Sinus Trouble" name="med[]"/>
				<label>Sinus Trouble</label><br>
			<input type="checkbox" value="Tuberculosis" name="med[]"/>
				<label>Tuberculosis</label><br>
			<input type="checkbox" value="Ulcer" name="med[]"/>
				<label>Ulcers</label><br>
			<label>Others</label>
				<textarea name="others" rows="1" cols="30" ><?php echo $others1 ?></textarea><br><br>
			
			</fieldset><br>
			
			<fieldset>
			<legend style="background-color:#EDF6F9"><b>Update Password</b></legend>
			
			<label style="margin-left:10px;"><b>Old Password:</b></label> ​
			<input type="password" name="opassword" /> <br><br>
			
			<label style="margin-left:10px;"><b>New Password:</b></label> ​
			<input type="password" name="npassword" /> <br><br>
			
			<label style="margin-left:10px;"><b>Confirm Password:</b></label> ​
			<input type="password" name="cpassword" /> <br>
			
			</fieldset>
			<br><br>
			<center>
			<input id="submit" type="submit" name="submit_btn" value="Update"/><br><br>
			<input  id="reset" type="reset" value="Reset"/><br><br>
			</center>

		<br><br>
		</form>
	</div>
	
</div>
</body>
</html>

<?php

if(isset($_POST['submit_btn']))
	{
		$username=$_SESSION['username'];
		$opassword=$_POST['opassword'];
		$password=$_POST['npassword'];
		$cpassword=$_POST['cpassword'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$country=$_POST['country'];
		$emailid=$_POST['emailid'];
		$med=$_POST['med'];
		$others=$_POST['others'];
		
		
		$query="select * from patient where pusername='$username' and password='$opassword'";
		$query_run=mysqli_query($con,$query);
						
		if(mysqli_num_rows($query_run)>0)
		{
		
		if($password==$cpassword)
		{
			
				$chk="";  
				foreach($med as $chk1)  
				{  
					$chk .= $chk1.", ";  
				}
				$query2="UPDATE `patient` SET `fname`='$fname',`lname`='$lname',`dob`='$dob',`gender`='$gender',`country`='$country',`email`='$email',`phone`='$phone',`address`='$address',`ename`='$ename',`ephone`='$ephone',`medication`='$chk',`others`=$others,`password`='$password' WHERE pusername='$username'";
				$query2_run=mysqli_query($con,$query2);
				
				$query3="UPDATE `phonebook` SET `cname`='$ename',`cphone`='$ephone' WHERE pusername='$username' and role='e'";
				$query3_run=mysqli_query($con,$query3);
				
				if($query2_run && $query3_run)
				{
					echo '<script type="text/javascript">alert("Details Updated.")</script>';
				}
				else 
				{
					echo '<script type="text/javascript">alert("Error!")</script>';
				}
		}
		else
		{
			if($password!=$cpassword)
				echo '<script type="text/javascript">alert("Passwords do not match.")</script>';
			else 
				echo '<script type="text/javascript">alert("Enter password!")</script>';
		}
		}
	}

?>