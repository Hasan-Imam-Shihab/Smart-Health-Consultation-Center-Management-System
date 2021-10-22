<?php 

session_start();

	include("connection.php");
	include("functions.php");
$user_data = check_login($con);
$NID_no=$user_data['NID_no'];
$query1 = "select * from pre_medical_history where NID_no = '$NID_no' limit 1";
	
	$result1 = mysqli_query($con,$query1);
		if($result1 && mysqli_num_rows($result1) > 0)
		{

			$user_info1 = mysqli_fetch_assoc($result1);
			$id =$user_info1['id'];
		}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted

		$current_medicine = $_POST['current_medicine'];
		$vitamin = $_POST['vitamin'];
		$allergies = $_POST['allergies'];
		$major_surgery_details = $_POST['major_surgery_details'];
		$minor_surgery_details = $_POST['minor_surgery_details'];
		$major_disease_details = $_POST['major_disease_details'];
		$minor_disease_details = $_POST['minor_disease_details'];
		$any_bad_habit = $_POST['any_bad_habit'];
		$any_accidental_case = $_POST['any_accidental_case'];
		
		

		$query = "UPDATE pre_medical_history SET  current_medicine='$current_medicine',vitamin='$vitamin',allergies='$allergies',major_surgery_details='$major_surgery_details',minor_surgery_details='$minor_surgery_details',major_disease_details='$major_disease_details',minor_disease_details='$minor_disease_details',any_bad_habit='$any_bad_habit',any_accidental_case='$any_accidental_case' WHERE id ='$NID_no'";

			mysqli_query($con, $query);
			
	header("Location: total_medical_records.php");
		die;
	}

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
background-image: url(35956.jpg);
background-repeat: no-repeat;
background-size: 100% 200%;
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
		margin: 20;
		width: 650px;
		padding: 0px;
	}

	</style>


		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: red;"><?php echo $user_data['user_name']; ?>'s Medical History</div>

		
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Are you currently Taking Medicine(including over the counter and herbal medicationnnnnn): </div><input id="text" type="text" name="current_medicine"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Do you take vitamin supplements(if yes list below,if no write no): </div><input id="text" type="text" name="vitamin"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Do you have any allergies (if yes list below,if no write no): </div><input id="text" type="text" name="allergies"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Have you ever had any MAJOR surgery(if yes list below,if no write no) : </div><input id="text" type="text" name="major_surgery_details"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Have you ever had any MINOR surgery(if yes list below,if no write no) : </div><input id="text" type="text" name="minor_surgery_details"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Have you ever had any MAJOR DISEASE(if yes list below,if no write no) : </div><input id="text" type="text" name="major_disease_details"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">Have you ever had any MINOR  DISEASE(if yes list below,if no write no) : </div><input id="text" type="text" name="minor_disease_details"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">do you Have any bad habit (if yes list below,if no write no) : </div><input id="text" type="text" name="any_bad_habit"><br><br></div></div>
		<div id="box"><div style="font-size: 20px;margin: 10px;color: black;">do you Have  any accidental case(if yes list below,if no write no) : </div><input id="text" type="text" name="any_accidental_case"><br><br></div></div>
			

	<input id="button" type="submit" value="Submit">
			<a href="total_medical_records.php"><input id="button" value="                Back"></a><br><br>
		</form>


	
</body>
</html>