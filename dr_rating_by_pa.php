

<?php
session_start();

	include("connection.php");
	include("functions.php");
$user_data = check_login($con);
$doctor_id=$_GET['id'];
$r=$doctor_id;
	 $patient_id = $user_data["id"];
	//$q = "select * from appointment where doctor_id='$doctor_id'";
// $ra = mysqli_query($con,$q);
	//	if($ra && mysqli_num_rows($ra) > 0)
	//	{

	//		$data = mysqli_fetch_assoc($ra);
	//		$dr_id=$data['doctor_id'];
	//	} 
	
	
	//echo $AVGRATE; 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    $rating = $_POST["rating"];
	 $remark = $_POST["remark"];

    $sql = "INSERT INTO rating_data (doctor_id,rating,patient_id,remark) VALUES ('$doctor_id','$rating','$patient_id','$remark')";
    if (mysqli_query($con, $sql))
    {
      header("Location:http://localhost/project/dr_rating_by_pa.php/?id=$doctor_id");
	  die;
    }
	else
    {
        echo "Error: Rating Already Done";
    }
   
}

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



<div class="container">
    <div class="row">
<div class="col-md-4">
<form  method="post">

    <div>
        <h3>Doctor Rating System</h3>
    </div>

    

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>
<textarea class="form-control" rows="5" placeholder="Write your review here..." name="remark" id="remark" required></textarea><br>
    <div><input type="submit" name="add"> </div>

</form>
</div>
</div>
</div>
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
