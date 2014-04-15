<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
include "header.php";
?>

<?php
if (!$db_selected) {
	die ('Can\'t use DB : ' . mysql_error());
}
if(isset($_POST['delCar'])){
	mysql_query("DELETE FROM car
					WHERE car_id=".$_POST['carID']."");
					
	$picsQ=mysql_query("SELECT id_car_pictures, pictures_path from car_pictures
						WHERE car_id=".$_POST['carID']."");
	
	while($picsQDB=mysql_fetch_array($picsQ)){
		unlink($picsQDB['pictures_path']);
	}
	mysql_query("DELETE FROM car_pictures WHERE car_id='".$_POST['carID']."'");
	rmdir("carPics/".$_POST['carID']);
}
?>

<table border='0' align='center' class='ACtbl'>
	<tr>
		<td colspan='10' style='text-align:right'>
			<br/>
			<form action='editAdminCar.php' method='post'>
				<input type='Submit' name='addCar' value='Add' />
				<input type='hidden' name='carID' value='0' />
			</form>
		</td>
	</tr>
	<tr>
		<th>Index</th><th>VIN</th><th>Status</th><th>Make</th><th>Model</th><th>Year</th><th>Color</th><th>Price</th><th>Edit</th><th>Delete</th>
	</tr>
	<tr>
		<td colspan='10'><hr class='tdhead'/></td>
	</tr>
	<?php
		$carList=mysql_query("SELECT car_id, id_vin, car.make_id, car.model_id, year, color, price, status_id, make, model, car_status_desc FROM car
								INNER JOIN make_id ON car.make_id = make_id.make_id
								INNER JOIN model_id ON car.model_id = model_id.model_id
								INNER JOIN car_status ON car.status_id = car_status.id_car_status
								ORDER BY status_id, make_id, id_vin");
		$line=0;
		while($carListDB=mysql_fetch_array($carList)){
			if($line!=0){
				echo "<tr><td colspan='10'><hr class='tdhead'/></td></tr>";
			}
			$line++;
			echo "<tr>
					<td>".$line."</td><td>".$carListDB['id_vin']."</td><td>".$carListDB['car_status_desc']."</td><td>".$carListDB['make']."</td>
					<td>".$carListDB['model']."</td><td>".$carListDB['year']."</td><td>".$carListDB['color']."</td><td>".$carListDB['price']."</td>
					<td><Form action='editAdminCar.php' method='Post' name='toEditCar' style='padding:0; margin:0;'>
						<input type='Submit' name='selectCar' value='".$carListDB['car_id']."' 
							style='font-size:10;
							height:20;width:40;
							padding:0;
						'/>
						<input type='hidden' name='carID' value='".$carListDB['car_id']."'/>
					</Form></td>
					<td><Form action='carInventory.php' method='Post' name='toDel' style='padding:0; margin:0;'>
						<input type='Submit' name='delCar' value='Del' 
							style='font-size:10;
							height:20;width:40;
							padding:0;
							'/>
						<input type='hidden' name='carID' value='".$carListDB['car_id']."'/>
					</Form></td>
				</tr>";
		}
	?>
</table>




<?php
include "footer.php";
?>