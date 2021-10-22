<?php 

session_start();

	include("connection.php");
	include("doctor_function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$NID_no = $_POST['NID_no'];
		$password = $_POST['password'];

		if(!empty($NID_no) && !empty($password))
		{

			//read from database
			$query = "select * from doctor where NID_no = '$NID_no' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$doctor_data = mysqli_fetch_assoc($result);
					
					
				if(password_verify($password,$doctor_data['password']))
					{

						$_SESSION['nid'] = $doctor_data['NID_no'];
						header("Location: doctor_profile.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username ";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Login</title>
	
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
			<div style="font-size: 50px;margin: 20px;color: white;">Doctor Login</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">NID No: </div><input id="text" type="text" name="NID_no"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Password: </div><input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login">
				<a href="home.php"><input id="button" value="                Back to Home"></a><br><br>
				<a href="doc_forget.php">Forget Password?</a>

		</form>
	</div>
</body>
</html>