<?php

function check_login($con)
{

	if(isset($_SESSION['uid']))
	{

		$id = $_SESSION['uid'];
		$query = "select * from patient where id = '$id' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: home.php");
	die;

}
