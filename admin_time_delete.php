<?php 
session_start();


	include("connection.php");
	include("admin_function.php");
$admin_data = check_log($con);

	$id = $_GET['id']; // get id through query string
	





$sql = "delete from visiting_hour where id= '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: http://localhost/project/t_index.php");
						die;
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>