<!DOCTYPE html>
<html>
<head>
<title>Table</title>

</head>
<body>
<table>
<tr>
<th>Order number</th>
<th>Customer email</th>
<th>Total</th>
</tr>
<?php
require('config.php');
$sql = "SELECT * FROM Orders";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["OrderNo."]. "</td><td>" . $row["Customer_email"] . "</td><td>"
. $row["Total"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>