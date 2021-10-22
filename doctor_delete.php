<?php 
session_start();

	include("connection.php");
	include("doctor_function.php");

$doctor_data= check($con);


	$id = $_GET['id']; // get id through query string
	$pa_id=$_GET['pa_id'];


//echo $pa_id;

//$ras = mysqli_query($con,$sql);
	//	if($ras && mysqli_num_rows($ras) > 0)
	//	{

	//		$data = mysqli_fetch_assoc($ras);
			
			
		//}
		
		 $sql1 = "select * from patient where id= '$pa_id'";
  $ras = mysqli_query($con,$sql1);
		if($ras && mysqli_num_rows($ras) > 0)
		{

		$data = mysqli_fetch_assoc($ras);
		$pa_nid=$data['NID_no'];	
		}
		
		 $sql2 = "select * from information where NID_no= '$pa_nid'";
  $ras1 = mysqli_query($con,$sql2);
		if($ras1 && mysqli_num_rows($ras1) > 0)
		{

		$data1 = mysqli_fetch_assoc($ras1);
		$email =$data1['email'];
			
	
		}
		$app = "select * from appointment where id= '$id'";
		$ras2 = mysqli_query($con,$app);
		if($ras2 && mysqli_num_rows($ras2) > 0)
		{

		$data2 = mysqli_fetch_assoc($ras2);
		$time =$data2['time'];
		$date =$data2['date'];
		$day =$data2['day'];
			
		}
		
		$query = "select * from con_info where id = '21' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$con_info = mysqli_fetch_assoc($result);
		}
		else
			$con_info = NULL;
		
		
$sql = "delete from appointment where id= '$id'";
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
 
		
		    $to_email = $email;
			$subject = "Appoinment is cancelled";
			$body = "Dear Sir,\n For an unavoidable problem,your Appoinment on ".$day." ,".$date." at ".$time." is cancelled.\n We are really sorry for this inconvenience.Please take appointment again"."\n";
			$headers = $con_info['name'];

			mail($to_email, $subject, $body,$headers);

			//header("Location: http://localhost/project/show_doctor_app_list.php");
  
} 
else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>
	