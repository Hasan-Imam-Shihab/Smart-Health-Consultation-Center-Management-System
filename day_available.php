<?php 
session_start();

	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$doctor_id=$doctor_data['id'];


	
	

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		
		
		//something was posted
		$day_id = $_POST['day'];
		$fee_id=$_POST['fee'];

		

$query = "insert into available (day_id,doctor_id) values ('$day_id','$doctor_id')";

			mysqli_query($con, $query);
			
			
			
	header("Location: day_available.php");
		die;
	}
	
$query = "select * from available where doctor_id=$doctor_id";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
	
		
		echo '<div id="bx"><table>
       <tr><th><div style="font-size: 30px;margin: 20px;color: red;">Your Available Day</div></th></tr>

    </table>	</div>';
		
while($row = $result->fetch_assoc()) {
 $p=$row["day_id"];
 
 $query = "select * from day where id = '$p' limit 1";
		

		$r = mysqli_query($con,$query);
		if($r && mysqli_num_rows($r) > 0)
		{

			$doctor_info = mysqli_fetch_assoc($r);
			$q=$doctor_info['day'];
			
			echo '<div id="b"><table>

       <tr><td><div style="font-size: 30px;margin: 2px;color: #DEDB30;">'.$q.'</td><td><a href="doctor_day_cancel.php/?id='.$p.'">Cancel</a></div></td></tr>

    </table></div>';
		}



}
		}


	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Your Office Day and Fee</title>
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

	</style>

<div id="box">
		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: red;">Insert Office Day:</div>
	
<table>
   
   <div style="font-size: 20px;margin: 10px;color: orange;">DAY: 
   <select id="day" name="day">
      <option value="7">SATURDAY</option>
      <option value="1">SUNDAY</option>
      <option value="2">MONDAY</option>
      <option value="3">TUESDAY</option>
      <option value="4">WEDNESSDAY</option>
      <option value="5">THURSDAY</option>
	  <option value="6">FRIDAY</option>
     </select>
   </div>
   </table>
	

        
			


		
		
<br><br><br>

			<br><br><input id="button" type="submit" value="Submit">
			<a href="doctor_profile.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

  </div>
	<br><br><br><br>
</body>
</html>