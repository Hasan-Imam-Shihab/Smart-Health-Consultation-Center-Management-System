<?php 

session_start();

	include("connection.php");
	include("admin_function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from admin where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['password'] === $password)
					{

						$_SESSION['id'] = $admin_data['ID'];
						header("Location: admin_profile.php");
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
	<title>Admin Login</title>
	<!-- CSS -->	
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(35956.jpg);
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
			<div style="font-size: 50px;margin: 20px;color: white;">Admin Login</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">User Name: </div><input id="text" type="text" name="user_name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Password: </div><input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login">
				<a href="home.php"><input id="button" value="                Back to Home"></a>

		</form>
	</div>
</body>
</html>