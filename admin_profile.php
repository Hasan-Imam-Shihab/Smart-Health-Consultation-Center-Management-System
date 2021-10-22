<?php 
session_start();

	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);
	
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
		

		background-color: lightblue;
		margin: auto;
		width: 500px;
		padding: 50px;
	}

	</style>


		
		<form method="post">
			<div style="font-size: 50px;margin: 20px;color: red;">Welcome to admin Panel</div>

		
<a href="d_index.php"><input id="button" value="          Insert Doctor Information"></a>
	<a href="logout.php"><input id="button" value="          Edit Doctor Information"></a><br><br>
	<a href="t_index.php"><input id="button" value="                INSERT Time Slot"></a>
	<a href="f_index.php"><input id="button" value="                INSERT visit Fee"></a><br><br>
	<a href="app_list.php"><input id="button" value="            See Appoinment List"></a>
	<a href="depertment.php"><input id="button" value="      Insert Depertment"></a><br><br>
	<a href="http://localhost/project/con_info.php"><input id="button" value="             Edit/Insert Organization Information"></a>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  
		</form>


	
</body>
</html>