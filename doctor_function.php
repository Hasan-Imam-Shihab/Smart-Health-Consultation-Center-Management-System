<?php

function check($con)
{

	if(isset($_SESSION['nid']))
	{

		$nid = $_SESSION['nid'];
		$query = "select * from doctor where NID_no = '$nid' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$doctor_data = mysqli_fetch_assoc($result);
			return $doctor_data;
		}
	}

	//redirect to login
	header("Location: home.php");
	die;

}
