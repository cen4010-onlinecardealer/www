<?php
$title= "User List";
$activeIndex=0;
include "header.php";
?>

<table border='2' align='center'>
	<tr>
		<td colspan='6' align='right'>
			<form action='profile.php' method='post'>
				<input type='Submit' name='addUser' value='Add' />
				<input type='hidden' name='userId' value='0' />
			</form>
		</td>
	</tr>
	<tr>
		<th>Index</th><th>Last Name</th><th>First Name</th><th>username</th><th>Edit</th><th>Delete</th>
	</tr>
	
	
</table>




<?php
include "footer.php";
?>