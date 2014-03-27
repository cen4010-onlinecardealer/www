<?php
$title= "Profile";
$activeIndex=0;
include "header.php";
?>

<table border='0' width='100%' name='orgStudentDemographics'>
	<tr>
		<td colspan='5' align='center'><h3>"Profile"</h3></td>
	</tr>
	<tr>
		<td width='3%'></td>
		<td width='200' height='200' align='center' valign='top'>
			<img src='pictures/profile.png' alt='No Image Available'/>
			<?php
			if(isset($_POST['editDemo'])){echo "<br/><div align='right'><font size='1'><a href='#'>Add Img...</a></font></div>";}
			else{}
			?>						
		</td>
		<td width='3%'></td>
		<td><Form name='editDemographics' method='post' action='profile.php'>
			<fieldset class='divFormatHeader'><legend>Account Details</legend>
			<table border='0' width='100%' name='orgAccountDetails'>
				<tr font='1'>
					<td valign='top' width='60%'>
						<fieldset class='divFormat'><legend>LastName, FirstName:</legend>
							<?php
							if(isset($_POST['editDemo'])){echo "<input type='text' name='fullName' style='width:100%' value=''/>";}
							else{ echo "<b>Smith, John</b>";}
							?>
						</fieldset>
					</td>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Phone</legend>
							<?php
							if(isset($_POST['editDemo'])){echo "<input type='text' name='phone' value=''/>";}
							else{echo "<b>305-230-2047</b>";}
							?>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<fieldset class='divFormat'><legend>Email</legend>
							<?php
							if(isset($_POST['editDemo'])){echo "<input type='text' name='email' style='width:100%' value=''/>";}
							else{echo "<b>testingEMAIL@panthers.com</b>";}
							?>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align='right' valign='top' colspan='2'>
						<?php
						if(isset($_POST['editDemo'])){echo "<input type='submit' name='saveDemo' value='Save'/>";}
						else{echo "<input type='submit' name='editDemo' value='Edit'/>";}
						?>
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