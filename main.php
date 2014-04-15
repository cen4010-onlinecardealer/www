<?php
$title= "Main";
$activeIndex=1;
include "methods.php";
include "header.php";
?>


<Form name='' method='POST' target='searchResults' action='Search.php'>
<table border='0'name='orgMain' style='margin-left:auto;margin-right:auto;width:90%;font-size:12'>
	<tr>
		<td width='1%'></td>
		<h1 class = "page-header" align = "center">Vehicle Search</h1>
		
		<td width='1%'></td>
	</tr>
	<tr>
		<td></td>
		<td style='width:8%'>Year</td>
		<td>
			<input type='text' name='year'/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>Make</td>
		<td>
			<input type='text' name='make'/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>Model</td>
		<td>
			<input type='text' name='model'/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>Price</td>
		<td> 
			<select name='price'>
				<option value='500'>$500 or less</option>
				<option value='2000'>$2,000 or less</option>
				<option value='5000'>$5,000 or less</option>
				<option value='10000'>$10,000 or less</option>
				<option value='20000' selected='selected'>$20,000 or less</option>
				<option value='30000'>$30,000 or less</option>
				<option value='49999'>$Less than 50,000 </option>
				<option value='50000'>$50,000 or more</option>
			</select>
		</td> 
		<td colspan='3' align='right'>
			<input type='Submit' name='search' value='Search'/>
		</td>
	</tr>
	<tr style='height:500'>
		<td></td>
		<td colspan='5'>
			<iframe src='Search.php' width='100%' height='500' name='searchResults' frameborder='1'></iframe>
		</td>
		<td></td>
	</tr>
</table>
</Form>




<?php
include "footer.php";
?>
