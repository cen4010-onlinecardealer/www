<?php
if(1){//DB Connection
	$dbLocalhost="localhost:3306";
	$dbUser="root";
	$dbPw="houseauto868";
	$dbDb="ocsv2";
}
else{//Linux
	$dbLocalhost="localhost";
	$dbUser="root";
	$dbPw="jhweb123";
	$dbDb="ocsV2";
}
session_start();

$_SESSION['userType'] = 0;

if(isset($_POST['login'])){
	
	//Initiate connection to the database
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);
	
	$sessionUser = mysql_query("SELECT * FROM user WHERE username ='".$_POST['username']."'");

	$sessionUserDB= mysql_fetch_array($sessionUser);
	/*echo $sessionUserDB['username'];
	echo $sessionUserDB['password'];
	echo $_POST['username'];
	echo $_POST['passwordLogin'];*/
	
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

if(isset($_POST['create'])){
//Code to register a new user to the db

	//Initiate connection to the database
	$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
	if (!$link) {die('Not connected : ' . mysql_error());}
	$db_selected = mysql_select_db($dbDb, $link);
	
	$username=str_replace(' ','',$_POST['usernameNew']);
	
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