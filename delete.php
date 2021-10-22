<?php 
session_start();

	include("connection.php");
	include("functions.php");

$user_data = check_login($con);

	$id = $_GET['id']; // get id through query string
	





$sql = "delete from appointment where id= '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>