<?php 
session_start();

	include("connection.php");

		$query = "select * from doctor";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
		$name=array();
		$NID_no=array();
		$d=array();
		$ins=array();
		$i=0;
		//echo "$i";
		
		echo '<table>
       <tr><th><div style="font-size: 50px;margin: 20px;color: red;">Doctors Information</div></th></tr>

    </table>';
		
while($row = $result->fetch_assoc()) {
 $p=$row["name"];
 $name[$i]=$p; 
 $r=$row["NID_no"];
 $s=$row["designation_id"];
 $NID_no[$i]=$r;
 $j=$i+1;
 
 $q = "select * from designation where id='$s'";
 $r = mysqli_query($con,$q);
		if($r && mysqli_num_rows($r) > 0)
		{

			$data = mysqli_fetch_assoc($r);
		}

 
 

	
echo '<div id="box"><div id="boxx">	<table>
<tr><td><div style="font-size: 30px;margin: 2px;color: #DEDB30;">Doctor '.$j.': '.$p.'</div></td></tr>
       <tr><td><div style="font-size: 20px;margin: 2px;color: white;">'.$data['d1'].'<br> '.$data['d2'].'<br> '.$data['d3'].'<br> '.$data['d4'].'<br> '.$data['d5'].'<br> '.$data['d6'].'</div></td></tr>

	   <tr><td><div style="font-size: 20px;margin: 2px;color: white;">'.$data['job_position'].','.$data['institute'].'</div></td></tr>

    </table></div>
		</div>';

 
 $i=$i+1;
}




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
background-image: url(35956.jpg);
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
		width: 560px;
		padding: 10px;
	}
	#boxx{
		

		background-color: #094E7095;
		margin: 10px;
		width: 500px;
		padding: 20px;
	}

	</style>


		
		<form method="post">
		
	<br><a href="home.php"><input id="button" value="             Home"></a>
		</form>


	
</body>
</html>