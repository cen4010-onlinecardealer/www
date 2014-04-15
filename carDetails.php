<?php
$title= "Car Details";
$activeIndex=0;
include "methods.php";
include "header.php";
?>


<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		foreach($_POST as $key => $value)
		{
			if(strpos($key, 'carDetails') === 0)
			{
				$currentCar_id = intval(substr($key, 10));
				//Do the display of the car
			}
		}
	}
	else
	{
		echo "Request method not supported. Please user our main page";
	}
	
	$currentCar=mysql_query("SELECT *, make, model, car_condition_name FROM ocsv2.car
									INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
									INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
									INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
									WHERE status_id=1 AND car_id='".$currentCar_id."'");
														
	$currentPics=mysql_query("SELECT pictures_path FROM ocsv2.car_pictures
												WHERE car_pictures.car_id='".$currentCar_id."'");													
														
	//var_dump($currentCar);
	$_POST['currentCarDB'] = mysql_fetch_array($currentCar);
	$_POST['currentCarPics'] = mysql_fetch_array($currentPics);
	//var_dump($_POST['currentCarDB']['car_id']);
	//var_dump($_POST['currentCarPics']);
	//var_dump($_POST['currentCarPics']['pictures_path']);
?>	

<html>
<body>
	<link href = "css/bootstrap.min.css" rel = "stylesheet"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<table  width='100%' name='carDetailsTable'>
		<th>
			<td align='center'><h3 class = "bg-info img-rounded text">Car Details</h3></td>
		</th>
		
		<tr>
				
			<td width='3%'></td>
			
			
				<td class="col-sm-14 col-md-7">
				  <div class="thumbnail">
					 <img align = "left" height="500" width="500" class = "img-rounded" src="<?php echo $_POST['currentCarPics']['pictures_path'];?>" 
					 alt="Generic placeholder thumbnail">
				  </div>
				  <div>
					<br>
					    &nbsp      
					</br>
				  </div>
					 
				  <div class="caption">
					 <h2>
						<?php echo "".$_POST['currentCarDB']['year']." ".$_POST['currentCarDB']['make']." ".$_POST['currentCarDB']['model']."";?> 
						
						<a href="#" align = "center" class="btn btn-primary pull-right" role="button">
						   Buy Now
						</a> 
					 </h2>
				  </div>
			   </td>
			
			<td valign='top' align ="center" >
				<fieldset class="widget-box center-block"><legend class = "widget-head">Vehicle Specifications</legend>
				<table class = "table table-hover">
					<thead>
							<h4>
								<?php echo "".$_POST['currentCarDB']['year']." ".$_POST['currentCarDB']['make']." ".$_POST['currentCarDB']['model']."";?>
							</h4>
					</thead>
					<tbody>
							<tr>
								<td align ="left" class = "info">
									<?php echo "Price: $".$_POST['currentCarDB']['price']."";?>
								</td>
							</tr>
							<tr>
								<td align ="left" class = "info">
									<?php echo "VIN: ".$_POST['currentCarDB']['id_vin']."";?>
								</td>
							</tr>
							<tr>
								<td align ="left" class = "info">
									<?php echo "Condition: ".$_POST['currentCarDB']['car_condition_name']."";?>
								</td>
							</tr>
							<tr>
								<td align ="left" class = "info">
									<?php echo "Mileage: ".$_POST['currentCarDB']['mileage']."";?>
								</td>
							</tr>
							<tr>
								<td align ="left" class = "info">
									<?php echo "Color : ".$_POST['currentCarDB']['color']." ".$_POST['currentCarDB']['color_description']."";?>
								</td>
							</tr>
							
							<tr>
								<td align = "left" class = "info">
									<?php echo "Comments: ".$_POST['currentCarDB']['comments']."";?>
								</td>
							</tr>
					</tbody>
				</table>
				
			</td>
			<td width='3%'></td>
		</tr>
		<tr>
			<td colspan='5'>
				<br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan='5'>
				<br/><br/>
			</td>
		</tr>
	</table>

	 <!--

 Carousel
    ================================================== 

-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!--

     Indicators 

    -->
    <ol class="carousel-indicators">
		
		<?php
			//Create the data slides for all the pictures in the DB
			(int)$counter = 0;
			$pictureArray ['$counter'] =  $_POST['currentCarPics']['pictures_path'];
			echo "<li class='active' data-slide-to='".$counter."' data-target='#myCarousel'></li>";
			while($pictureCurrent = mysql_fetch_array($currentPics))
			{
				$counter++;
				$pictureArray [$counter] = $pictureCurrent ['pictures_path'];
				//var_dump( $pictureArray);
				echo "<li class='active' data-slide-to='".$counter."' data-target='#myCarousel'></li>";	
			}
			//$_POST['currentNumPics'] = sizeof($_POST['currentCarPics']);
			//var_dump( $_POST['currentNumPics']);
			
		?>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img  align = "middle" alt="First slide" height="100" width="900"  src="<?php echo $_POST['currentCarPics']['pictures_path'];?>"></img>
            <div class="container">
                <div class="carousel-caption">                               
                    <p>
                        <a class="btn btn-lg btn-primary" role="button" href="#">

                            Buy Now

                        </a>
                    </p>
                </div>
            </div>
        </div>
		<?php
			
			for($x=1; $x<=$counter; $x++)
			{	
				echo "
				
						<div class='item'>
							<img  align = 'middle' alt='Slide not Available' height='".intval(500)."' width='".intval(900)."'  src='".$pictureArray[$x]."'></img>
							<div class='container'>
								<div class='carousel-caption'>                               
									<p>
										<a class='btn btn-lg btn-primary' role='button' href='#'>

											Buy Now

										</a>
									</p>
								</div>
							</div>
						</div>
				
				";
				
			}
		
		?>


    </div>
    <a class="left carousel-control" data-slide="prev" href="#myCarousel">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" data-slide="next" href="#myCarousel">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

</div>
<!--

 /.carousel 

-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>

<script src="js/bootstrap.min.js"></script>





</body>
</html>

<?php
include "footer.php";
?>
