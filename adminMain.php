<?php
$title= "Admin Home";
$activeIndex=0;
include "header.php";
?>

<table border='0' style='width:20%;margin-left:auto;margin-right:auto;margin-top:60'>
<tr><td><fieldset style='border-color: #999999;border-style: solid;background-color:#F9F9F9'>	
	<table width='100%' style='margin-top:15'>
	<tr>
		<td class='tdCenter'><Form name='addAdminF' action='addAdmin.php' method='POST'><input type='Submit' name='addAdmin' value='Add Admin' /></Form></td>
	</tr>
	<tr>
		<td class='tdCenter'><Form name='userListF' action='userList.php' method='POST'><input type='Submit' name='userList' value='User List' /></Form></td>
	</tr>
	<tr>
		<td class='tdCenter'><Form name='carInventoryF' action='carInventory.php' method='POST'><input type='Submit' name='carInventory' value='Car Inventory' /></Form></td>
	</tr>
	<tr>
		<td class='tdCenter'><Form name='reports' action='reports.php' method='POST'><input type='Submit' name='reports' value='Reports' /></Form></td>
	</tr>
	</table>
</fieldset></td></tr>	
</table>






<?php
include "footer.php";
?>