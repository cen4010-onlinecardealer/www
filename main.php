<?php
$title= "Main";
$activeIndex=1;
include "header.php";
?>
<?php
if (!$db_selected) {
    die ('Can\'t use idrecords : ' . mysql_error());
}
else{
	$result = mysql_query("SELECT first_name,last_name FROM users");
	echo "<table border='1'>
	<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	</tr>";
	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['first_name'] . "</td>";
		echo "<td>" . $row['last_name'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

}
?>






<?php
include "footer.php";
?>