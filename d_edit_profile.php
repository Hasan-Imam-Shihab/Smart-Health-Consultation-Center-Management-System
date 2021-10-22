<?php 
session_start();

	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$NID_no=$doctor_data['NID_no'];
$q=$doctor_data['designation_id'];
//$NID_no=$doctor_data['NID_no'];





if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted


		

		$address = $_POST['address'];


		$contact_number = $_POST['contact_number'];
		$date_of_birth = $_POST['date_of_birth'];

		$height = $_POST['height'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$d1=$_POST['d1'];
		$d2=$_POST['d2'];
		$d3=$_POST['d3'];
		$d4=$_POST['d4'];
		$d5=$_POST['d5'];
		$d6=$_POST['d6'];
		$d5=$_POST['d5'];
		$d6=$_POST['d6'];
		$job_position=$_POST['job_position'];
		$institute=$_POST['institute'];


		$query = "UPDATE information SET address='$address',contact_number='$contact_number',date_of_birth='$date_of_birth',height='$height',father_name='$father_name',mother_name='$mother_name' WHERE NID_no='$NID_no'";

			mysqli_query($con, $query);
			
			
			
			
			
		$query = "UPDATE designation SET d1='$d1',d2='$d2',d3='$d3',d4='$d4',d5='$d5',d6='$d6',job_position='$job_position',institute='$institute' WHERE id='$q'";

			mysqli_query($con, $query);
			
	header("Location: doctor_profile.php");
		die;
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit by doctor</title>
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

		background-color: #0E7B7790;
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

			<div style="font-size: 50px;margin: 20px;color: red;">Edit Your Information</div>

			<div style="font-size: 20px;margin: 10px;color: orange;">Address: </div><input id="text" type="text" name="address"><br><br>
			

			<table>
   
   <div style="font-size: 20px;margin: 10px;color: orange;">Contact Number: </div>
   <select>
      <option>+88</option>
      <option>+97</option>
      <option>+1</option>
      <option>+82</option>
      <option>+45</option>
      <option>+33</option>
     </select>
   <input type="phone" name="contact_number">
   
   </table>

			

			<div style="font-size: 20px;margin: 10px;color: orange;">Date of Birth: </div>
			<input type="date" id="date_of_birth" name="date_of_birth"><br><br>



			<div style="font-size: 20px;margin: 10px;color: orange;">Height: </div><input id="text" type="text" name="height"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Father Name: </div><input id="text" type="text" name="father_name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Mother Name: </div><input id="text" type="text" name="mother_name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_1(if no, skip): </div><input id="text" type="text" name="d1"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_2(if no, skip): </div><input id="text" type="text" name="d2"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_3(if no, skip): </div><input id="text" type="text" name="d3"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_4(if no, skip): </div><input id="text" type="text" name="d4"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_5(if no, skip): </div><input id="text" type="text" name="d5"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Designation_6(if no, skip): </div><input id="text" type="text" name="d6"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Job Designation(if no, skip): </div><input id="text" type="text" name="job_position"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Institute(if no skip): </div><input id="text" type="text" name="institute"><br><br>
			

			<input id="button" type="submit" value="Submit">
			<a href="doctor_profile.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

		</form>
	</div>




	
		</form>


	
</body>
</html>