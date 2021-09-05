<?php
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

// sql to create table
$sql = "CREATE TABLE Amazon_data2 (
Order_Date text,
Order_ID text,
Account_Group text,
PO_Number text,
Order_Quantity text,
Currency text,
Order_Subtotal text,
Order_Shipping_Handling text,
Order_Promotion text,
Order_Tax text,
Order_Net_Total text,
Order_Status text,
Approver text,
Account_User text,
Account_User_Email text,
Invoice_Status text,
Total_Amount text,
Invoice_Due_Amount text,
Invoice_Issue_Date text,
Invoice_Due_Date text,
Payment_Reference_ID text,
Payment_Date text,
Payment_Amount text,
Payment_Instrument_Type text,
Payment_Identifier text,
Amazon_Internal_Product_Category text,
ASIN text,
Title text,
UNSPSC text,
Segment text,
Family text,
Class text,
Commodity text,
Brand_Code text,
Brand text,
Manufacturer text,
National_Stock_Number text,
Item_model_number text,
Part_number text,
Product_Condition text,
Company_Compliance text,
Listed_PPU text,
Purchase_PPU text,
Item_Quantity text,
Item_Subtotal text,
Item_Shipping_Handling text,
Item_Promotion text,
Item_Tax text,
Item_Net_Total text,
PO_Line_Item_Id text,
Tax_Exemption_Applied text,
Tax_Exemption_Type text,
Tax_Exemption_Opt_Out text,
Discount_Program text,
Pricing_Discount_applied_dollar text,
Pricing_Discount_applied_percentage text,
GL_Code text,
Department text,
Cost_Center text,
Project_Code text,
Location text,
Custom_Field_1 text,
Seller_Name text,
Seller_Credentials text,
Seller_City text,
Seller_State text,
Seller_ZipCode text)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>