<?php
$title= "Log In";
$activeIndex=0;
include "methods.php";
include "header.php";
?>

<br/>
<br/>
<br/>
<Form name='createLogin' method='POST' action='LogIn.php'>
<table name='orgLoginRegister' border='1' align='center' width='70%' style='border-color:#104E8B;background-color:EFEBD6;color:FF6600'>
	<tr>
		<td style='border:0'></td>
		<td colspan='3' style='border:0'><b style='font-size:14;color:#C13100'>Login or Create an Account:</b><br/><br/></td>
		<td style='border:0'></td>
	</tr>
	<tr>
		<td style='width:2%;border:0'></td>
		<td width='40%' valign='top' style='background-color:#DDDDDD;border:0'>
						<b style='font-size:12'>New Users:</b><br/>
						<hr/>
						<table border='0' name='orgNew' width='100%' style='font-size:11;'>
							<tr>
								<td>
									First Name <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='firstName'/>
								</td>
							</tr>
							<tr>
								<td>
									Last Name <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='lastName'/>
								</td>
							</tr>
							<tr>
								<td>
									Username <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='usernameNew'/>
								</td>
							</tr>
							<tr>
								<td>
									Email Address <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='email'/>
								</td>
							</tr>
							<tr>
								<td>
									Password <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='password'/>
								</td>
							</tr>
							<tr>
								<td>
									Confirm Password <span style='color:red'>*</span><br/>
									<input type='text' style="width:80%" name='confPassword'/>
								</td>
							</tr>
						</table>
		</td>
		<td style='width:2% ;border:0'></td>
		<td width='40%' valign='top' style='background-color:#DDDDDD;border:0'>
						<b style='font-size:12'>Registered Users</b>
						<hr/>
						<table border='0' name='orgNew' width='100%' style='font-size:11'>
							<tr>
									<td>
										Username <span style='color:red'>*</span><br/>
										<input type='text' style="width:80%" name='username'/>
									</td>
							</tr>
							<tr>
									<td>
										Password <span style='color:red'>*</span><br/>
										<input type='text' style="width:80%" name='passwordLogin'/>
									</td>
							</tr>
						</table>
		</td>
		<td style='width:2%;border:0'></td>
	</tr>
	<tr>
		<td style='border:0'></td>
		<td style='background-color:#C2DFFF; text-align:right;border:0'>
			<input type='Submit' name='create' value='Create an Account'/>
		</td>
		<td style='border:0'></td>
		<td style='background-color:#C2DFFF; text-align:right;border:0'>
			<input type='Submit' name='login' value='Log In'/>
		</td>
		<td style='border:0'></td>
	</tr>
</table>
</Form>
<?php
include "footer.php";
?>