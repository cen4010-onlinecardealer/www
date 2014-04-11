<?php
include "methods.php";

//From Search button @ main.php
if(isset($_POST['search'])){

	//Initiate connection to the database
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);

	//var_dump($_POST);
	$carPriceMax = intval($_POST['price']);  

	//var_dump ($carPriceMax);

	$carList = "";
	
	//Search by VIN ONLY
	if($_POST['id_vin'] != '')
		{
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND id_vin=".$_POST['id_vin']."");
			if($carList == NULL) {$carListErr = " No VIN could be found";}
		}
	else //Default search parameters No inout on year/make/model/color
		{
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND price <".$carPriceMax."
									ORDER BY price");
		}
		
		if($_POST['year'] != '')//Search by year
		{	
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND year=".$_POST['year']."
									ORDER BY price");
		}
		if($_POST['make'] != '')//Search by make and organize by model
		{
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND make=".$_POST['make']."
									ORDER BY model");
		}
		if($_POST['model'] != '')//Search by model
		{
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND model=".$_POST['model']."
									ORDER BY price");
		}
		if($_POST['color'] != '')//Search by color
		{
			$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
									INNER JOIN make_id ON car.make_id = make_id.make_id
									INNER JOIN model_id ON car.model_id = model_id.model_id
									WHERE status_id=1 AND color=".$_POST['color']."
									ORDER BY price");
		}//End of search
			
	
		
	while($carListDB=mysql_fetch_array($carList)){
		//Show table in HTML Code with Buy Button
	}
	
	//Close connection to DB
	mysql_close($link);
}

?>