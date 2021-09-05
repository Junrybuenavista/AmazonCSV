<?php
$myfile = fopen("orders_from_20210801_to_20210823_20210823_0315.csv", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("orders_from_20210801_to_20210823_20210823_0315.csv"));


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Amazon_data (Order_Date ,
Order_ID,
Account_Group,
PO_Number,
Order_Quantity,
Currency,
Order_Subtotal,
Order_Shipping_Handling,
Order_Promotion,
Order_Tax,
Order_Net_Total,
Order_Status,
Approver,
Account_User,
Account_User_Email,
Invoice_Status,
Total_Amount,
Invoice_Due_Amount,
Invoice_Issue_Date,
Invoice_Due_Date,
Payment_Reference_ID,
Payment_Date,
Payment_Amount,
Payment_Instrument_Type,
Payment_Identifier,
Amazon_Internal_Product_Category,
ASIN,
Title,
UNSPSC,
Segment,
Family,
Class,
Commodity,
Brand_Code,
Brand,
Manufacturer,
National_Stock_Number,
Item_model_number,
Part_number,
Product_Condition,
Company_Compliance,
Listed_PPU,
Purchase_PPU,
Item_Quantity,
Item_Subtotal,
Item_Shipping_Handling,
Item_Promotion,
Item_Tax,
Item_Net_Total,
PO_Line_Item_Id,
Tax_Exemption_Applied,
Tax_Exemption_Type,
Tax_Exemption_Opt_Out,
Discount_Program,
Pricing_Discount_applied_dollar,
Pricing_Discount_applied_percentage,
GL_Code,
Department,
Cost_Center,
Project_Code,
Location,
Custom_Field_1,
Seller_Name,
Seller_Credentials,
Seller_City,
Seller_State,
Seller_ZipCode) 
VALUES ('John', 'Doe', 'johnexample.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
fclose($myfile);
?>



