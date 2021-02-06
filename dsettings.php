<?php
	require 'dbconfig/config.php';
	session_start();
					$dfname=$_SESSION["dfname"];
					$dlname=$_SESSION["dlname"];
					$ddob=$_SESSION["ddob"];
					$dgender=$_SESSION["dgender"];
					$dcountry=$_SESSION["dcountry"];
					$demail=$_SESSION["demail"];
					$dphone=$_SESSION["dphone"];
					$daddress=$_SESSION["daddress"];
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
	</div>
	<div class="navbar">
		<a href="d_homepage.php">Home</a>
		<a href="patients.php">Patients</a>
		<a href="dphonebook.php">Phonebook</a>
		<a href="index.php" onclick="session_destroy()">Log out</a>
		<a href="dsettings.php">Settings</a>
	</div>
	
	<br>
	
	<div>
		<form action="dsettings.php" id="userfrm" method="post">
		<fieldset>
		<legend style="background-color:#EDF6F9"><b>Personal Details</b></legend>
		
			<label style="margin-left:10px;"><b>First Name:</b></label>
			<input name="fname" type="text" value="<?php echo $dfname ?>" placeholder="BLOCK LETTERS" required/><br><br>
			
			<label style="margin-left:10px;"><b>Last Name:</b></label>
			<input name="lname" type="text" value="<?php echo $dlname ?>" placeholder="BLOCK LETTERS" required/><br><br>
			
			<label style="margin-left:10px;"><b>Date of Birth:</b></label>
			<input type="date" name="dob" value="<?php echo $ddob ?>" required/><br><br>
			
			<label style="margin-left:10px;"><b>Gender:</b></label>
			<input type="radio" name="gender" id="gen" value="F" checked/>
				<label>Female</label>
			<input type="radio" name="gender" id="gen" value="M"/>
				<label>Male</label>
			<input type="radio" name="gender" id="gen" value="O"/>
				<label>Prefer not to Mention</label><br><br>
				
			<label style="margin-left:10px;"><b>Country:</b></label>
			<input type="text" name="country" value="<?php echo $dcountry ?>" value="India" required/><br><br>
			
			<label style="margin-left:10px;"><b>Email ID:</b></label>
			<input type="email" name="emailid" value="<?php echo $demail ?>" required/><br><br>
			
			<label style="margin-left:10px;"><b>Phone Number:</b></label>
			<input type="text" minlength="10" value="<?php echo $dphone ?>" name="phone" placeholder="+91" required/><br><br>
			
			<label style="margin-left:10px;"><b>Address:</b></label>
			<textarea name="address" rows="4" cols="25" form="userfrm"><?php echo $daddress ?>"</textarea><br><br>
			
			</fieldset>
			<br>
			
			<fieldset>
			<legend style="background-color:#EDF6F9"><b>Update Password</b></legend>
			
			<label style="margin-left:10px;"><b>Old Password:</b></label> ​
			<input type="password" name="opassword" required/> <br><br>
			
			<label style="margin-left:10px;"><b>New Password:</b></label> ​
			<input type="password" name="npassword" required/> <br><br>
			
			<label style="margin-left:10px;"><b>Confirm Password:</b></label> ​
			<input type="password" name="cpassword" required/> <br>
			
			</fieldset>

		<br><br>
		<center>
			<input id="submit" type="submit" name="submit_btn" value="Submit Form"/><br><br>
			<input  id="reset" type="reset" value="Reset"/><br><br>
		</center>
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
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		
		
		$query="select * from doctor where dusername='$username' and dpassword='$opassword'";
		$query_run=mysqli_query($con,$query);
						
		if(mysqli_num_rows($query_run)>0)
		{
		
		if($password==$cpassword && $password!=NULL)
		{
				$query2="UPDATE `doctor` SET `dfname`='$fname',`dlname`='$lname',`ddob`='$dob',`dgender`='$gender',`dcountry`='$country',`demail`='$emailid',`dphone`='$phone',`daddress`='$address',`password`='$password' WHERE pusername='$username'";
				$query2_run=mysqli_query($con,$query2);
				
				$fname='Dr. '.$fname;
				
				$query3="UPDATE `phonebook` SET `cname`='$fname',`cphone`='$phone' WHERE cname like '%dfname%'";
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