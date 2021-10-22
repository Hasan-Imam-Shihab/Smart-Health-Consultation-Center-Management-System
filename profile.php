<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['NID_no'];
	
	$query = "select * from information where NID_no = '$p' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_age = mysqli_fetch_assoc($result);
		}


$dateOfBirth = $user_age['date_of_birth'];
	
	
	
		$query = "select * from information where NID_no = '$p' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_info = mysqli_fetch_assoc($result);
		}
		else
			$user_info = NULL;
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user_data['user_name']; ?></title>
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
		

		background-color: #0E7B7790;
		margin: 10;
		width: 650px;
		padding: 0px;
	}

	</style>



		
		<form method="post">
		

			<div style="font-size: 50px;margin: 20px;color: red;"><?php echo $user_data['user_name']; ?>'s Profile</div>
			
		<a href="Edit_profile.php"><input id="button" value="             Edit Profile"></a> 
		<a href="total_medical_records.php"><input id="button" value=" Your Medical Records"></a><br><br>
	<a href="dep_chose.php"><input id="button" value="    See Doctor's Information"></a>
	<a href="show_pa_app_list.php"><input id="button" value="    All Your Appoinment"></a><br><br>

		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Full Name      : <?php echo $user_data['user_name']; ?></div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">User Id        : <?php echo $user_data['user_id']; ?> </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Address        : <?php echo $user_info['address']; ?> </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Age            :<?php $bday = new DateTime($dateOfBirth); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
printf(' %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
printf("\n");?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Gender         : <?php echo $user_info['Gender']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Contact Number : <?php echo $user_info['contact_number']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Date Of Birth  : <?php echo $user_info['date_of_birth']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Profession     : <?php echo $user_info['profession']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">NID NO         : <?php echo $user_info['NID_no']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">E-mail         : <?php echo $user_info['email']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Height         : <?php echo $user_info['height']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Father's Name  : <?php echo $user_info['father_name']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Mother's Name  : <?php echo $user_info['mother_name']; ?> </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Joining Date & Time   : <?php echo $user_data['date']; ?></div></div>
			

	
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  
		</form>


	
</body>
</html>