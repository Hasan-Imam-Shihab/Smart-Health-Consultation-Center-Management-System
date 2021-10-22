<?php

function appoinment($con)
{

	if(isset($_SESSION['did']))
	{

		$did = $_SESSION['did'];
		$query = "select * from doctor where NID_no = '$did' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$doctor_data = mysqli_fetch_assoc($result);
			return $doctor_data;
		}
	}

	//redirect to login
	header("Location: information.php");
	die;

}
?>