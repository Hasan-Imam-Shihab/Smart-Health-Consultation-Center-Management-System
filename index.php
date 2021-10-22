
<?php 

session_start();

	include("connection.php");
	include("functions.php");
$user_data = check_login($con);
$id=$user_data['NID_no'];

		

//		$result = mysqli_query($con,$query);
//		if($result && mysqli_num_rows($result) > 0)
//		{

//			$info = mysqli_fetch_assoc($result);
		

//		if(!empty($info))
//			{
//				header("Location: Edit_profile.php");
//			}
//		}		

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted

		$address = $_POST['address'];
		$age = $_POST['age'];
		$Gender = $_POST['Gender'];
		$contact_number = $_POST['contact_number'];
		$date_of_birth = $_POST['date_of_birth'];
		$profession = $_POST['profession'];

		$height = $_POST['height'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		

		$query = "insert into information (address,age,Gender,contact_number,date_of_birth,profession,height,father_name,mother_name) values ('$address','$age','$Gender','$contact_number', '$date_of_birth', '$profession', '$height', '$father_name', '$mother_name')";

			mysqli_query($con, $query);
			
	header("Location: profile.php");
		die;
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
background-image: url(35956.jpg);
background-repeat: no-repeat;
background-size: 100% 200%;
}
</style>
	
</head>
<body style="background-color:grey;">

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


			<div style="font-size: 30px;margin: 20px;color: Orange;"><?php echo $user_data['user_name']; ?> Please Enter Some Required Information</div>

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
			
			<div style="font-size: 20px;margin: 10px;color: orange;">Height: </div><input id="text" type="text" name="height"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Father Name: </div><input id="text" type="text" name="father_name"><br><br>
			<div style="font-size: 20px;margin: 10px;color: orange;">Mother Name: </div><input id="text" type="text" name="mother_name"><br><br>

			<input id="button" type="submit" value="Submit">
			<a href="profile.php"><input id="button" value="                Back"></a><br><br>

		</form>
	</div>

</body>
</html>
