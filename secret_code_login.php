<?php 

session_start();

	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$doctor_id=$doctor_data['id'];
//echo $doctor_id;

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$secret_code = $_POST['secret_code'];
		$query = "select * from appointment where doctor_id='$doctor_id' AND secret_code='$secret_code'  ";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			//while($row = $result->fetch_assoc()) {
				// $q = "select * from appointment where secret_code='$secret_code'";
	               // $ra = mysqli_query($con,$q);
		           //  if($ra && mysqli_num_rows($ra) > 0)
		           // {

		               if(!empty($secret_code))
	                	{

			              header("Location:new_medical_documents.php/?secret_code=$secret_code");
			              die;
			
		                }
		              
				  
        }
		 else
		                {
							
		            	echo '<div id="bo"><div style="font-size: 25px;margin: 20px;color: black;">This code is not suitable for this doctor</div></div>';
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
			

			<div style="font-size: 20px;margin: 10px;color: orange;">Enter Secret Code: </div><input id="text" type="text" name="secret_code"><br><br>
			
			<input id="button" type="submit" value="submit">

				<a href="home.php"><input id="button" value="                Back to Home"></a><br><br>
		</form>
	</div>
</body>
</html>