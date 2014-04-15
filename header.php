<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>



<div id="bodyDiv" >
	<header>
			<div style="display:inline-block; line-height:80px">
			Sunshine Online Car Dealer Inc.
			</div>
	</header>
	<Table id="navBar" border="0">
	<tr id="menu">
		<td class="menuItem"><a 
			<?php if($activeIndex==1){echo 'id="active"';}?>
			href="main.php" class="a">Home</a>
		</td>
		<td class="menuItem"><a 
			<?php if($activeIndex==2){echo 'id="active"';}?> 
			href="about.php" class="a">About</a>
		</td>
	</tr>
	</table>
	
	
	<div id="pageCont">
	<div id="navBar2">
		<?php
		if(isset($_SESSION['user']) && $_SESSION['user']==1){echo "<a href='profile.php'>User Profile</a>";}
		if(isset($_SESSION['admin']) && $_SESSION['admin']==1){echo "&nbsp&nbsp&nbsp&nbsp&nbsp<a href='adminMain.php'>ADMIN HOME</a>";}
		if(isset($_SESSION['admin'])==FALSE && isset($_SESSION['user'])==FALSE){
			echo "<a href='LogIn.php'>Log In/Register</a>";
		}
		else{echo "<br/><a href='main.php?sdestroy' style='font-size:10;'>Log out</a>";}
		?>
	</div>
<?php
$link = mysql_connect($dbLocalhost, $dbUser, $dbPw);
if (!$link) {die('Not connected : ' . mysql_error());}
$db_selected = mysql_select_db($dbDb, $link);
?>	
