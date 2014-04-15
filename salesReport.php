<?php
$title= "Sales";
$activeIndex=0;
include "methods.php";

if(isset($_POST['generate'])){
	
	
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);
	
	if (!$db_selected) {
		die ('Can\'t use DB : ' . mysql_error());
	}
	
	

}
else{die();}
		
?>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body style='background-color: white;'>

<h1>Sold Cars</h1>
<table border='0' align='center' class='ACtbl'>
	<tr>
		<th>Index</th><th>VIN</th><th>Status</th><th>Make</th><th>Model</th><th>Year</th><th>Color</th><th>Price</th>
	</tr>
	<tr>
		<td colspan='10'><hr class='tdhead'/></td>
	</tr>
	<?php
		$carList=mysql_query("SELECT car_id, id_vin, car.make_id, car.model_id, year, color, price, status_id, make, model, car_status_desc FROM car
								INNER JOIN make_id ON car.make_id = make_id.make_id
								INNER JOIN model_id ON car.model_id = model_id.model_id
								INNER JOIN car_status ON car.status_id = car_status.id_car_status
								WHERE car.status_id='2'
								ORDER BY status_id, make_id");
		$line=0;
		while($carListDB=mysql_fetch_array($carList)){
			if($line!=0){
				echo "<tr><td colspan='10'><hr class='tdhead'/></td></tr>";
			}
			$line++;
			echo "<tr>
					<td>".$line."</td><td>".$carListDB['id_vin']."</td><td>".$carListDB['car_status_desc']."</td><td>".$carListDB['make']."</td>
					<td>".$carListDB['model']."</td><td>".$carListDB['year']."</td><td>".$carListDB['color']."</td><td>".$carListDB['price']."</td>
					
				</tr>";
		}
	?>
</table>

</body>