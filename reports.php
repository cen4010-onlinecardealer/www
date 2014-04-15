<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
include "header.php";
include "calendar.php";
?>

<table border='2' align='center' width='75%'>
	<tr>
		<td>Sunshine Sale Reports</td>
	</tr>
	<tr>
		<td><form target='salesReport' method='post' style='text-align:right' action='salesReport.php'>
			<!-- From: <input type='text' name='from' onclick="ds_sh(this);"  value=''/> 
			To: <input type='text' name='to' onclick="ds_sh(this);"  value=''/>-->
					<input type='Submit' name='generate' value='Generate' />
		</td>
	</tr>
	<tr><td>
		<iframe src='salesReport.php' width='100%' height='500' name='salesReport' frameborder='1'></iframe>
	</td></tr>
</table>




<?php
include "footer.php";
?>