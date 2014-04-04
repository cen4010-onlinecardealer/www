<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
include "header.php";
?>

<table border='2' align='center'>
	<tr>
		<td>Sunshine Sale Reports</td>
	</tr>
	<tr>
		<td><form target='salesReport' method='post' action='salesReport.php'>
			From: <input type='text' name='from' value=''/> To: <input type='text' name='to' value=''/>
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