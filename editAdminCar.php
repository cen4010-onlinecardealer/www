<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
include "header.php";
include "calendar.php";
?>

<?php
if (!$db_selected) {
		die ('Can\'t use DB : ' . mysql_error());
	}

if(isset($_POST['carID'])){
	if($_POST['carID']==0){
		$id_vin="";
		$make_id="0";
		$model_id="0";
		$year="";
		$condition_id="0";
		$mileage="0";
		$color="";
		$color_description="";
		$comments="";
		$price="";
		$status_id="0";
		$picture_id=0;
	}
	else{
		$car= mysql_query("SELECT car_id, id_vin, make_id, model_id, year, condition_id,
								mileage, color, color_description, comments, price, 
								status_id, picture_id
							From car
							WHERE car_id=".$_POST['carID']."");
		$carDB=mysql_fetch_array($car);
		
		$id_vin=$carDB['id_vin'];
		$make_id=$carDB['make_id'];
		$model_id=$carDB['model_id'];
		$year=$carDB['year'];
		$condition_id=$carDB['condition_id'];
		$mileage=$carDB['mileage'];
		$color=$carDB['color'];
		$color_description=$carDB['color_description'];
		$comments=$carDB['comments'];
		$price=$carDB['price'];
		$status_id=$carDB['status_id'];
		$picture_id=$carDB['picture_id'];
	}
	
	if(isset($_POST['saveCar'])){
		$id_vin=str_replace(' ','',$_POST['id_vin']);
		$make_id=$_POST['make_id'];
		$model_id=$_POST['model_id'];
		$year=$_POST['year'];
		$condition_id=$_POST['condition_id'];
		$mileage=$_POST['mileage'];
		$color=$_POST['color'];
		$color_description=$_POST['color_description'];
		$comments=$_POST['comments'];
		$price=$_POST['price'];
		$status_id=$_POST['status_id'];
		//$picture_id=$_POST['picture_id'];
		
		if($_POST['carID']==0){
			if($id_vin==''){echo "Error: Car could not be added [VIN must not be empty]";}
			else{
				mysql_query("INSERT INTO car (id_vin, make_id, model_id, year, condition_id, mileage, color, color_description, comments,
												price, status_id, picture_id)
									VALUES ('".mysql_real_escape_string($id_vin)."', '".$make_id."', '".$model_id."',
											'".$year."', '".$condition_id."', '".$mileage."',
											'".mysql_real_escape_string($color)."', '".mysql_real_escape_string($color_description)."',
											'".mysql_real_escape_string($comments)."', '".mysql_real_escape_string($price)."',
											'".$status_id."', '".$picture_id."')");
			}
			echo "Car Added";
		} 
		else{
			mysql_query("UPDATE car SET id_vin='".mysql_real_escape_string($id_vin)."',make_id='".$make_id."',
										model_id='".$model_id."', year='".$year."', condition_id='".$condition_id."',
										mileage='".$mileage."', color='".mysql_real_escape_string($color)."', 
										color_description='".mysql_real_escape_string($color_description)."',
										comments='".mysql_real_escape_string($comments)."', 
										price='".mysql_real_escape_string($price)."', 
										status_id='".$status_id."'
							WHERE car_id='".$_POST['carID']."'");
			echo "Car Updated";
		}
	}
}
else{die('No Car Selected');}
?>

<table border='0' width='70%' align='center' name='orgCarInfo'>
	<tr>
		<td colspan='3' align='center'><h3>"Edit Car"</h3></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td><Form name='editCarInfo' method='post' action='editAdminCar.php'>
			<input type='hidden' name='carID' value='<?php echo $_POST['carID'];?>' />
			<fieldset class='divFormatHeader'><legend>Car Details (ID:<?php echo $_POST['carID'];?>)</legend>
			<table border='0' width='100%' name='orgCarDetails'>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>VIN*</legend>
						<input type='text' name='id_vin' style='width:100%' value='<?php echo htmlentities($id_vin, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
					<td valign='top'></td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Make:</legend>
						<select name='make_id'>
							<?php 
								$makeQ=mysql_query("SELECT make_id, make from make_id
														ORDER BY make_id");
								while($makeQDB=mysql_fetch_array($makeQ)){
									echo "<option value='".$makeQDB['make_id']."'";
											if($makeQDB['make_id']==$make_id){echo "selected='selected'";}
									echo ">".$makeQDB['make']."</option>";
								}
							?>
						</select>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Model:</legend>
						<select name='model_id'>
							<option value='0' <?php if($model_id=='0')echo "selected='selected'";?>>Select Model</option>
							<option value='1' <?php if($model_id=='1')echo "selected='selected'";?>>1</option>
						</select>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Year(yyyy):</legend>
						<input type='text' name='year' style='width:100%' onkeypress="return isNumberKey(event)" value='<?php echo htmlentities($year, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Condition:</legend>
						<select name='condition_id'>
							<?php 
								$carCondition=mysql_query("SELECT id_car_condition, car_condition_name from car_condition
														ORDER BY id_car_condition");
								while($carConditionDB=mysql_fetch_array($carCondition)){
									echo "<option value='".$carConditionDB['id_car_condition']."'";
											if($carConditionDB['id_car_condition']==$condition_id){echo "selected='selected'";}
									echo ">".$carConditionDB['car_condition_name']."</option>";
								}
							?>
						</select>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Miles:</legend>
						<input type='text' name='mileage' style='width:100%' onkeypress="return isNumberKey(event)" value='<?php echo htmlentities($mileage, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
					<td valign='top'></td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Color:</legend>
						<input type='text' name='color' style='width:100%' value='<?php echo htmlentities($color, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Color Description:</legend>
						<input type='text' name='color_description' style='width:100%' value='<?php echo htmlentities($color_description, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Comments:</legend>
						<input type='text' name='comments' style='width:100%' value='<?php echo htmlentities($comments, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Price($):</legend>
						<input type='text' name='price' style='width:100%' value='<?php echo htmlentities($price, ENT_QUOTES);?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Status:</legend>
						<select name='status_id'>
							<?php 
								$statusID=mysql_query("SELECT id_car_status, car_status_desc from car_status
														ORDER BY id_car_status");
								while($statusIDDB=mysql_fetch_array($statusID)){
									echo "<option value='".$statusIDDB['id_car_status']."'";
											if($statusIDDB['id_car_status']==$status_id){echo "selected='selected'";}
									echo ">".$statusIDDB['car_status_desc']."</option>";
								}
							?>
						</select>
						</fieldset>
					</td>
					<td valign='top'></td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<input type='submit' name='saveCar' value='Save'/>
					</td>
				</tr>
			</table>					
		</Form></td>
		<td width='3%'></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td><Form name='editPictures' method='post' action='editAdminCar.php'>
			<input type='hidden' name='carID' value='<?php echo $_POST['carID'];?>' />
			<fieldset class='divFormatHeader'><legend>Pictures</legend>
			<table border='0' width='100%' name='orgCarDetails'>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>M:</legend>
						<input type='text' name='m' style='width:100%' value='<?php echo $picture_id;?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>MM:</legend>
						<input type='text' name='MM' style='width:100%' value='<?php echo $model_id;?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<input type='submit' name='savePic' value='Save'/>
					</td>
				</tr>
			</table>					
		</Form></td>
		<td width='3%'></td>
	</tr>
</table>




<?php
include "footer.php";
?>