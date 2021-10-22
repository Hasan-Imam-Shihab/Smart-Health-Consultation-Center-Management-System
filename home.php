<?php
session_start();

	include("connection.php");


	
		$query = "select * from con_info where id = '21' limit 1";
		

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$info = mysqli_fetch_assoc($result);
		}
		else
			$info = NULL;
		

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $info['name']; ?></title>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<!-- CSS -->	
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(https://artisana.ro/wp-content/uploads/2018/09/slider2.png);
background-repeat: repeat;
background-size: 100% 120%;
}




.fakeimg {
    height: 200px;
    background: #1E5A87;
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

		padding: 50px;
		width: 100px;
		color: white;
		background-color: orange;
		border: none;
	}

	#box{

		background-color: #1E5A8795;
		margin: 0px;
		width: 100%;
		padding: 0px;
		
		
	}

	</style>

	
	
	
	
	<div class="jumbotron text-center" style="margin-bottom:0">
  <h1><div style="font-size: 30px;margin: 20px;color: #1E5A87;"><b><?php echo $info['name']; ?></b></div></h1>

</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
	
      <li class="nav-item">
        <a class="nav-link" href="login.php">Patient LogIn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctor_login.php">Doctor LogIn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_login.php">Admin LogIn</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About Us</h2>
<!--      <div class="fakeimg">Fake Image</div> -->
      <p><b><?php echo $info['about_1']; ?></b></p>
      <h3>Some Links</h3>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="see.php">See All Our Doctors</a>
        </li>
<!--        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>Quality  Policy</h2>
 <!--     <div class="fakeimg">Fake Image</div> -->

      <p><b><?php echo $info['about_2']; ?></b></p>
      <br>
      <h2>Our Objectives</h2>
	  
   <!--    <div class="fakeimg"><img src="<?php echo $info['image_1']; ?>" alt="Trulli" width="500" height="333"></div> -->

      <p><b><?php echo $info['about_3']; ?></b></p>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Address: <?php echo $info['address']; ?><br>Email: <?php echo $info['email']; ?><br>Contact Number: <?php echo $info['contact_number']; ?></p>


</body>
</html>