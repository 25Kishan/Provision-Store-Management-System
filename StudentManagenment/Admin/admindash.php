<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\admin-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="admindash.css">
    <title>Document</title>
    <style>
    
    </style>
</head>
<body>
    <?php include('header.php');?>
    <div class="admintitle">
        <h1>Welcome to AdminDashboard</h1>
    </div>
    <div class="dashboard">
        <table style="width:50%;" align="center">
            <tr>
                <td>1.</td><td><a href="addcustomer.php" style=font-color:"#fff;">Insert Customer Details</td>
            </tr>
            <tr>
                <td>2.</td><td><a href="updatecustomer.php">Update Customer Details</td>
            </tr>
            <tr>
                <td>3.</td><td><a href="deletecustomer.php">Delete Customer Details</td>
            </tr>
            
        </table>
        <hr>

        <table style="width:50%;" align="center">
            <tr>
                <td>4.</td><td><a href="insertproduct.php" style=font-color:"#fff;">Insert Product Details</td>
            </tr>
            <tr>
                <td>5.</td><td><a href="productsell.php">Product Selling Details</td>
            </tr>
            <tr>
                <td>6.</td><td><a href="invoice.php">Invoice</td>
            </tr>
            
        </table>
    </div>
</body>
</html>