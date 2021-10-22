<?php 
session_start();


	include("connection.php");
	
	include("doctor_function.php");
$doctor_data = check($con);
$pw=$doctor_data['id'];
$dnmae=$doctor_data['name'];

$b=$_GET['secret_code'];

		$query = "select * from appointment where secret_code = '$b'";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{


			$user_info = mysqli_fetch_assoc($result);
			$c=$user_info['patient_id'];
			$aid=$user_info['id'];
		}
		
		$query = "select * from patient where 	id = '$c' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$p_info = mysqli_fetch_assoc($result);
			$p= $p_info['history_id'];
			$pnid= $p_info['NID_no'];
		}
		else
		{$p_info = NULL;}
		
		$query = "select * from information where 	NID_no= '$pnid' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$e_info = mysqli_fetch_assoc($result);
			$email= $e_info['email'];
		}
		else
		{$p_info = NULL;}
		
		$query = "select * from pre_medical_history where id = '$p' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$h_info = mysqli_fetch_assoc($result);
			$h= $h_info['major_disease_details'];
		}
		else
			$h_info = NULL;
		
		$query2 = "select * from new_medical_documents where patient_id = '$c' limit 1";
		$result2 = mysqli_query($con,$query2);
		if($result2 && mysqli_num_rows($result2) > 0)
		{

			$user_info2 = mysqli_fetch_assoc($result2);
			$c=$user_info2['patient_id'];
		}
		else{
		$user_info2 = NULL;}
		$query = "select * from con_info where id = '21' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$con_info = mysqli_fetch_assoc($result);
		}
		else
			$con_info = NULL;
		

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		//something was posted
		$diseases = $_POST['diseases'];
		$remarks = $_POST['remarks'];
	
		
		$suggested_medecine = $_POST['suggested_medecine'];

		$advice = $_POST['advice'];
		
		
		$vdate = $_POST['vdate'];
		
		date_default_timezone_set("Asia/Dhaka");
		$today = date('Y-m-d');
	
		if(!empty($vdate))
		{
			$to_email = $email;
			$subject = "Appoinment Confirmation email";
			$body = "Dear Sir,\n  ".$dnmae." want to see you again at ".$vdate." \n \n".$con_info['name']."\n".$con_info['address']."\n Contact Number: ".$con_info['contact_number']."\n Email Address: ".$con_info['email']."\n";
			$headers = $con_info['name'];

			mail($to_email, $subject, $body, $headers);
			
			
			
		}
		else{
			$vdate=$today;
		}

		$query = "insert into new_medical_documents(diseases,remarks,suggested_medecine,advice,patient_id,doctor_id,secret_code) values('$diseases','$remarks','$suggested_medecine', '$advice','$c','$pw','$b')";

		$result=mysqli_query($con, $query);
		if (!$result) {
			echo "Treatment Already done for this Appoinment";
		} else {
			
			$query = "insert into doctor_treat_patient(appointment_id,next_visiting_date,doctor_id,patient_id) values('$aid','$vdate','$pw', '$c')";

		mysqli_query($con, $query);
			echo "Save successful.";
		}	
			
		//header("Location: http://localhost/project/doctor_profile.php");
		die;
	}
	

	
?>


<!DOCTYPE html>
<html>
<head>

<head>
	<title>Patient's Details</title>
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



<meta name="viewport" content="width=device-width, initial-scale=1">

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 2px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

#box{
		

		background-color: #F6F2F295;
		margin: 20;
		width: 500px;
		padding: 20px;
	}
	#boxx{
		

		background-color: #F6F2F295;
		margin: 20;
		width: 500px;
		padding: 20px;
	}
	#button{

		padding: 10px;
		width: 220px;
		color: white;
		background-color: orange;
		border: none;
	}
	
	#text{

		height: 15px;
		border-radius: 0px;
		padding: 5px;
		border: solid thin #aaaaa;
		width: 90%;
	}


	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>

<button class="tablink" onclick="openPage('Home', this, '#A0EAF9')"id="defaultOpen">Pescribe For the Patient</button>
<button class="tablink" onclick="openPage('News', this, '#A0EAF9')">Pre Medical History</button>
<button class="tablink" onclick="openPage('Contact', this, '#A0EAF9')">Current Medical Records</button>

<div id="News" class="tabcontent">


<div style="font-size: 30px;margin: 20px;color: black;"><?php echo $p_info['user_name']; ?>'s Pre Medical History</div>

		<div id="boxx">	<div style="font-size: 20px;margin: 10px;color: #440932;">Currently Taking Medicine    : <?php echo $h_info['current_medicine']; ?></div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">Vitamin supplements       : <?php echo $h_info['vitamin']; ?> </div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">Allergies        : <?php echo $h_info['allergies']; ?> </div>
		<div style="font-size: 20px;margin: 10px;color: #440932;">MAJOR surgery details            : <?php echo $h_info['major_surgery_details']; ?>  </div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">MINOR surgery details          : <?php echo $h_info['minor_surgery_details']; ?>  </div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">MAJOR DISEASE : <?php echo $h_info['major_disease_details']; ?>  </div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">MINOR DISEASE  : <?php echo $h_info['minor_disease_details']; ?>  </div>
			<div style="font-size: 20px;margin: 10px;color: #440932;">Any bad habit     : <?php echo $h_info['any_bad_habit']; ?>  </div>
	<div style="font-size: 20px;margin: 10px;color: #440932;">Any accidental case         : <?php echo $h_info['any_accidental_case']; ?>  </div></div>
</div>		
<div id="Home" class="tabcontent">
<h2>Pescribe Here</h2>
<table id="myTable">
<form method="post">
  <tr class="header">
  
  </tr>
   <tr>
    <td><div id="box">Disease Name</td>
    <td><div style="font-size: 200px;margin:-10px;color: black;"></div><input id="text" type="text" name="diseases"><br><br></div></td>
  </tr>
 <tr>
    <td><div id="box">Remarks</td>
    <td><div style="font-size: 200px;margin: -10px;color: black;"></div><input id="text" type="text" name="remarks"><br><br></div></td>
  </tr>
   
 <tr>
    <td><div id="box">Suggested Medecine</td>
    <td><div style="font-size: 200px;margin: -10px;color: black;"></div><input id="text" type="text" name="suggested_medecine"><br><br></div></td>
  </tr>
  <tr>
    <td><div id="box">Advice</td>
    <td><div style="font-size: 200px;margin:-10px;color: black;"></div><input id="text" type="text" name="advice"><br><br></div></td>
  </tr>
  <tr>
    <td><div id="box">Next Visiting Date</td>
    <td><div style="font-size: 200px;margin:-10px;color: black;"></div><input id="text" type="date" name="vdate"><br><br></div></td>
  </tr>
  </tr>
  
</table><br><br>
<input id="button" type="submit" value="Submit"> <a href="http://localhost/project/doctor_profile.php"><input id="button" value="             Back"></a><br><br>
  <br><br>
</form>
</div>

<div id="Contact" class="tabcontent">
<div style="font-size: 30px;margin: 20px;color: black;"><?php echo $p_info['user_name']; ?> New Medical History</div>

		<table id="myTable">

 
  <?php 
//echo $q;
		$query = "select * from new_medical_documents where patient_id = '$c'";
		
	
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{$i=0;
		
while($row = $result->fetch_assoc()) {
	
 //$query1 = "select * from new_medical_documents where patient_id = '3' ";
 $date=$row["date_and_time"];
$date_and_time[$i]=$date;
 $di=$row["diseases"];
$diseases[$i]=$di;
$re=$row["remarks"];
$remarks[$i]=$re;
$sug=$row["suggested_medecine"];
$suggested_medecine[$i]=$sug;
$ad=$row["advice"];
$advice[$i]=$ad;

$dr_id=$row["doctor_id"];

 $i=$i+1;

$que = "select * from doctor where id='$dr_id'";
 $ra = mysqli_query($con,$que);
		if($ra && mysqli_num_rows($ra) > 0)
		{

			$data = mysqli_fetch_assoc($ra);
		}

			 echo '
<tr><td><div style="font-size: 30px;margin: 2px;color: Black;">Doctor Name: '.$data['name'].'</div></td></tr>
       <tr><td><div style="font-size: 20px;margin: 2px;color: black;">Date and Time: '.$date.'<br> Disease Name: '.$di.'<br>Doctor Remarks:  '.$re.'<br> Prescribed Medecine: '.$sug.'<br> Advice: '.$ad.'
	  </div></div></div><br><br></td>';
		
 
 
 
}

		}
?>




<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>





