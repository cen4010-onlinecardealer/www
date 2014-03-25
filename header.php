<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<?php
$admin = 0;
$user = 0;
?>


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
		<td class="menuItem"><a 
			<?php if($activeIndex==3){echo 'id="active"';}?> 
			href="#" class="a">a</a>
		</td>
	</tr>
	</table>
	
	
	<div id="pageCont">
	<div id="navBar2">
		<?php
		if($user==1){echo "<a href='#'>Account Info..</a>";}
		if($admin==1){echo "&nbsp&nbsp&nbsp&nbsp&nbsp<a href='#'>ADMIN HOME</a>";}
		if($admin==0 && $user==0){echo "<a href='LogIn.php'>Log In/Register</a>";}
		?>
	</div>
<?php
$link = mysql_connect('localhost:3306', 'root', '');
if (!$link) {die('Not connected : ' . mysql_error());}
$db_selected = mysql_select_db('idrecords', $link);
?>	
