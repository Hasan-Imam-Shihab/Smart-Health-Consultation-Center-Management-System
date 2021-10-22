<?php 
session_start();

	include("connection.php");
	include("functions.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$con_password = $_POST['con_password'];
		$user_id = $_POST['user_id'];
		$NID_no= $_POST['NID_no'];
		$email = $_POST['email'];
		
		
		
		if($con_password=== $password)
		{
		if(!empty($user_name) && !empty($password)&& !is_numeric($user_name))
		{ $hash = password_hash($password,PASSWORD_DEFAULT);

			//save to database
			$query = "insert into information (NID_no,email) values ('$NID_no','$email')";

			mysqli_query($con, $query);
			
			$query = "insert into patient (user_name,password,user_id,NID_no) values ('$user_name','$hash','$user_id','$NID_no')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
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
			<div style="font-size: 50px;margin: 20px;color: white;">Signup For Free</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">Full Name: </div><input id="text" type="text" name="user_name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">User Id: </div><input id="text" type="text" name="user_id"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Email: </div><input id="text" type="text" name="email"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">NID No: </div><input id="text" type="text" name="NID_no"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Password: </div><input id="text" type="password" name="password"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Confirm Password: </div><input id="text" type="password" name="con_password"><br><br>
			

			<input id="button" type="submit" value="Signup">

			<a href="login.php"><input id="button" value="                Login"></a><br><br>
				<a href="home.php"><input id="button" value="                Back to Home"></a>
		</form>
	</div>
</body>
</html>