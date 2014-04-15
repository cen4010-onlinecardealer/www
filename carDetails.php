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
	//var_dump($_POST['id']);
	/*if(isset($_POST['carDetails']))
		{
			echo "<img src='' alt='No Image Available' class='img-rounded'/>";
			echo "<br/><div align='right'><font size='1'><a href='#'>Add Img...</a></font></div>";
		}
	else{echo "Request method not supported";}*/
	
	$currentCar=mysql_query("SELECT *, make, model, car_condition_name FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
									WHERE status_id=1 AND car_id='".$currentCar_id."'");
														
	$currentPics=mysql_query("SELECT pictures_path FROM car_pictures
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
	<link href = "css/bootstrap.min.css" rel = "stylesheet">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<table border='0' width='100%' name='carDetailsTable'>
		<th>
			<td colspan='5' align='center'><h3 class = "panel-heading">Car Details</h3></td>
		</th>
		
		<tr>
				
			<td width='3%'></td>
			
			
				<td class="col-sm-14 col-md-7">
				  <div class="thumbnail">
					 <img src="<?php echo $_POST['currentCarPics']['pictures_path'];?>" 
					 alt="Generic placeholder thumbnail">
				  </div>
				  <div class="caption">
					 <h2>
						<?php echo "".$_POST['currentCarDB']['year']." ".$_POST['currentCarDB']['make']." ".$_POST['currentCarDB']['model']."";?> 
						
						<a href="#" align = "center" class="btn btn-primary pull-right" role="button">
						   Buy Now
						</a> 
						
						
					 </h2>
					 <p></p>
					 <p>
						
						
					 </p>
				  </div>
			   </td>
			
			<td valign='top'>
				<fieldset class='divFormatHeader'><legend>Vehicle Specifications</legend>
				<table border='0' width='100%' name='orgCarDetails' style='font-size:12'>
					<tr>
						<td>
							<b>Make:</b>
						</td>
						<td width='30%'>
							Honda
						</td>
						<td>
							<b>Color:</b>
						</td>
						<td width='30%'>
							RED
						</td>
					</tr>
					<tr>
						<td>
							<b>Model:</b>
						</td>
						<td>
							xls2130
						</td>
						<td>
							<b>Miles:</b>
						</td>
						<td>
							500,000
						</td>
					</tr>
					<tr>
						<td>
							<b>Year:</b>
						</td>
						<td>
							2006
						</td>
						
					</tr>
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
        <li class="" data-slide-to="0" data-target="#myCarousel"></li>
        <li class="active" data-slide-to="1" data-target="#myCarousel"></li>
        <li class="" data-slide-to="2" data-target="#myCarousel"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item">
            <img alt="First slide" data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" src="data:image/svg+xml;base64,PHN2…lyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+"></img>
            <div class="container">
                <div class="carousel-caption">
                    <h1>

                        Example headline.

                    </h1>
                    <p>

                        Note: If you're viewing this page via a 

                        <code>

                            file://

                        </code>

                         URL, the "next" and "previous" Glyphicon buttons …

                    </p>
                    <p>
                        <a class="btn btn-lg btn-primary" role="button" href="#">

                            Sign up today

                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item active">
            <img alt="Second slide" data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" src="data:image/svg+xml;base64,PHN2…5kIHNsaWRlPC90ZXh0Pjwvc3ZnPg=="></img>
            <div class="container">
                <div class="carousel-caption">
                    <h1>

                        Another example headline.

                    </h1>
                    <p>

                        Cras justo odio, dapibus ac facilisis in, egestas …

                    </p>
                    <p>
                        <a class="btn btn-lg btn-primary" role="button" href="#">

                            Learn more

                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item">
            <img alt="Third slide" data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" src="data:image/svg+xml;base64,PHN2…hpcmQgc2xpZGU8L3RleHQ+PC9zdmc+"></img>
            <div class="container">
                <div class="carousel-caption">
                    <h1>

                        One more for good measure.

                    </h1>
                    <p>

                        Cras justo odio, dapibus ac facilisis in, egestas …

                    </p>
                    <p>
                        <a class="btn btn-lg btn-primary" role="button" href="#">

                            Browse gallery

                        </a>
                    </p>
                </div>
            </div>
        </div>
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

<script src="../../dist/js/bootstrap.min.js"></script>

<script src="../../assets/js/docs.min.js"></script>




</body>
</html>

<?php
include "footer.php";
?>
