<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['id'];
	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
  border: 1px solid #ddd;
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
</style>
</head>
<body>

<h2>My Current Appointments</h2>

<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for Doctor name.." title="Type in a name">
<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for Day.." title="Type in a name">
<input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search for Date.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:10%;">Appointment id</th>
    <th style="width:20%;">Treatment Status</th>
	<th style="width:20%;">Doctor Name</th>
    <th style="width:15%;">Date</th>
	 <th style="width:15%;">Day</th>
	<th style="width:10%;">Time</th>
		<th style="width:10%;">Cancel Appointment</th>
  </tr>
  
  
  
  
 <?php 

date_default_timezone_set("Asia/Dhaka");
	$today = date('Y-m-d'); 
	$tomorrowUnix = strtotime("+1 day");
	$tomorrowUnixx = strtotime("+2 day");

	 $t_current= date("H:i:s");
//Format the timestamp into a date string
$tomorrowDate = date("Y-m-d", $tomorrowUnix);
$thirddayDate = date("Y-m-d", $tomorrowUnixx);
		$query = "select * from appointment where patient_id=$p";
		
	
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{$i=0;
		
while($row = $result->fetch_assoc()) {
	
 //$query1 = "select * from new_medical_documents where patient_id = '3' ";
 $id=$row["id"];
$app_id[$i]=$id;

 $time=$row["time"];
$app_time[$i]=$time;

$day=$row["day"];
$date=$row["date"];
$app_day[$i]=$day;

//$sug=$row["suggested_medecine"];
//$suggested_medecine[$i]=$sug;
//$ad=$row["advice"];
//$advice[$i]=$ad;

$dr_id=$row["doctor_id"];
$pa_id=$row["patient_id"];

 $i=$i+1;

$que = "select * from doctor where id='$dr_id'";
 $ra = mysqli_query($con,$que);
		if($ra && mysqli_num_rows($ra) > 0)
		{

			$dr_data = mysqli_fetch_assoc($ra);
		}
$query = "select * from patient where id='$pa_id'";
 $res = mysqli_query($con,$query);
		if($res && mysqli_num_rows($res) > 0)
		{

			$pa_data = mysqli_fetch_assoc($res);
		}
		
$query = "select * from doctor_treat_patient where appointment_id='$id'";
 $res = mysqli_query($con,$query);
		if($res && mysqli_num_rows($res) > 0)
		{

			$lv_data = mysqli_fetch_assoc($res);
			$ptr="Next Visit: ".$lv_data['next_visiting_date']."\n";
			
			if($lv_data['next_visiting_date']<=$today)
			{
				$ptr="Treatment Done";
				
			}
		
		}
		else {
			$ptr="Treatment Pending";
				if($date<$today)
			{
				$ptr="You Missed it !!";
				
			}
		}


			 echo '
			  <tr>
    <td>'.$id.'</td>
    <td>'.$ptr.'</td>
	 <td>'.$dr_data['name'].'</td>
	  <td>'.$date.'</td>
    <td>'.$day.'</td>
	 <td>'.$time.'</td>';
	 
if((($date===$today &&$time>=$t_current)||$date===$tomorrowDate||$date===$thirddayDate) AND $ptr==="Treatment Pending")
			{
	  echo '<td><a href="delete.php/?id='.$id.'">cancel</a></td>
			
  </tr>';}
 


		}
		}
		
?>

</table><br>  
<a href="profile.php"><input id="button" value="                back"></a><br><br>  

<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
