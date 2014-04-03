<?php
$title= "Add Admin";
$activeIndex=0;
include "header.php";
?>
<!-- Error: Admin could not be added -->
<table align='center'>
	<tr>
		<td><Form name='addAdmin' method='post' action='addAdmin.php'>
			<fieldset class='divFormatHeader'><legend>Add Admin</legend>
			<table border='0' width='100%' name='orgAddAdmin'>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>username:</legend>	
							<input type='text' name='username' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['username'];}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Password:</legend>	
							<input type='text' name='password' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['password'];}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Confirm Password:</legend>	
							<input type='text' name='confPassword' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['confPassword'];}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='60%'>
						<br/>
						<fieldset class='divFormat'><legend>First Name:</legend>	
							<input type='text' name='firstName' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['firstName'];}?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<br/>
						<fieldset class='divFormat'><legend>Last Name:</legend>	
							<input type='text' name='lastName' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['lastName'];}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>email:</legend>	
							<input type='text' name='email' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['email'];}?>'/>
						</fieldset>
					</td>
					<td>
						<fieldset class='divFormat'><legend>phone:</legend>	
							<input type='text' name='phone' style='width:100%' value='<?php if(isset($_POST['add'])){echo $_POST['phone'];}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<input type='Submit' name='add' value='Add'/>
					</td>
				</tr>
			</table>					
		</Form></td>
	</tr>
</table>




<?php
	include "footer.php";
?>