<?php 
session_start();

	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);

$admin_ID= $admin_data['ID'];

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];
		$NID_no = $_POST['NID_no'];
		$NID=$NID_no; 
	if(!empty($NID_no) && !empty($password))
	{
		$address = $_POST['address'];
		$age = $_POST['age'];
		$Gender = $_POST['Gender'];
		$contact_number = $_POST['contact_number'];
		$date_of_birth = $_POST['date_of_birth'];
		$profession = $_POST['profession'];
		
		$email = $_POST['email'];
		$height = $_POST['height'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$d1=$_POST['d1'];
		$d2=$_POST['d2'];
		$d3=$_POST['d3'];
		$d4=$_POST['d4'];
		$d5=$_POST['d5'];
		$d6=$_POST['d6'];
		$job_position=$_POST['job_position'];
		$institute=$_POST['institute'];



		$query = "insert into designation (id,d1,d2,d3,d4,d5,d6,job_position,institute) values ('$NID','$d1','$d2','$d3' ,'$d4','$d5','$d6' ,'$job_position','$institute')";

			mysqli_query($con, $query);
			

		$query = "insert into information (address,age,Gender,contact_number,date_of_birth,profession,NID_no,email,height,father_name,mother_name) values ('$address','$age','$Gender','$contact_number', '$date_of_birth', '$profession', '$NID_no', '$email', '$height', '$father_name', '$mother_name')";

			mysqli_query($con, $query);
			
		$query = "insert into doctor (name,password,NID_no,admin_ID,designation_id) values ('$name','$password' ,'$NID_no', '$admin_ID', '$NID')";

			mysqli_query($con, $query);
			

			
	header("Location: admin_profile.php");
		die;
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

	</style>


		
		



<div id="box">
		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: red;">Insert Doctor's Information</div>
			<div style="font-size: 20px;margin: 10px;color: orange;">Full Name: </div><input id="text" type="text" name="name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Password: </div><input id="text" type="password" name="password"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Address: </div><input id="text" type="text" name="address"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Age: </div><input id="text" type="text" name="age"><br><br>
			<table></tr>
   <tr>
    <td><div style="font-size: 20px;margin: 10px;color: orange;">Gender: </div></td>
    <td>
     <input type="radio" id="male" name="Gender" value="Male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="Gender" value="Female">
  <label for="female">Female</label><br>
    </td>
   </tr> 
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
   <div style="font-size: 20px;margin: 10px;color: orange;">Date of Birth Y-M-D: </div><input type="date" id="date_of_birth" name="date_of_birth"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Profession: </div><input id="text" type="text" name="profession"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">NID no: </div><input id="text" type="text" name="NID_no"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Email Address: </div><input id="text" type="text" name="email"><br><br>
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
			<a href="logout.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

		</form>
	</div>




	
		</form>


	
</body>
</html>