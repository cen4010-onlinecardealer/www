<?php
$title= "User List";
$activeIndex=0;
include "methods.php";
include "header.php";
?>
<?php
if (!$db_selected) {
	die ('Can\'t use DB : ' . mysql_error());
}
if(isset($_POST['delUser'])){
	mysql_query("DELETE FROM user
					WHERE uid=".$_POST['userID']."");
}
?>

<table border='0' align='center' class='ACtbl'>
	<tr>
		<td colspan='7' style='text-align:right'>
			<br/>
			<form action='editAdminUser.php' method='post'>
				<input type='Submit' name='addUser' value='Add' />
				<input type='hidden' name='userID' value='0' />
			</form>
		</td>
	</tr>
	<tr>
		<th>Index</th><th>Last Name</th><th>First Name</th><th>username</th><th>User Type</th><th>Edit</th><th>Delete</th>
	</tr>
	<tr>
		<td colspan='9'><hr class='tdhead'/></td>
	</tr>
	<?php
		$userList=mysql_query("SELECT uid, lastName, firstName, username, userType FROM user
								ORDER BY lastName");
		$line=0;
		while($userListDB=mysql_fetch_array($userList)){
			if($line!=0){
				echo "<tr><td colspan='7'><hr class='tdhead'/></td></tr>";
			}
			$line++;
			echo "<tr><td>".$line."</td><td>".$userListDB['lastName']."</td><td>".$userListDB['firstName']."</td>
					<td>".$userListDB['username']."</td><td>".$userListDB['userType']."</td>
					<td><Form action='editAdminUser.php' method='Post' name='toEditUser' style='padding:0; margin:0;'>
						<input type='Submit' name='selectUser' value='Edit'/>
						<input type='hidden' name='userID' value='".$userListDB['uid']."'/>
					</Form></td>
					<td><Form action='userList.php' method='Post' name='toDel' style='padding:0; margin:0;'>
						<input type='Submit' name='delUser' value='Del'/>
						<input type='hidden' name='userID' value='".$userListDB['uid']."'/>
					</Form></td>
				</tr>";
		}
	?>
	
</table>




<?php
include "footer.php";
?>