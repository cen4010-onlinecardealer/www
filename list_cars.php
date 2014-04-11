<!-- <title>Online Car Dealer</title> -->

<?php
$title= "Car Inventory";
$activeIndex=0;
include "methods.php";
?>



<body>
<img src="cardealer_logo2.jpg" alt="Car Dealer Logo" width="400" height="100">
<h1>Your Search Results</h1>

<?php 
/*if(isset($_POST['search'])){
/*$con=mysqli_connect("localhost:3306","root","","ocsv2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


//$desiredCarPrice = $_POST['price'];

var_dump($_POST);
$carPriceMax = intval($_POST['price']);  

var_dump ($carPriceMax);

$carList=mysql_query("SELECT car_id, car.make_id, car.model_id, year, color, price, status_id, make, model FROM car
								INNER JOIN make_id ON car.make_id = make_id.make_id
								INNER JOIN model_id ON car.model_id = model_id.model_id
								ORDER BY price");
var_dump ($carList);	
$line=0;
		while($carListDB=mysql_fetch_array($carList)){
			if($line!=0){
				echo "<tr><td colspan='10'><hr class='tdhead'/></td></tr>";
			}
		}
//$result = mysqli_query($con,"SELECT * FROM carinventory");

echo "<table border='1'>
<tr>
<th>Car ID</th>
<th>Description</th>
<th>Year</th>
<th>Make</th>
<th>Model</th>
<th>Price</th>
<th>Notes</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['carid'] . "</td>";
  echo "<td>" . $row['cardesc'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['make'] . "</td>";
  echo "<td>" . $row['model'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['notes'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
}
else{

}*/
?>
</body>
</html>
