
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['NID_no'];
	$q=$user_data['id'];
	
		$query = "select * from patient where NID_no = '$p' limit 1";
		$query1 = "select * from pre_medical_history where id = '$p' limit 1";
		$query2 = "select * from new_medical_documents where patient_id = '$q' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_info = mysqli_fetch_assoc($result);
		}
		else{
		$user_info = NULL;}
		
		$result1 = mysqli_query($con,$query1);
		if($result1 && mysqli_num_rows($result1) > 0)
		{

			$user_info1 = mysqli_fetch_assoc($result1);
		}
		else{
		$user_info1 = NULL;}
		
		$result2 = mysqli_query($con,$query2);
		if($result2 && mysqli_num_rows($result2) > 0)
		{

			$user_info2 = mysqli_fetch_assoc($result2);
			$c=$user_info2['patient_id'];
		}
		else{
		$user_info2 = NULL;}
				if($_SERVER['REQUEST_METHOD'] == "post1")
	{
		//echo $c;
	}
		
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: #F5AA9A;}
#News {background-color: #A0EAF9;}
#Contact {background-color: #74F7BB;}


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
		color: black;
		background-color: #E77158;
		border: none;
	}
	#button1{

		padding: 10px;
		width: 220px;
		color: black;
		background-color: #2CA2BF;
		border: none;
	}
	#button2{

		padding: 10px;
		width: 220px;
		color: black;
		background-color: #1CAE58;
		border: none;
	}

	#box{
		

		background-color: #F1907B;
		margin: 20;
		width: 1000px;
		padding: 0px;
	}
	#box1{
		

		background-color: #18BC72;
		margin: 20;
		width: 1000px;
		padding: 0px;
	}
	


</style>
</head>
<body>

<button class="tablink" onclick="openPage('Home', this, '#F5AA9A')"id="defaultOpen">Pre Medical History</button>
<button class="tablink" onclick="openPage('News', this, '#A0EAF9')">Update pre medical records</button>
<button class="tablink" onclick="openPage('Contact', this, '#74F7BB')">Current Medical Records</button>


<div id="Home" class="tabcontent">
 
 </style>


		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: black;"><?php echo $user_data['user_name']; ?>'s Pre Medical History</div>

		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">currently Taking Medicine    : <?php echo $user_info1['current_medicine']; ?></div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Vitamin supplements       : <?php echo $user_info1['vitamin']; ?> </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Allergies        : <?php echo $user_info1['allergies']; ?> </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">MAJOR surgery details            : <?php echo $user_info1['major_surgery_details']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">MINOR surgery details          : <?php echo $user_info1['minor_surgery_details']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">MAJOR DISEASE : <?php echo $user_info1['major_disease_details']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">MINOR DISEASE  : <?php echo $user_info1['minor_disease_details']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Any bad habit     : <?php echo $user_info1['any_bad_habit']; ?>  </div></div>
		<div id="box">	<div style="font-size: 20px;margin: 10px;color: #440932;">Any accidental case         : <?php echo $user_info1['any_accidental_case']; ?>  </div></div>
		
			

	<a href="profile.php"><input id="button" value="                back"></a><br><br>  
		</form>
		
		

</div>

<div id="News" class="tabcontent">
 <a href="medical_history_by_patient.php"><input id="button1" value="Insert/Update medical records"></a><br><br>
 <a href="profile.php"><input id="button1" value="                back"></a><br><br>  
</div>
<div id="Contact" class="tabcontent">
 <div style="font-size: 50px;margin: 20px;color: black;">Current Medical Records</div>
 
	<table id="myTable">

 
  <?php 
//echo $q;
		$query = "select * from new_medical_documents where patient_id = '$q'";
		
	
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

 
  
</table>
<a href="profile.php"><input id="button2" value="                back"></a><br><br>  
</form>
</div>


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
