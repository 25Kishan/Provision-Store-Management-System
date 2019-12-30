<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\customer-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="customer.css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>
    <div class="admintitle">
        <h1>Welcome to Customer Dashboard</h1>
    </div>
    <div class="dashboard">
        <table style="width:50%;" align="center">
            <tr>
                <td>1.</td><td><a href="custprofile.php" style=font-color:"#fff;">Customer Profile</td>
            </tr>
            <tr>
                <td>2.</td><td><a href="custgrocery.php">Grocery Details</td>
            </tr>
            <tr>
                <td>3.</td><td><a href="custacc.php">Account Detalis</td>
            </tr>
            
        </table>
    </div>
</body>
</html>