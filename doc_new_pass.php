<?php 
session_start();

	include("connection.php");
	include("doctor_function.php");
	$b=$_GET['NID'];
	$bc=$_GET['ID'];

	
	
	
	$query = "select * from doctor where id = '$b' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$doctor_data = mysqli_fetch_assoc($result);
		//	$name=$doctor_data['name'];
		}
		


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$password = $_POST['password'];
		$con_password = $_POST['con_password'];
		$verification=$_POST['verification'];
		
		$verify = password_verify($verification, $bc);
  
  // Print the result depending if they match
		if ($verify)
		{
		if($con_password=== $password)
		{
		if(!empty($password))
		{
			$plaintext_password = $password;
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
			$query = "UPDATE doctor SET  password='$hash' WHERE id ='$b'";

			$result=mysqli_query($con, $query);
		if (!$result) {
			echo "Please Try Again";
			
		} else {
			header("Location: http://localhost/project/doctor_login.php");
		die;}
		}
		else
		{
			echo "Please enter some valid information!";
		
		}
		}
		else
		{
			echo "Password did not Match";
		
		}
		
		}
		else
		{
			echo "Verification CODE did not Match";
		
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	
		<!-- CSS -->	
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(https://artisana.ro/wp-content/uploads/2018/09/slider2.png);
background-repeat: repeat;
background-size: 100% 100%;
}


</style>
	
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 15px;
		border-radius: 7px;
		padding: 5px;
		border: solid thin #aaaaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 220px;
		color: white;
		background-color: orange;
		border: none;
	}

	#box{
		

		background-color: #1E5A8795;
		margin: auto;
		width: 500px;
		padding: 50px;
	}

	</style>


	<div id="box">

		<form method="post">
			<div style="font-size: 30px;margin: 10px;color: white;"><?php echo $doctor_data['name']; ?> Enter New Password</div>
<div style="font-size: 20px;margin: 10px;color: orange;">Verification Code: </div><input id="text" type="text" name="verification"><br><br>
			
			<div style="font-size: 20px;margin: 10px;color: orange;">New Password: </div><input id="text" type="password" name="password"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Confirm Password: </div><input id="text" type="password" name="con_password"><br><br>
			

			<input id="button" type="submit" value="Submit">

				<a href="home.php"><input id="button" value="                Back to Home"></a>
		</form>
	</div>
</body>
</html>