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
//Scenario 1 - All search fields and >=50000
												
								if( ($_POST['year'] != '') && ($_POST['make'] != '') && ($_POST['model'] != '') && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
               INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
               INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
               INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
               WHERE status_id=1 AND price >= '".$carPriceMax."' AND year='".$_POST['year']."' AND make='".$_POST['make']."' AND model='".$_POST['model']."'
               ORDER BY price");

}
//Scenario 2 - All search fields and <=50000								
								elseif ( ($_POST['year'] != '') && ($_POST['make'] != '') && ($_POST['model'] != '') && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".$carPriceMax."' AND year='".$_POST['year']."' AND make='".$_POST['make']."' AND model='".$_POST['model']."'
															ORDER BY price");
}
//Scenario 3 - Year, make search fields and >=50000								
								elseif ( ($_POST['year'] != '') && ($_POST['make'] != '') && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >='".$carPriceMax."' AND year='".$_POST['year']."' AND make='".$_POST['make']."' ORDER BY price");
									

}
//Scenario 4 - Year, make search fields and <=50000								
								elseif ( ($_POST['year'] != '') && ($_POST['make'] != '') && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".$carPriceMax."' AND year='".$_POST['year']."' AND make='".$_POST['make']."' ORDER BY price");
							
}

//Scenario 5 - Year, model search fields and >=50000								
								elseif ( ($_POST['year'] != '') && ($_POST['model'] != '') && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >='".$carPriceMax."' AND year='".$_POST['year']."' AND model='".$_POST['model']."'
															ORDER BY price");
}

//Scenario 6 - Year, model search fields and <=50000								
								elseif ( ($_POST['year'] != '') && ($_POST['model'] != '') && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".$carPriceMax."' AND year='".$_POST['year']."' AND model='".$_POST['model']."'
															ORDER BY price");
}

//Scenario 7 - Year search fields and >=50000								
								elseif ( ($_POST['year'] != '') && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >='".$carPriceMax."' AND year='".$_POST['year']."' ORDER BY price");
}

//Scenario 8 - Year search fields and <=50000								
								elseif ( ($_POST['year'] != '') && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".$carPriceMax."' AND year='".$_POST['year']."' ORDER BY price");
}

//Scenario 9 - make search field and <=50000								
								elseif ( ($_POST['make'] != '')  && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".$carPriceMax."' AND make='".$_POST['make']."' ORDER BY price");
}


//Scenario 10 - make search field and >=50000								
								elseif ( ($_POST['make'] != '')  && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >='".$carPriceMax."' AND make='".$_POST['make']."' ORDER BY price");
}
//Scenario 11 - model search field and >=50000								
								elseif ( ($_POST['model'] != '')  && ($carPriceMax >= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >='".$carPriceMax."' AND model='".$_POST['model']."' ORDER BY price");
}


//Scenario 12 - model search field and <=50000								
								elseif ( ($_POST['model'] != '')  && ($carPriceMax <= 50000)){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".(int)$carPriceMax."' AND model='".$_POST['model']."' ORDER BY price");
}

//Scenario 13 -  >=50000								
								elseif ( $carPriceMax >= 50000){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price >= '".(int)$carPriceMax."'  ORDER BY price");

//echo "heres is the query value: $carList $carPriceMax ";
}

//Scenario 14 -  <=50000								
								elseif ( $carPriceMax <= 50000){

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 AND price <='".(int)$carPriceMax."' ORDER BY price");

//echo "heres is the query value: $carList $carPriceMax ";

}
								else {

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, condition_id, mileage, make, model, car_condition_name FROM ocsv2.car
															INNER JOIN ocsv2.make_id ON car.make_id = make_id.make_id
															INNER JOIN ocsv2.model_id ON car.model_id = model_id.model_id
															INNER JOIN ocsv2.car_condition ON car.condition_id = car_condition.id_car_condition
															WHERE status_id=1 ORDER BY price");
}
					
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
