<!DOCTYPE html>



<html>
	<head>
		<div class="panel panel-default">
			<div class="panel-heading" align = "center">Search Results</div>
			<div class="panel-body">
				<p>User Search parameters goes here</p>
			</div>
	</head>
	<body>
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<table class = "table table-hover" >
			
			<tbody>
				<?php
				
					
					include "methods.php";

					//From Search button @ main.php
					if(isset($_POST['search'])){

						//Initiate connection to the database
						$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
						if (!$link) {die('Not connected : ' . mysql_error());}
						$db_selected = mysql_select_db($dbDb, $link);

						
						$carPriceMax = intval($_POST['price']);  
												
						//Search by VIN ONLY
						if($_POST['id_vin'] != '')
							{
								$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND id_vin='".$_POST['id_vin']."'");
								if($carList == NULL) {$carListErr = " No VIN could be found";}
							}
						else //Default search parameters No input on year/make/model/color
							{
								if($carPriceMax <= 50000)
									{
										$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
															INNER JOIN make_id ON car.make_id = make_id.make_id
															INNER JOIN model_id ON car.model_id = model_id.model_id
															INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <".$carPriceMax."
															ORDER BY price");
									}
								
								else
									{
										$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND price >".$carPriceMax."
														ORDER BY price");
									}
							}
							
							if($_POST['year'] != '')//Search by year
							{	
								$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, car.status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND year='".$_POST['year']."'
														ORDER BY price");
							}
							if($_POST['make'] != '')//Search by make and organize by model
							{
								$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND make='".$_POST['make']."'
														ORDER BY model");
							}
							if($_POST['model'] != '')//Search by model
							{
								$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND model='".$_POST['model']."'
														ORDER BY price");
							}
							if($_POST['color'] != '')//Search by color
							{
								$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM car
														INNER JOIN make_id ON car.make_id = make_id.make_id
														INNER JOIN model_id ON car.model_id = model_id.model_id
														INNER JOIN car_condition ON car.condition_id = car_condition.id_car_condition
														WHERE status_id=1 AND color='".$_POST['color']."'
														ORDER BY price");
							}//End of search
					
						$line = 0;
						//$buyButton = "<button type="button" class="btn btn-primary btn-lg btn-block">Buy</button>";
						while($carListDB=mysql_fetch_array($carList)){						
							
							if($line == 0)
							{
								echo "
									<thead class = 'table table-hover'>
										<tr>
											<td>#</td>
											<td>Year/Make/Model</td>
											<td>Price</td>
											<td>Condition/Milage</td>
											<td></td>
										</tr>
									</thead>";
							}
							$line ++;
						
							//Show table in HTML Code with Buy Button	
							echo "
								<form role='form' method = 'POST' action = 'carDetails.php' target = 'carDetails'>
									<tr>
										<td>".$line."</td>
										<td>".$carListDB['year']." ".$carListDB['make']." ".$carListDB['model']."</td>
										<td>".$carListDB['price']."</td>
										<td>".$carListDB['car_condition_name']." ".$carListDB['mileage']." miles </td>
										<td>
											<input  type='submit' name='carDetails".$carListDB['car_id']."' value = 'Car Details' class='btn btn-primary btn-lg btn-block' >
											
										</td>
									</tr>
								</form>";
						
					}
					
					//Close connection to DB
					mysql_close($link);
					
	}
				?>
				
			</tbody>

		</table>
	</body>
</html>
