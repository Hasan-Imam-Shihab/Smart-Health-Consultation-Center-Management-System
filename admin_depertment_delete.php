<?php 
session_start();


	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);

	$id = $_GET['id']; // get id through query string
	





$sql = "delete from depertment where ID= '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: http://localhost/project/depertment.php");
						die;
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>