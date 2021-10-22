<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['NID_no'];
	$b=$_GET['NID'];
	
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
		
		
		
	$query = "select * from appointment where 	secret_code = '$b' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$app_info = mysqli_fetch_assoc($result);
		}
		else
			$app_info = NULL;
		
		
	$query = "select * from doctor where 	id = '$app_info[doctor_id]' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$doc_info = mysqli_fetch_assoc($result);
		}
		else
			$doc_info = NULL;
	$query = "select * from information where NID_no = '$doc_info[NID_no]' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$d_info = mysqli_fetch_assoc($result);
		}
		else
			$d_info = NULL;
		
	$query = "select * from con_info where id = '21' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$con_info = mysqli_fetch_assoc($result);
		}
		else
			$con_info = NULL;
	
	$rt=$doc_info['fee_id'];

		$query = "select amount from visit_fee where id = '$rt' limit 1";
		

		$r = mysqli_query($con,$query);
		if($r && mysqli_num_rows($r) > 0)
		{

			$fee_info = mysqli_fetch_assoc($r);
		}
		else{$fee_info=NULL;}
	
    
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
p {text-align: center;}

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
		

		background-color: #F6F2F295;
		margin: 10;
		width: 650px;
		padding: 50px;
	}

	</style>



		
		<form method="post">
		
<div id="box"><div style="font-size: 35px;margin: 5px;color: Black;"><p><b><?php echo $con_info['name']; ?></p></b></div>
			<div style="font-size: 25px;margin: 5px;color: Black;"><p>Appoinment Information</p></div>
			<div style="font-size: 20px;margin: 5px;color: grey;"><p>Here is Your Appoinment Form: Keep it safe</p></div>
<br><br><div style="font-size: 15px;margin: 5px;color: black;"><b>Patient Information: </b></div>
<div style="font-size: 12px;margin: 5px;color: black;">Name: <?php echo $user_data['user_name']; ?></div>
<div style="font-size: 12px;margin: 5px;color: black;">Age: <?php $bday = new DateTime($dateOfBirth); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
printf(' %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
printf("\n");?> </div>
<div style="font-size: 12px;margin: 5px;color: black;">Gender: <?php echo $user_info['Gender']; ?></div>
<div style="font-size: 12px;margin: 5px;color: black;">Contact Number: <?php echo $user_info['contact_number']; ?></div>
<div style="font-size: 12px;margin: 5px;color: black;">Email Address: <?php echo $user_info['email']; ?></div><br><br>
<div style="font-size: 12px;margin: 5px;color: black;">Appoinment Date: <?php echo $app_info['date']; ?> </div>
<div style="font-size: 12px;margin: 5px;color: black;">Day: <?php echo $app_info['day']; ?></div>
<div style="font-size: 12px;margin: 5px;color: black;">Appoinment Time: <?php echo date("g:i a", strtotime($app_info['time'])); ?> </div>
<div style="font-size: 12px;margin: 5px;color: black;">Secret Code: <?php echo $b ?></div>

<br><br><div style="font-size: 15px;margin: 5px;color: black;"><b>Doctor Information: </b></div>
<div style="font-size: 12px;margin: 5px;color: black;">Name: <?php echo $doc_info['name']; ?> </div>
<div style="font-size: 12px;margin: 5px;color: black;">Email Address: <?php echo $d_info['email']; ?></div><br><br>
<div style="font-size: 12px;margin: 5px;color: black;"><b>Doctor's Fee: BDT <?php echo $fee_info['amount']; ?></b></div><br><br>
<br><br><div style="font-size: 15px;margin: 5px;color: black;"><b>Thank You: Get Well Soon</b></div><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="http://localhost/project/profile.php"><input id="button" value="             Back"></a><button onclick="window.print()">Print</button><br><br>
  
		</form>
</div>

	
</body>
</html>