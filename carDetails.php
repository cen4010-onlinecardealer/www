<?php
$title= "Car Details";
$activeIndex=0;
include "methods.php";
include "header.php";
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
			<td width='350' height='300' align='center' valign='middle'>
				<img src='' alt='No Image Available' class="img-rounded"/>
				<?php
					var_dump($_POST['carDetails']);
					if(isset($_POST['carDetails']))
						{
							echo "<img src='' alt='No Image Available' class='img-rounded'/>";
							echo "<br/><div align='right'><font size='1'><a href='#'>Add Img...</a></font></div>";
						}
					else{echo "Request method not supported";}
				?>						
			</td>
			<td width='3%'></td>
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
			<td colspan='5'>PICTURES:
				<br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan='5'>Additional Details:
				<br/><br/>
			</td>
		</tr>
	</table>

</body>
</html>

<?php
include "footer.php";
?>
