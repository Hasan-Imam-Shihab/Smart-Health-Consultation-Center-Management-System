<?php 
session_start();

	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);

$admin_ID= $admin_data['ID'];

echo'<div id="box">
		
		<form method="post">

			<div style="font-size: 20px;margin: 10px;color: orange;">START TIME: </div><input id="text" type="time" name="start_time"><br><br>
			
			<input id="button" type="submit" value="Submit">
			<a href="admin_profile.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

		</form>
	</div>';

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		
		
		//something was posted
		$start_time = $_POST['start_time'];


		

$query = "insert into visiting_hour (appoinment_time) values ('$start_time')";

			mysqli_query($con, $query);
			
			
	header("Location: t_index.php");
		die;
	}
	
$query = "select * from visiting_hour";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
	
		
		echo '<div id="bx"><table>
       <tr><th><div style="font-size: 50px;margin: 20px;color: red;">VISITING HOUR</div></th></tr>
	   <tr><td><div style="font-size: 30px;margin: 2px;color: #DEDB30;">ID: Time</div></td></tr>

    </table>	</div>';
		
while($row = $result->fetch_assoc()) {
 $p=$row["id"];
 
 $q=$row["appoinment_time"];
 

echo '<div id="b"><table>

       <tr><td><div style="font-size: 30px;margin: 2px;color: #DEDB30;">'.$p.': '.$q.'</td><td><a href="admin_time_delete.php/?id='.$p.'">Delete</a></div></td></tr>

    </table></div>';

}
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
background-repeat: repeat;
background-size: 100% 100%;
}
</style>
</head>
<body>
	
	<style type="text/css">
	
	#text{

		height: 10px;
		border-radius: 0px;
		padding: 10px;
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
		
		width: 500px;
		padding: 50px;
		margin-top:5px;
		margin-left:20px;
	}
	#b{

		background-color: #0E7B7790
;
		margin: auto;
		width: 600px;
		padding: 0px;
		margin-top:10px;
		margin-left:20px;
	}
	#bx{

		background-color: #0E7B7790
;
		margin: auto;
		width: 600px;
		padding: 0px;
		margin-top:30px;
		margin-left:20px;
	}


		
		




	
</body>
</html>