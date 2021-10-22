<?php 
session_start();

	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);

$insert= $admin_data['ID'];

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name= $_POST['name'];
		$about_1 = $_POST['about_1'];
		$about_2 = $_POST['about_2'];
		$about_3 = $_POST['about_3'];
		$email = $_POST['email'];
		
		$contact_number	= $_POST['contact_number'];

		$address = $_POST['address'];
		
		$image_1 = $_POST['image_1'];
		$image_2 = $_POST['image_2'];
		$image_3 = $_POST['image_3'];
		
		$image_4 = $_POST['image_4'];

		$logo = $_POST['logo'];
		$query = "UPDATE con_info SET  name='$name',about_1='$about_1',about_2='$about_2',about_3='$about_3',email='$email',contact_number='$contact_number',address='$address' WHERE id ='21'";

			mysqli_query($con, $query);
		

		//$query = "insert into con_info (name,about_1,about_2,about_3,email,contact_number,address,image_1,image_2,image_3,image_4,logo,admin_ID) values ('$name','$about_1','$about_2','$about_3','$email','$contact_number', '$address','$image_1','$image_2','$image_3','$image_4','$logo','$insert')";

			//mysqli_query($con, $query);
			
			
			
			
			
	header("Location: admin_profile.php");
		die;
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<!-- CSS -->	
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(35956.jpg);
background-repeat: no-repeat;
background-size: 100% 300%;
}
</style>
</head>
<body>
	
	<style type="text/css">
	
	#text{

		height: 10px;
		border-radius: 0px;
		padding: 5px;
		border: solid thin black;
		width: 50%;
	}

	#button{

		padding: 10px;
		width: 220px;
		color: white;
		background-color: orange;
		border: none;
	}

	#box{

		background-color: #0E7B7790
;
		margin: auto;
		width: 700px;
		padding: 50px;
	}
	#b{

		background-color: #0E7B7790;
		margin: auto;
		width: 250px;
		padding: 20px;
	}

	</style>


		
		



<div id="box">
		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: red;">Insert Your Organization Information</div>
			<div style="font-size: 20px;margin: 10px;color: orange;">Organization's Name: </div><input id="text" type="text" name="name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">About Us: </div><input id="text" type="text" name="about_1"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Quality Policy: </div><input id="text" type="text" name="about_2"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Our Objectives: </div><input id="text" type="text" name="about_3"><br><br>
			
			<div style="font-size: 20px;margin: 10px;color: orange;">Email Address: </div><input id="text" type="text" name="email"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Contact: </div><input id="text" type="text" name="contact_number"><br><br>
			
			<div style="font-size: 20px;margin: 10px;color: orange;">Address: </div><input id="text" type="text" name="address"><br><br>
<!--
			<div style="font-size: 20px;margin: 10px;color: orange;">image_1: </div><input id="b" type="file" name="image_1"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">image_2: </div><input id="b" type="file" name="image_2"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">image_3: </div><input id="b" type="file" name="image_3"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">image_4: </div><input id="b" type="file" name="image_4"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Logo: </div><input id="b" type="file" name="logo"><br><br><br><br>
			-->
			<input id="button" type="submit" value="Submit">
			<a href="logout.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

		</form>
	</div>





	
</body>
</html>