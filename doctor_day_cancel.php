<?php 
session_start();
	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$doctor_id=$doctor_data['id'];

	$id = $_GET['id']; // get id through query string
	





$sql = "delete from available where day_id = '$id' AND doctor_id= $doctor_id";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: http://localhost/project/day_available.php");
						die;
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>