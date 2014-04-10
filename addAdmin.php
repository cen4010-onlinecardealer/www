<?php
$title= "Add Admin";
$activeIndex=0;
include "methods.php";
include "header.php";
?>

<?php
	if (!$db_selected) {
		die ('Can\'t use DB : ' . mysql_error());
	}
	if(isset($_POST['add'])){
		$username=str_replace(' ','',$_POST['username']);
		$password=$_POST['password'];
		$confPassword=$_POST['confPassword'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		
		$checkUser=mysql_query("SELECT username from user
								WHERE username='".$username."'");
		$checkUserDB=mysql_fetch_array($checkUser);
		
		if($checkUserDB['username']==$username || $username==''){echo "Error: Admin could not be added [username already in use]";}
		else{
			if($password==$confPassword){
				mysql_query("INSERT INTO user (userType, username, password, phone, email, firstName, lastName)
								VALUES (1, '".mysql_real_escape_string($username)."', '".mysql_real_escape_string($password)."', 
								'".mysql_real_escape_string($phone)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($firstName)."',
								'".mysql_real_escape_string($lastName)."')");
				echo "Admin Added: ".$_POST['username'];
			}
			else{
				echo "Error: Admin could not be added [passwords didn't match]";
			}
		}
		
	}
	
?>

<table align='center'>
	<tr>
		<td><Form name='addAdmin' method='post' action='addAdmin.php'>
			<fieldset class='divFormatHeader'><legend>Add Admin</legend>
			<table border='0' width='100%' name='orgAddAdmin'>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>username<span style='color:red'>*</span></legend>	
							<input type='text' name='username' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['username'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Password<span style='color:red'>*</span></legend>	
							<input type='text' name='password' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['password'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Confirm Password<span style='color:red'>*</span></legend>	
							<input type='text' name='confPassword' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['confPassword'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top' width='60%'>
						<br/>
						<fieldset class='divFormat'><legend>First Name:</legend>	
							<input type='text' name='firstName' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['firstName'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<br/>
						<fieldset class='divFormat'><legend>Last Name:</legend>	
							<input type='text' name='lastName' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['lastName'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>email:</legend>	
							<input type='text' name='email' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['email'], ENT_QUOTES);}?>'/>
						</fieldset>
					</td>
					<td>
						<fieldset class='divFormat'><legend>phone:</legend>	
							<input type='text' name='phone' style='width:100%' value='<?php if(isset($_POST['add'])){echo htmlentities($_POST['phone'], ENT_QUOTES);}?>'/>
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