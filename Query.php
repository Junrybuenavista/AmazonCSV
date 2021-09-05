<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";
$msg = "";
$msg.= "<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: center;
}
</style>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Order_Date, Order_ID, Title, Item_Subtotal, Item_Quantity, Account_Group FROM amazon_data2 WHERE Item_Tax = '' OR Item_Tax = '0' ORDER BY Order_Date";
$result = $conn->query($sql);

$msg.= "<center><h1>Amazon Sales Tax Report</h1></center>";
$msg.= "<center><h3>Date: ".date("m-d-Y")."</h3></center>";

if ($result->num_rows > 0) {
  $msg.= "<table>
  <tr>
    <th>Order Date</th>
	<th>Account Group</th>
    <th>Order Number</th>
    <th>Item Name</th>
	<th>Item Price</th>
	<th>QTY</th>
	<th>Estimated Tax</th>
  </tr>";
  while($row = $result->fetch_assoc()) {
	
	$total = $row["Item_Subtotal"];
	$quantity = $row["Item_Quantity"];
	$price = $total/$quantity;
	$estTax = $total * 0.07;
	
	$msg.= " 
			<tr>
			<td>".$row["Order_Date"]."</td>
			<td>".$row["Account_Group"]."</td>
			<td>".$row["Order_ID"]."</td>
			<td>".$row["Title"]."</td>
			<td>".number_format((float)$price, 2, '.', '')."</td>
			<td>".$row["Item_Quantity"]."</td>
			<td>".number_format((float)$estTax, 2, '.', '')."</td>
		  </tr>
		 ";
	
  }
} else {
  echo "0 results";
}
$msg.= "</table>";

echo $msg;

//$to = "michaelvinocur@htgrp.net";
//$to = "junrybuenavista@htgrp.net";
//$to = "junrybuenavista@yahoo.com";
$subject = "Amazon CSV Reports";

$message = $msg;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";


//mail($to,$subject,$message,$headers);

$conn->close();
?>