<?php
	require 'dbconfig/config.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/health.css">
</head>
<body style="background-color:#83C5BE;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">

<div class="main">
		<div class="title">
		<center><h2 style="font-family:'Times New Roman'; color:black; ">Doctor Sign In</h2></center>
		</div>
		<br><br>
<form action="d_login.php" id="userfrm" method="post">
		<center>
			<label style="margin-left:10px;"><b>User Name:</b></label>
			<input name="username" type="text" required/><br><br><br>
			
			<label style="margin-left:10px;"><b>Password:</b></label> ​
			<input type="password" name="password" required/> 
			
			</fieldset>

		<br><br><br><br>
			<input id="submit" type="submit" name="submit_btn" value="Sign In"/><br><br>
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
		$_SESSION["username"]=$username;
		
		$query="select * from doctor where dusername='$username' and dpassword='$password'";
		$query_run=mysqli_query($con,$query);
		
		if(mysqli_num_rows($query_run)==1)
		{
			echo '<script type="text/javascript">alert("Successfully Logged In.")</script>';
			while($row = $query_run->fetch_assoc()) 
				{
					$_SESSION["dfname"]=$row["dfname"];
					$_SESSION["dlname"]=$row["dlname"];
					$_SESSION["ddob"]=$row["ddob"];
					$_SESSION["dgender"]=$row["dgender"];
					$_SESSION["dcountry"]=$row["dcountry"];
					$_SESSION["demail"]=$row["demail"];
					$_SESSION["dphone"]=$row["dphone"];
					$_SESSION["daddress"]=$row["daddress"];
				}
			header("location: d_homepage.php");
		}
		else
		{
			echo '<script type="text/javascript">alert("Incorrect Credentials.")</script>';
			exit();
		}
	}
?>
