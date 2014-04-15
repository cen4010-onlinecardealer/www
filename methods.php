<?php
$userTeam=1;
if($userTeam==1){//Ariel
	$dbLocalhost="localhost:3306";
	$dbUser="root";
	$dbPw="";
	$dbDb="ocsv2";
}
else{//Linux
	$dbLocalhost="localhost";
	$dbUser="root";
	$dbPw="jhweb123";
	$dbDb="ocsV2";
}
session_start();



//From Log in button @ LogIn.php
if(isset($_POST['login'])){
	
	//Initiate connection to the database
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);
	
	$sessionUser = mysql_query("SELECT * FROM user WHERE username ='".$_POST['username']."'");

	$sessionUserDB= mysql_fetch_array($sessionUser);

	
	if($_POST['username']==$sessionUserDB['username'] && $_POST['passwordLogin']==$sessionUserDB['password'])
	{
			$_SESSION['userType'] = $sessionUserDB['userType'];
			if($sessionUserDB['userType'] == 1){
				$_SESSION['admin']=1;
				$_SESSION['user']=1;
				}
			else{
				$_SESSION['user']=1;
				echo "
					<script language='javascript'>
						window.location.href = 'main.php'
					</script>";
			}
	}
	
	/*if($_POST['username']==$sessionUserDB['username'] && $_POST['passwordLogin']=='admin1'){
		
		$_SESSION['admin']=1;
		$_SESSION['user']=1;
	}
	else{
		
	}*/
	
	//Close connection to DB
	mysql_close($link);

}

//From Create an Account button @ LogIn.php
if(isset($_POST['create'])){

	//Initiate connection to the database
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);




	$firstName = $lastName = $usernameNew = $email = "";
	$nameErr = $usernameNewErr = $emailErr = $passwordErr = $confPasswordErr = "";
	
	
//Test for Security and validate Registration Form

	//Test last name & name is valid format
	if (empty($_POST['firstName']) || empty($_POST['lastName']))
		{$nameErr = "Name and Last Name are required";}
	else
		{
		$firstName = ($_POST['firstName']);
		$lastName = ($_POST['lastName']);
		// check if name only contains letters and white spaces
		if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$lastName))
		  {
			$nameErr = "Only letters and white space allowed"; 
		  }
		}
	
	//Test email is valid format
	if (empty($_POST['email']))
		{$emailErr = "Email is required";}
	else
	{
		$email = ($_POST['email']);
		// check if e-mail address syntax is valid
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		  {
			$emailErr = "Invalid email format"; 
		  }
	}
	
	//
	if (empty($_POST['usernameNew']))
		{$usernameNewErr = "User name is required";}
	else
		{
			$usernameNew = ($_POST['usernameNew']);
			// check if new user name is valid and not in the database already
			if (!preg_match("/^[a-zA-Z0-9 ]*$/",$usernameNew))
			  {
				$usernameNewErr = "User name must contain letter and numbers ONLY,
									please enter another one"; 
				
			  }
			
			$usernameQuery = mysql_query("SELECT username FROM ocsv2.user
										WHERE userType=2 AND username='".$usernameNew."'");
			
			$userAvailabilityDB=mysql_fetch_array($usernameQuery);									
		}	
		
	
	//Code to register a new user to the DB
	
	
	
	
	$checkUser=mysql_query("SELECT username from ocsv2.user
								WHERE username='".$_POST['usernameNew']."'");
	$checkUserDB=mysql_fetch_array($checkUser);
	
	//Blank username 
	if(strlen(trim($usernameNew, ' '))==0 ){$error = "Error: User could not be added [username can't be blank]";}	
	else
	{
		if($checkUserDB['username']== $usernameNew ){$error = "Error: User could not be added [username already in use]";}	
	else{
	
			//Check that password and confirm password are the same
			if($_POST['password'] == $_POST['confPassword'])
			{
				mysql_query("INSERT INTO user (userType, username, password, email, firstName, lastName)
								VALUES ('2', '".mysql_real_escape_string($usernameNew)."', '".mysql_real_escape_string($_POST['password'])."', 
								'".mysql_real_escape_string($email)."', '".mysql_real_escape_string($firstName)."', 
								'".mysql_real_escape_string($lastName)."')");
								
				$error = "User Added you can Log in Now";
				
				//Enable the session
				$_SESSION['user']=1;
				
				//Send the user to Log in page with POST variables to Log in
				echo "
					<script language='javascript'>
						window.location.href = 'main.php'
					</script>";
			}
			else {$error = "Error: User could not be added [passwords does not match]";}	
		}
	}
	
		
	//Close connection to DB
	mysql_close($link);
}



if(isset($_GET['sdestroy'])){
	echo "DESTROY";
	session_destroy();
	header( "Location: main.php" );
}
?>