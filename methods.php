<?php
if(0){//DB Connection
	$dbLocalhost="localhost:3306";
	$dbUser="root";
	$dbPw="";
	$dbDb="ocs";
}
else{//Linux
	$dbLocalhost="localhost";
	$dbUser="root";
	$dbPw="jhweb123";
	$dbDb="ocs";
}
session_start();
if(isset($_POST['login'])){

	if($_POST['username']=='admin' && $_POST['passwordLogin']=='admin1'){
		
		$_SESSION['admin']=1;
		$_SESSION['user']=1;
	}
	else{
		
	}
}
if(isset($_GET['sdestroy'])){
	echo "DESTROY";
	session_destroy();
	header( "Location: main.php" );
}
?>