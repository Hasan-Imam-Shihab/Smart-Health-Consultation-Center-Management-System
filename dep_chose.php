<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$p=$user_data['id'];
	
	
	$query = "select * from depertment";
		

		$result = mysqli_query($con,$query);
$h=0;
$a_data=array();
$id_data=array();		
while($row = $result->fetch_assoc()) {
 
  $a_data[$h]=$row["dept_name"];
  $id_data[$h]=$row["ID"];
  $h++;

 
}
	
if($_SERVER['REQUEST_METHOD'] == "POST")
	{	
	$dept_id=$_POST['dept_id'];
	if(!empty($dept_id))
		{
			header("Location: information.php/?dept=$dept_id");
						die;
		}
	else{echo 'Select depertment!!';}
	
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


		
		<form method="post">
		
		<table>
   
   <div style="font-size: 20px;margin: 10px;color: orange;">Depertment: 
   <select id="dept_id" name="dept_id">
   
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
		
	<input id="button" type="submit" value="Submit"><br><br>	
	<br><a href="profile.php"><input id="button" value="             Back"></a>
	<a href="logout.php"><input id="button" value="                Logout"></a><br><br>  
		</form>


	
</body>
</html>