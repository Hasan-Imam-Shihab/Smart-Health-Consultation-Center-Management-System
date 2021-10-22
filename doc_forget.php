<?php 

session_start();

	include("connection.php");
	include("doctor_function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];

		if(!empty($email))
		{

			//read from database
			$query = "select * from information where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				$NID=mysqli_fetch_assoc($result);
				$p=$NID['NID_no'];
			$query = "select * from doctor where NID_no = '$p' limit 1";
			$r = mysqli_query($con, $query);
				if($r && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($r);
					$df=$user_data['id'];
					
					$to_email = $email;
			$subject = "User Verification CODE";
			$body = rand(100000,1000000);
			$headers = "Your Verification Code Is";
			

			mail($to_email, $subject, $body, $headers);
			
			
			$plaintext_password = $body;
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
						header("Location: doc_new_pass.php?NID=$df &ID=$hash");
						die;
				}
			}
			
			echo "wrong Email Address";
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
			<div style="font-size: 50px;margin: 20px;color: white;">Enter Your Email Address</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">Email Address: </div><input id="text" type="text" name="email"><br><br>
			
			<input id="button" type="submit" value="Verify">

				<a href="home.php"><input id="button" value="                Back to Home"></a>
		</form>
	</div>
</body>
</html>