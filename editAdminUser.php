<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
include "header.php";
?>

<?php
if (!$db_selected) {
	die ('Can\'t use DB : ' . mysql_error());
}
if(isset($_POST['userID'])){
	if($_POST['userID']==0){
		$firstName="";
		$lastName="";
		$username="";
		$password="";
		$phone="";
		$email="";
		$userType="2";
	}
	else{
		$user= mysql_query("SELECT uid, userType, username, password, phone, email,
								firstName, lastName
							From user
							WHERE uid=".$_POST['userID']."");
		$userDB=mysql_fetch_array($user);
		
		$firstName=$userDB['firstName'];
		$lastName=$userDB['lastName'];
		$username=$userDB['username'];
		$password=$userDB['password'];
		$phone=$userDB['phone'];
		$email=$userDB['email'];
		$userType=$userDB['userType'];
		
		
	}
	
	if(isset($_POST['saveUser'])){
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$username=str_replace(' ','',$_POST['username']);
		$password=$_POST['password'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$userType=$_POST['userType'];
		
		$checkUser=mysql_query("SELECT username from user
								WHERE username='".$username."'");
		$checkUserDB=mysql_fetch_array($checkUser);
		
		if($_POST['userID']==0){
			if($checkUserDB['username']==$username || $username==''){echo "Error: User could not be added [username already in use]";}
			else{
				mysql_query("INSERT INTO user (userType, username, password, phone, email, firstName, lastName)
									VALUES ('".$userType."', '".mysql_real_escape_string($username)."', '".mysql_real_escape_string($password)."', 
									'".mysql_real_escape_string($phone)."', '".mysql_real_escape_string($email)."', 
									'".mysql_real_escape_string($firstName)."', '".mysql_real_escape_string($lastName)."')");
			}
			echo "User Added";
		}
		else{
			mysql_query("UPDATE user SET userType='".$_POST['userType']."',username='".mysql_real_escape_string($_POST['username'])."',
										password='".mysql_real_escape_string($_POST['password'])."',phone='".mysql_real_escape_string($_POST['phone'])."',
										email='".mysql_real_escape_string($_POST['email'])."',firstName='".mysql_real_escape_string($_POST['firstName'])."',
										lastName='".mysql_real_escape_string($_POST['lastName'])."'
							WHERE uid=".$_POST['userID']."");
			echo "User Updated";
		}
		
	}
}
else{die('No User Selected');}
?>

<table border='0' width='100%' name='orgStudentDemographics'>
	<tr>
		<td colspan='5' align='center'><h3>"Edit USER"</h3></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td width='200' height='200' align='center' valign='top'>
			<img src='pictures/profile.png' alt='No Image Available'/>				
		</td>
		<td width='3%'></td>
		<td><Form name='editDemographics' method='post' action='editAdminUser.php'>
			<input type='hidden' name='userID' value='<?php echo $_POST['userID'];?>' />
			<fieldset class='divFormatHeader'><legend>Account Details</legend>
			<table border='0' width='100%' name='orgAccountDetails'>
				<tr>
					<td valign='top' width='60%'>
						<fieldset class='divFormat'><legend>Last Name:</legend>
						<input type='text' name='lastName' style='width:100%' value='<?php echo $lastName;?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>First Name:</legend>
						<input type='text' name='firstName' style='width:100%' value='<?php echo $firstName;?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Email</legend>
						<input type='text' name='email' style='width:100%' value='<?php echo $email;?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Phone</legend>
						<input type='text' name='phone' value='<?php echo $phone;?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<br/>
						<fieldset class='divFormat'><legend>username*</legend>
						<input type='text' name='username' style='width:100%' value='<?php echo $username;?>'/>
						</fieldset>
					</td>
					<td valign='top'>
						<br/>
						<fieldset class='divFormat'><legend>password*</legend>
						<input type='text' name='password' value='<?php echo $password;?>'/>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>User Type</legend>
						<select name='userType'/>
							<option value='1' <?php if($userType==1){echo "selected='selected'";}?>>1</option>
							<option value='2' <?php if($userType==2){echo "selected='selected'";}?>>2</option>
						</select>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<input type='submit' name='saveUser' value='Save'/>
					</td>
				</tr>
			</table>					
		</Form></td>
		<td width='3%'></td>
	</tr>
</table>




<?php
include "footer.php";
?>