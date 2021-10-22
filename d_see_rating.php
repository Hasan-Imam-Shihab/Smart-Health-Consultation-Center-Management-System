

<?php
session_start();

	include("connection.php");
	include("doctor_function.php");
$doctor_data = check($con);
$doctor_id=$doctor_data['id'];
 


$query = mysqli_query($con,"SELECT AVG(rating) as AVGRATE from rating_data where doctor_id='$doctor_id'");
$row = mysqli_fetch_array($query);
$AVGRATE=$row['AVGRATE'];
$query = mysqli_query($con,"SELECT count(rating) as Total from rating_data where doctor_id='$doctor_id'");
$row = mysqli_fetch_array($query);
$Total=$row['Total'];
$query = mysqli_query($con,"SELECT count(remark) as Totalreview from  rating_data where doctor_id='$doctor_id'");
$row = mysqli_fetch_array($query);
$Total_review=$row['Totalreview'];
$review = mysqli_query($con,"SELECT remark,rating,email from rating_data where doctor_id='$doctor_id' limit 4 ");


$rating1=mysqli_query($con,"SELECT count(doctor_id) as r1 from  rating_data where doctor_id='$doctor_id' AND rating<=1 AND rating>0");
$row = mysqli_fetch_array($rating1);
$r1=$row['r1'];
$rating2=mysqli_query($con,"SELECT count(doctor_id) as r2 from  rating_data where doctor_id='$doctor_id' AND rating<=2 AND rating>1");
$row = mysqli_fetch_array($rating2);
$r2=$row['r2'];
$rating3= mysqli_query($con,"SELECT count(doctor_id) as r3 from  rating_data where doctor_id='$doctor_id' AND rating<=3 AND rating>2");
$row = mysqli_fetch_array($rating3);
$r3=$row['r3'];
$rating4=mysqli_query($con,"SELECT count(doctor_id) as r4 from  rating_data where doctor_id='$doctor_id' AND rating<=4 AND rating>3");
$row = mysqli_fetch_array($rating4);
$r4=$row['r4'];
$rating5= mysqli_query($con,"SELECT count(doctor_id) as r5 from  rating_data where doctor_id='$doctor_id' AND rating<=5 AND rating>4");
$row = mysqli_fetch_array($rating5);
$r5=$row['r5'];




?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

</head>
<body>




<div class="row container">
<div class="col-md-4 ">
	<h3><b>Rating & Reviews</b></h3>
	<div class="row">
	
		<div class="col-md-6">
			<h3 align="center"><b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star checked" data-rateyo-rating="2" style="font-size:20px;color:#ff9f00;"></i></h3>
			<p><?=$Total;?> Ratings <br> <?=$Total_review;?> Reviews</p>
			</div>
		<div class="col-md-6">
			<?php
			
			
			
			?>
				4.1-5 <i class="fa fa-star checked" data-rateyo-score="2" style="font-size:20px;color:#ff9f00;"></i> Total <?php  echo  $r5; ?><br>
				3.1-4 <i class="fa fa-star checked" data-rateyo-score="2" style="font-size:20px;color:#ff9f00;"></i> Total <?php  echo  $r4; ?><br>
				2.1-3 <i class="fa fa-star checked" data-rateyo-score="2" style="font-size:20px;color:#ff9f00;"></i> Total <?php  echo  $r3; ?><br>
				1.1-2 <i class="fa fa-star checked" data-rateyo-score="2" style="font-size:20px;color:#ff9f00;"></i> Total <?php  echo  $r2; ?><br>
				0.1-1 <i class="fa fa-star checked" data-rateyo-score="2" style="font-size:20px;color:#ff9f00;"></i> Total <?php  echo  $r1; ?><br>
				
				</div>
			<?php	
			
		
				
			?>
			
		</div>
		
	</div>
	
		</div><br><br>
	<table id="myTable">
  <tr class="header">
    <th style="width:40%;">Remark</th>
    <th style="width:40%;">Rating</th>
	    <th style="width:20%;">Date & Time</th>
  </tr>

<?php 

		$query = "select * from rating_data where doctor_id=$doctor_id";
		
	
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{$i=0;
	

		
while($row = $result->fetch_assoc()) {
	
 $id=$row["remark"];
$app_id[$i]=$id;

 $time=$row["rating"];
$app_time[$i]=$time;
$time1=$row["date_time"];

 $i=$i+1;


			 echo '
			  <tr>
    <td>'.$id.'</td>
	 <td>'.$time.'</td>
	 <td>'.$time1.'</td>
  </tr>
			 
';
 
}

		}
		
?>

</table><br>

<a href="doctor_profile.php"><input id="button" value="                back"></a><br><br>  




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>

</html>
