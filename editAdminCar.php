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
	$carID=$_POST['carID'];
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
			elseif($model_id=='0'){echo "Error: Car could not be added [Make and Model must be selected]";}
			else{
				mysql_query("INSERT INTO car (id_vin, make_id, model_id, year, condition_id, mileage, color, color_description, comments,
												price, status_id, picture_id)
									VALUES ('".mysql_real_escape_string($id_vin)."', '".$make_id."', '".$model_id."',
											'".$year."', '".$condition_id."', '".$mileage."',
											'".mysql_real_escape_string($color)."', '".mysql_real_escape_string($color_description)."',
											'".mysql_real_escape_string($comments)."', '".mysql_real_escape_string($price)."',
											'".$status_id."', '".$picture_id."')");
				$carID= mysql_insert_id(); 
				echo "Car Added";
			}
			
			
			
		} 
		else{
			if($id_vin==''){echo "Error: Car could not be Updated [VIN must not be empty]";}
			elseif($model_id=='0'){echo "Error: Car could not be Updated [Make and Model must be selected]";}
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
	else{
		if(isset($_POST['make_id'])){
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
		}
	}
	if(isset($_POST['savePic'])){
		if($carID==0){echo "Error: Car must be added first";}
		else{
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& in_array($extension, $allowedExts)){
				if ($_FILES["file"]["error"] > 0){
					echo "Error: " . $_FILES["file"]["error"] . "<br>";
				}
				else{
					/*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
					echo "Type: " . $_FILES["file"]["type"] . "<br>";
					echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					echo "Stored in: " . $_FILES["file"]["tmp_name"];
					*/
					$path= "carPics/".$carID."/";
					if (file_exists($path . $_FILES["file"]["name"])){
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else{
						if ( ! is_dir($path)) {
							mkdir($path);
						}
						move_uploaded_file($_FILES["file"]["tmp_name"],
						$path . $_FILES["file"]["name"]);
						echo "Stored in: " . $path . $_FILES["file"]["name"];
						
						mysql_query("INSERT INTO car_pictures (car_id, pictures_path)
										VALUES('".$carID."', '".$path . $_FILES["file"]["name"]."')");
					}
				}
			}
			else{
				echo "Invalid file";
			}
		}
	}
	if(isset($_POST['delPic'])){
		echo $_POST['picPath'];
		mysql_query("DELETE FROM car_pictures WHERE id_car_pictures='".$_POST['delPicID']."'");
		unlink($_POST['picPath']);
	}
	
}
else{die('No Car Selected');}
?>

<table border='0' width='70%' align='center' name='orgCarInfo'>
	<tr>
		<td colspan='3' align='center'><h3><?php if($carID==0){echo "Add Car";}else{echo "Edit Car";}?></h3></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td><Form name='editCarInfo' method='post' action='editAdminCar.php'>
			<input type='hidden' name='carID' value='<?php echo $carID;?>' />
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
						<fieldset class='divFormat' onchange='this.form.submit()'><legend>Make:</legend>
						<select name='make_id'>
							<option value='0' <?php if($make_id=='0')echo "selected='selected'";?>>Select Make</option>
							<?php 
								$makeQ=mysql_query("SELECT make_id, make from make_id
														ORDER BY make");
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
							<?php 
								$modelQ=mysql_query("SELECT model_id, model from model_id
														WHERE make_id='".$make_id."'
														ORDER BY model_id");
								while($modelQDB=mysql_fetch_array($modelQ)){
									echo "<option value='".$modelQDB['model_id']."'";
											if($modelQDB['model_id']==$model_id){echo "selected='selected'";}
									echo ">".$modelQDB['model']."</option>";
								}
							?>
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
		<td><Form name='editPictures' method='post' action='editAdminCar.php' enctype="multipart/form-data">
			<input type='hidden' name='carID' value='<?php echo $carID;?>' />
			<fieldset class='divFormatHeader'><legend>Pictures</legend>
			<table border='0' width='100%' name='orgCarDetails'>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><legend>Add New Picture:</legend>
							<label for="file">Filename:</label>
							<input type="file" name="file" id="file"><br/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<input type='submit' name='savePic' value='Save'/>
					</td>
				</tr>
				<tr>
					<td valign='top' width='50%'>
						<fieldset class='divFormat'><b>Pictures:</b><br/><br/>
						<?php
							$picsQ=mysql_query("SELECT id_car_pictures, pictures_path from car_pictures
													WHERE car_id=".$carID."");
							while($picsQDB=mysql_fetch_array($picsQ)){
								echo "<img width='100' height='100' src='".$picsQDB['pictures_path']."' alt='No Match in Server' /> <br/>
								<Form name='DelPictures' method='post' action='editAdminCar.php'>
								<input type='hidden' name='carID' value='".$carID."' />
								<input type='hidden' name='delPicID' value='".$picsQDB['id_car_pictures']."' />
								<input type='hidden' name='picPath' value='".$picsQDB['pictures_path']."' />
								<input type='submit' value='Del' name='delPic' />
								</Form>
								<br/><br/>";
							}
						?>
						</fieldset>
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