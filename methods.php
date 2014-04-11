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




	$firstName = $lastName = $usernameNew = $email = $password = $confPassword = "";
	$nameErr = $usernameNewErr = $emailErr = $passwordErr = $confPasswordErr = "";
	
	
//Test for Security and validate Registration Form

	//Test last name & name is valid format
	if (empty($_POST['firstName']) || empty($_POST['lastName']))
		{$nameErr = "Name and Last Name are required";}
	else
		{
		$firstName = test_input($_POST['firstName']);
		$lastName = test_input($_POST['lastName']);
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
		$email = test_input($_POST['email']);
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
			$usernameNew = test_input($_POST['usernameNew']);
			// check if new user name is valid and not in the database already
			if (!preg_match("/^[a-zA-Z0-9 ]*$/",$usernameNew))
			  {
				$usernameNewErr = "User name must contain letter and numbers ONLY,
									please enter another one"; 
				
			  }
			
			$usernameQuery = mysql_query("SELECT username FROM user
										WHERE userType=2 AND username=".$usernameNew."");
			$userAvailabilityDB=mysql_fetch_array($usernameQuery);									
		}	
		
	
	//Code to register a new user to the DB
	
	
	//$username=str_replace(' ','',$_POST['usernameNew']);
	
	$checkUser=mysql_query("SELECT username from user
								WHERE username='".$_POST['usernameNew']."'");
	$checkUserDB=mysql_fetch_array($checkUser);
		
	if($checkUserDB['username']== $username || $username==''){$error = "Error: User could not be added [username already in use]";}	
	else{
	
			//Check that passwrod and confirm password are the same
			if($_POST['password'] == $_POST['confPassword'])
			{
				mysql_query("INSERT INTO user (userType, username, password, email, firstName, lastName)
								VALUES ('2', '".mysql_real_escape_string($username)."', '".mysql_real_escape_string($_POST['password'])."', 
								'".mysql_real_escape_string($_POST['email'])."', '".mysql_real_escape_string($_POST['firstName'])."', 
								'".mysql_real_escape_string($_POST['lastName'])."')");
								
				$error = "User Added you can Log in Now";
				//TODO: Send the user to Log in page with POST variables to Log in								
			}
			else {$error = "Error: User could not be added [passwords does not match]";}	
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