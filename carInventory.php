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
		$carList=mysql_query("SELECT car_id, id_vin, make_id, model_id, year, color, price, status_id FROM car
								ORDER BY status_id, make_id");
		$line=0;
		while($carListDB=mysql_fetch_array($carList)){
			if($line!=0){
				echo "<tr><td colspan='10'><hr class='tdhead'/></td></tr>";
			}
			$line++;
			echo "<tr>
					<td>".$line."</td><td>".$carListDB['id_vin']."</td><td>".$carListDB['status_id']."</td><td>".$carListDB['make_id']."</td>
					<td>".$carListDB['model_id']."</td><td>".$carListDB['year']."</td><td>".$carListDB['color']."</td><td>".$carListDB['price']."</td>
					<td><Form action='editAdminCar.php' method='Post' name='toEditCar' style='padding:0; margin:0;'>
						<input type='Submit' name='selectCar' value='".$carListDB['car_id']."'/>
						<input type='hidden' name='carID' value='".$carListDB['car_id']."'/>
					</Form></td>
					<td><Form action='carInventory.php' method='Post' name='toDel' style='padding:0; margin:0;'>
						<input type='Submit' name='delCar' value='Del'/>
						<input type='hidden' name='carID' value='".$carListDB['car_id']."'/>
					</Form></td>
				</tr>";
		}
	?>
</table>




<?php
include "footer.php";
?>