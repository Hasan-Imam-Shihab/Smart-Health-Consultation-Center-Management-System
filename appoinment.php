<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
	$a=$user_data['id'];
	$b=$_GET['NID'];
	$i=0;
	$h=0;
	date_default_timezone_set("Asia/Dhaka");
	$today = date('Y-m-d'); 
	$tomorrowUnix = strtotime("+1 day");
	$tomorrowUnixx = strtotime("+2 day");

	 $t_current= date("H:i:s");
//Format the timestamp into a date string
$tomorrowDate = date("Y-m-d", $tomorrowUnix);
$thirddayDate = date("Y-m-d", $tomorrowUnixx);
$ty=$user_data['NID_no'];
$query = "select email from information where NID_no = '$ty' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_info = mysqli_fetch_assoc($result);
		}
		else
			$user_info = NULL;

$query = "select * from con_info where id = '21' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$con_info = mysqli_fetch_assoc($result);
		}
		else
			$con_info = NULL;



	$qu = "select * from doctor where id='$b'";
 $ras = mysqli_query($con,$qu);
		if($ras && mysqli_num_rows($ras) > 0)
		{

			$data = mysqli_fetch_assoc($ras);
			
		}
	
	
	$query = "select * from visiting_hour";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
	$p=array();
	$q=array();
	$gf=array();
	
while($row = $result->fetch_assoc()) {

$p[$i]=$row["appoinment_time"];
$q[$i]=$row["id"];
	
 $i=$i+1;  
		}
		}
		
$query = "select * from available where doctor_id=$b";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
		
while($row = $result->fetch_assoc()) {
 $l=$row["day_id"];
 
 $query = "select * from day where id = '$l' limit 1";
		

		$re = mysqli_query($con,$query);
		if($re && mysqli_num_rows($re) > 0)
		{

			$doctor_info = mysqli_fetch_assoc($re);
			$gf[$h]=$doctor_info['day'];
			
			$h++;
		}
}	
		}
		
		$rt=$data['fee_id'];
		$query = "select * from visit_fee where id = '$rt' limit 1";
		

		$r = mysqli_query($con,$query);
		if($r && mysqli_num_rows($r) > 0)
		{

			$fee_info = mysqli_fetch_assoc($r);
		}
		else{$fee_info=NULL;}

		
		if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$day = $_POST['day'];
		$tim= $_POST['time'];
		
		$time= date("H:i", strtotime($tim));
		$date = $_POST['date'];
		$secret_code = rand(100,100000);
		$doctor_id  = $b;
		$patient_id= $a;
				//Our YYYY-MM-DD date string.
$date = $date;

//Convert the date string into a unix timestamp.
$unixTimestamp = strtotime($date);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

//Print out the day that our date fell on.

		

		if(!empty($time) && !empty($date)&& !empty($day))
		{
			
			$query = "select * from appointment where doctor_id='$b' AND date='$date' AND time='$time' limit 1";
		

		$r = mysqli_query($con,$query);
		if($r && mysqli_num_rows($r) > 0)
		{

		echo '<div id="bo"><div style="font-size: 25px;margin: 20px;color: #0E7B7790;">This Slot already Taken, Try Anothr</div></div>';
			
		}
		else{
			
			
			if(($date===$today &&$time>=$t_current)||$date===$tomorrowDate||$date===$thirddayDate)
			{	
			if($day === $dayOfWeek)
					{
			//save to database
			$query = "insert into appointment (time,date,secret_code,doctor_id,patient_id,day) values ('$time','$date','$secret_code','$doctor_id','$patient_id','$day')";

			$result=mysqli_query($con, $query);
			
			if (!$result) {
			echo "Please Try Again";
			
		} else {
			
			$to_email = $user_info['email'];
			$subject = "Appoinment Confirmation email";
			$body = "Dear Sir,\n Your Appoinment is Confirm to ".$data['name']." \n Appoinment Date: ".$date."\n Day: ".$day."\n Time: ".$tim."\n Secret Code: ".$secret_code."\n Doctor's Fee: ".$fee_info['amount']. "\n Please be present before ".$tim."\n \n".$con_info['name']."\n".$con_info['address']."\n Contact Number: ".$con_info['contact_number']."\n Email Address: ".$con_info['email']."\n";
			$headers = $con_info['name'];

			mail($to_email, $subject, $body, $headers);

			header("Location: http://localhost/project/app_info.php/?NID=$secret_code");
		}


			
			die;
		}
		else
		{
			echo '<div id="bo"><div style="font-size: 25px;margin: 20px;color: #0E7B7790;">Day does not Match with date</div></div>';
		
		}
			}
		else
		{
			echo '<div id="bo"><div style="font-size: 25px;margin: 20px;color: #0E7B7790;">You Can not Take Appoinment for This day and TimeSlot</div></div>';
		
		}	
			
		}
		}
		else
		{
			echo '<div id="bo"><div style="font-size: 25px;margin: 20px;color: #0E7B7790;">Please Enter Some Valid Information</div></div>';
		
		}
		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Make Appoinment</title>
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
	#bo{
		

		background-color: Red;
		margin: 10;
		width: 650px;
		padding: 0px;
	}

	</style>



		<form method="post">

<div id="box">
		<div style="font-size: 25px;margin: 20px;color: red;">Make Your appoinment to <?php echo $data['name']; ?></div>
		<div style="font-size: 15px;margin: 10px;color: red;">Doctor's Fee: BDT <?php echo $fee_info['amount']; ?></div>
	
<div style="font-size: 50;margin: 20px;color: red;">Selecet Day:
<input list="day" name="day" autocomplete="off">
    <datalist id="day" >
        <?php 
          $this_year = $h;
          $start_year = 0;
          while ($start_year <= $this_year) {
              echo "<option>{$gf[$start_year]}</option>";
              $start_year++;
          }
         ?>
     </datalist>
</input><br><br>


Selecet Time Slot:
<input list="time" name="time" autocomplete="off">
    <datalist id="time">
        <?php 
          $this_year = $i;
          $start_year = 0;
          while ($start_year <= $this_year) {
			  $time_in_12_hour_format  = date("g:i a", strtotime($p[$start_year]));
              echo "<option>{$time_in_12_hour_format}</option>";
              $start_year++;
          }
         ?>
     </datalist>
</input><br><br>

<form action="/action_page.php">
  <label for="date">Select Appoinment Date:</label>
  <input type="date" id="date" name="date">
</form></div><br><br>
<input id="button" type="submit" value="Confirm">
	<a href="http://localhost/project/profile.php"><input id="button" value="             Back"></a><br><br>  
		</div>
		</form>
		
		

</body>
</html>