<?php 
session_start();

	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$doctor_id=$doctor_data['id'];

$query = "select * from visit_fee";
		

		$result = mysqli_query($con,$query);
$h=0;
$a_data=array();
$id_data=array();		
while($row = $result->fetch_assoc()) {
 
  $a_data[$h]=$row["amount"];
  $id_data[$h]=$row["id"];
  $h++;

 
}	

	
	

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		
		$fee_id=$_POST['fee'];

		
			
			
$query="UPDATE doctor SET fee_id = '$fee_id' WHERE id ='$doctor_id' ";
mysqli_query($con, $query);
			
			
	header("Location: fee.php");
		die;
	}
	
		$rt=$doctor_data['fee_id'];
		$query = "select * from visit_fee where id = '$rt' limit 1";
		

		$r = mysqli_query($con,$query);
		if($r && mysqli_num_rows($r) > 0)
		{

			$fee_info = mysqli_fetch_assoc($r);
		}
		else
		{$fee_info=NULL;}
echo '<div id="bx"><table>
       <tr><th><div style="font-size: 30px;margin: 20px;color: red;">Your Visit Fee</div></th></tr>

    </table>	</div>';
		
			echo '<div id="b"><table>

       <tr><td><div style="font-size: 30px;margin: 2px;color: #DEDB30;">BDT '.$fee_info['amount'].' </div></td></tr>

    </table></div>';
	


	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Your Office Day and Fee</title>
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

		height: 10px;
		border-radius: 0px;
		padding: 10px;
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
		
		width: 500px;
		padding: 50px;
		margin-top:5px;
		margin-left:20px;
	}
	#b{

		background-color: #0E7B7790
;
		margin: auto;
		width: 600px;
		padding: 0px;
		margin-top:10px;
		margin-left:20px;
	}
	#bx{

		background-color: #0E7B7790
;
		margin: auto;
		width: 600px;
		padding: 0px;
		margin-top:30px;
		margin-left:20px;
	}

	</style>

<div id="box">
		
		<form method="post">

			<div style="font-size: 50px;margin: 20px;color: red;">Insert Visit Fee:</div>
	     
			
		
		
<table>
   
   <div style="font-size: 20px;margin: 10px;color: orange;">FEE: 
   <select id="fee" name="fee">
   
		<?php 
          $this_year = $h;
          $start_year = 0;
          while ($start_year <= $this_year) {
              echo "<option value=$id_data[$start_year]>$a_data[$start_year]</option>";
              $start_year++;
          }
         ?>

     </select>
   </div>
   </table><br><br><br><br>

			<br><br><input id="button" type="submit" value="Submit">
			<a href="doctor_profile.php"><input id="button" value="          Back"></a><br><br>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  

  </div>
	<br><br><br><br>
</body>
</html>