<?php
$title= "Log In";
$activeIndex=0;
include "header.php";
?>

<br/>
<br/>
<br/>
<Form name='createLogin' method='POST' action='LogIn.php'>
<table name='orgLoginRegister' border='2' align='center' width='70%'>
	<tr>
		<td></td>
		<td colspan='3'>Login or Create an Account</td>
		<td></td>
	</tr>
	<tr>
		<td>1</td>
		<td width='50%' valign='top' >
						New Users<br/>
						<table border='0' name='orgNew' width='100%'>
							<tr>
								<td>
									First Name:*<br/>
									<input type='text' style="width:80%" name='firstName'/>
								</td>
							</tr>
							<tr>
								<td>
									Last Name:*<br/>
									<input type='text' style="width:80%" name='lastName'/>
								</td>
							</tr>
							<tr>
								<td>
									Email Address:*<br/>
									<input type='text' style="width:80%" name='email'/>
								</td>
							</tr>
							<tr>
								<td>
									Password:*<br/>
									<input type='text' style="width:80%" name='password'/>
								</td>
							</tr>
							<tr>
								<td>
									Confirm Password:*<br/>
									<input type='text' style="width:80%" name='confPassword'/>
								</td>
							</tr>
						</table>
		</td>
		<td>3</td>
		<td width='50%' valign='top' >
						Registered Users
						<table border='0' name='orgNew'>
							<tr>
									<td>
										Email Address:*<br/>
										<input type='text' style="width:80%" name='emailLogin'/>
									</td>
							</tr>
							<tr>
									<td>
										Password:*<br/>
										<input type='text' style="width:80%" name='passwordLogin'/>
									</td>
							</tr>
						</table>
		</td>
		<td>5</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type='Submit' name='create' value='Create an Account'/>
		</td>
		<td></td>
		<td>
			<input type='Submit' name='login' value='Log In'/>
		</td>
		<td></td>
	</tr>
</table>
</Form>