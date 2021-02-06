<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/health.css">
</head>
<body style="background-color:#83C5BE;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">

<div class="main">
		<div class="title">
		<center><h2 style="font-family:'Times New Roman'; color:black; ">Patient Registration</h2></center>
		</div>
		<br>
<form action="patient_signup.php" id="userfrm" method="post">
		<fieldset>
		<legend style="background-color:#EDF6F9"><b>Personal Details</b></legend>
		
			<label style="margin-left:10px;"><b>First Name:</b></label>
			<input name="fname" type="text" placeholder="BLOCK LETTERS" /><br><br>
			
			<label style="margin-left:10px;"><b>Last Name:</b></label>
			<input name="lname" type="text" placeholder="BLOCK LETTERS" /><br><br>
			
			<label style="margin-left:10px;"><b>Date of Birth:</b></label>
			<input type="date" name="dob"/><br><br>
			
			<label style="margin-left:10px;"><b>Gender:</b></label>
			<input type="radio" name="gender" id="gen" value="F"/>
				<label>Female</label>
			<input type="radio" name="gender" id="gen" value="M"/>
				<label>Male</label>
			<input type="radio" name="gender" id="gen" value="O"/>
				<label>Prefer not to Mention</label><br><br>
				
			<label style="margin-left:10px;"><b>Country:</b></label>
			<input type="text" name="country" value="India" /><br><br>
			
			<label style="margin-left:10px;"><b>Email ID:</b></label>
			<input type="email" name="emailid" /><br><br>
			
			<label style="margin-left:10px;"><b>Phone Number:</b></label>
			<input type="text" minlength="10" name="phone" placeholder="+91" /><br><br>
			
			<label style="margin-left:10px;"><b>Address:</b></label>
			<textarea name="address" rows="4" cols="25" form="userfrm"></textarea><br><br>
			
			<label style="margin-left:10px;"><b>Aadhaar Number:</b></label> ​
			<input type="password" name="aadhaar"/> <br><br>
			
			<label style="margin-left:10px;"><b>Emergency contact(name):</b></label>
			<input type="text" name="ename"/><br><br>
			
			<label style="margin-left:10px;"><b>Emergency contact(phone number):</b></label>
			<input type="text" name="enumber" minlength="10" placeholder="+91" /><br><br>
			
			</fieldset>
			<br>
			<fieldset>
		<legend style="background-color:#EDF6F9"><b>Medical Details</b></legend>
		
			<label style="margin-left:10px;"><b>Do you have any of the following?:</b></label><br>
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
				<textarea name="others" rows="1" cols="30"></textarea><br><br>
			
			</fieldset><br>
			
			<fieldset>
		<legend style="background-color:#EDF6F9"><b>Account Creation</b></legend>
		
			<label style="margin-left:10px;"><b>User Name:</b></label>
			<input name="username" type="text" /><br><br>
			
			<label style="margin-left:10px;"><b>Password:</b></label> ​
			<input type="password" name="password" /> 
			
			<label style="margin-left:10px;"><b>Confirm Password:</b></label> ​
			<input type="password" name="cpassword" /> 
			
			</fieldset>

		<br><br>
		<center>
			<input id="submit" type="submit" name="submit_btn" value="Submit Form"/><br><br>
			<input  id="reset" type="reset" value="Reset"/><br><br>
			<a href="index.php"><input  id="back" type="button" value="Back"/></a><br>
		</center>
		</form>
</div>

</body>
</html>

<?php

	if(isset($_POST['submit_btn']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$country=$_POST['country'];
		$emailid=$_POST['emailid'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$aadhaar=$_POST['aadhaar'];
		$ename=$_POST['ename'];
		$ephone=$_POST['enumber'];
		$med=$_POST['med'];
		$others=$_POST['others'];
		
		
		if($password==$cpassword && $password!=NULL)
		{
			$query="select * from patient where pusername='$username'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				echo '<script type="text/javascript">alert("Username taken. Try another username.")</script>';
			}
			else
			{
				$chk="";  
				foreach($med as $chk1)  
				{  
					$chk .= $chk1.", ";  
				}
				$query2="insert into patient values('$fname','$lname','$dob','$gender','$country','$emailid','$phone','$address','$aadhaar','$ename','$ephone','$chk','$others','$username','$password')";
				$query2_run=mysqli_query($con,$query2);
				
				$fname.=" ".$lname;
				
				$query3="insert into phonebook ('pusername',`cname`, `cphone`,'role') values('$username','$ename','$ephone','e')"; 
                $query3_run=mysqli_query($con,$query3); 

                $query4="insert into phonebook ('pusername',`cname`, `cphone`,'role') values('$username','$fname','$phone','p')"; 
                $query4_run=mysqli_query($con,$query4); 
				
				if($query2_run && $query3_run && $query4_run)
				{
					echo '<script type="text/javascript">alert("User registered. Go back to login page.")</script>';
				}
				else 
				{
					echo '<script type="text/javascript">alert("Error!")</script>';
				}
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
?>
