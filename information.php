<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['id'];
	$bop=$_GET['dept'];
	
	
	$query = "select * from depertment where ID=$bop ";
		

		$result = mysqli_query($con,$query);

if($result && mysqli_num_rows($result) > 0)
		{

			$dept_data = mysqli_fetch_assoc($result);
		}
	
		$query = "select * from doctor WHERE dept_id='$bop'";
		
		
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
		$name=array();
		$NID_no=array();
		$d=array();
		$ins=array();
		$i=0;
		//echo "$i";
		
		echo '<div style="font-size: 50px;margin: 20px;color: red;">Doctors Information: '.$dept_data['dept_name'].' Depertment </div>';
		
while($row = $result->fetch_assoc()) {
 $p=$row["name"];
 $dd=$row["dept_id"];
 $name[$i]=$p; 
 $r=$row["id"];
 $s=$row["designation_id"];
 $NID_no[$i]=$r;
 $j=$i+1;

 $q = "select * from designation where id='$s'";
 $ra = mysqli_query($con,$q);
		if($ra && mysqli_num_rows($ra) > 0)
		{

			$data = mysqli_fetch_assoc($ra);
		}
$query_d = "select * from depertment where ID= '$dd'";

$ras_d = mysqli_query($con,$query_d);
		if($ras_d && mysqli_num_rows($ras_d) > 0)
		{

			$data_dept = mysqli_fetch_assoc($ras_d);
		}


 
 echo '<div id="box"><table id="myTable">
  <tr class="header">
    <th style="width:50%;"><div id="boxx">
<div style="font-size: 30px;margin: 2px;color: #DEDB30;">Doctor '.$j.': '.$p.'</div>
<div style="font-size: 20px;margin: 2px;color: white;">'.$data['d1'].'<br> '.$data['d2'].'<br> '.$data['d3'].'<br> '.$data['d4'].'<br> '.$data['d5'].'<br> '.$data['d6'].'</div>

<div style="font-size: 20px;margin: 2px;color: white;">'.$data['job_position'].','.$data['institute'].'</div>
</div>	
</th>
    <th style="width:50%;"><div id="boxx">
<div style="font-size: 25px;margin: 30px;color: white;">Depertment: '.$data_dept['dept_name'].'</div>	
<a href="http://localhost/project/appoinment.php/?NID='.$r.'"><input id="button" value="Take Appoinment"></a><br><br><a href="http://localhost/project/dr_rating_by_pa.php/?id='.$r.'"> <input id="button" value="Star Rating"></a>

</div></th>
	
  </tr></table></div>';


 
 $i=$i+1;
}




		}
		
		else 
		{
			echo '<table id="myTable">
  <tr class="header">
    <th style="width:50%;"><div id="boxx">
<div style="font-size: 30px;margin: 2px;color: red;">No Doctor Available From this Depertment</div></tr></table></div>';
		}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Find Doctor</title>
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
		

		background-color: #06375095;
		margin: 20px;
		width: 1130px;
		padding: 10px;
	}
	#boxx{
		

		background-color: #094E7095;
		margin: 10px;
		width: 500px;
		padding: 20px;
	}

	</style>


 
		
		
		
	<br><a href="http://localhost/project/dep_chose.php"><input id="button" value="             Back"></a>
	<a href="http://localhost/project/logout.php"><input id="button" value="                Logout"></a><br><br>  



	
</body>
</html>