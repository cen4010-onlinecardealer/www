
<title>Online Car Dealer</title>
<body>
<img src="cardealer_logo.jpg" alt="Car Dealer Logo" width="100" height="90">
<h1>Car Inventory</h1>


<?php
$con=mysqli_connect("localhost","root","jhweb123","cardealerdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM carinventory");

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
?> 
</body>
</html>
