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
</head>
<body>
    <?php include('header.php');?>
    <div class="admintitle">
        <h1>Entry Of Product Detalis </h1>
    </div>
    <div>
    <form action="insertproduct.php" method="post" enctype="multipart/form-data">
    <table align="center"  style="margin-top:10px; padding-top:20px;width=150px;">
    <tr>
        <th>Product Id:</th>
        <td><input type="text" name="id" placeholder="Enter Product Id" required/></td>
    </tr>
    <tr>
        <th>Product Name:</th>
        <td><input type="text" name="name" placeholder="Enter Product Name" required/></td>
    </tr>

    <tr>
    <th>Product Quantity:</th>
        <td><input type="text" name="pqty" placeholder="Enter Total Product Quantity" required/></td>
    </tr>
    <tr>
        <th>Product Purchase Price:</th>
        <td><input type="text" name="pprice" placeholder="Enter Product Purchase Price" required/></td>
    </tr>
    <tr>
    <th>Product Selling Price:</th>
        <td><input type="text" name="sprice" placeholder="Enter Product Selling Price" required/></td>
    </tr>

    <tr>
    <th>Product Purchase Date:</th>
        <td><input type="text" name="pdate" placeholder="Enter Date" required/></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:20px;width:100%s;">
        <input type = "submit" name ="submit" value="Submit"></td>
    </tr>

</table>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $pqty=$_POST['pqty'];
    $pprice=$_POST['pprice'];
    $sprice = $_POST['sprice'];
    $pdate= $_POST['pdate'];
    $qry="INSERT INTO `product`(`ID`, `P_name`, `P_qty`, `P_Price`, `P_SPrice`, `P_date`) 
    VALUES ('$id','$name','$pqty','$pprice','$sprice','$pdate')";
    $result = mysqli_query($con,$qry);
    if($result == true)
    {
        ?>
        <script>
            alert('Data Entered Suss.....');
        </script>
        <?php   
    }
}

?>