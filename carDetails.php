<?php
$title= "Car Details";
$activeIndex=0;
include "header.php";
?>

<table border='2' width='100%' name='orgStudentDemographics'>
	<tr>
		<td colspan='5' align='center'><h3>"Car Details"</h3></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td width='350' height='300' align='center' valign='middle'>
			<img src='' alt='No Image Available'/>
			<?php
			if(isset($_POST['editDemo'])){echo "<br/><div align='right'><font size='1'><a href='#'>Add Img...</a></font></div>";}
			else{}
			?>						
		</td>
		<td width='3%'></td>
		<td valign='top'>
			<fieldset class='divFormatHeader'><legend>Specifics</legend>
			<table border='2' width='100%' name='orgCarDetails' style='font-size:12'>
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
		<td colspan='5'>PICTURES</td>
	</tr>
</table>



<?php
include "footer.php";
?>