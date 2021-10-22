<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from information where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				$NID=mysqli_fetch_assoc($result);
				$p=$NID['NID_no'];
			$query = "select * from patient where NID_no = '$p' limit 1";
			$r = mysqli_query($con, $query);
				if($r && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($r);
					$hash=$user_data['password'];
					 $verify = password_verify($password, $hash);
					if($verify)
					{

						$_SESSION['uid'] = $user_data['id'];
						header("Location: profile.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}
		else
		{
			echo "Field is Empty!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
		<!-- CSS -->	
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(https://artisana.ro/wp-content/uploads/2018/09/slider2.png);
background-repeat: no-repeat;
background-size: 100% 100%;
}



</style>
	
</head>
<body style="background-color:grey;">

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
			<div style="font-size: 50px;margin: 20px;color: white;">Login</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">Email Address: </div><input id="text" type="text" name="email"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Password: </div><input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login">

			<a href="signup.php"><input id="button" value="                SignUp"></a><br><br>
				<a href="home.php"><input id="button" value="                Back to Home"></a>
				<a href="forget.php">Forget Password?</a>
		</form>
	</div>
</body>
</html>