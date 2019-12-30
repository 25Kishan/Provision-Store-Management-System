<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\admin-login.php');
}

?>
<?php
    include('header.php');
 /*   include('admindash.css');*/
?>
<div class="dashbord">
<form action="addcustomer.php" method="post" enctype="multipart/form-data">
<table align="center" width="80" style="margin-top:20px; padding-top:10px;">
    <tr>
        <th>name</th>
        <td><input type="text" name="name" placeholder="Enter Name" required/></td>
    </tr>
    <tr>
        <th>Mobile Number</th>
        <td><input type="text" name="no" placeholder="Enter MobileNumber" required/></td>
    </tr>
    <tr>
    <th>Address</th>
        <td><input type="text" name="address" placeholder="Enter Address" required/></td>
    </tr>
    <tr>
    <th>email</th>
        <td><input type="text" name="email" placeholder="Enter Mail" required/></td>
    </tr>

    <tr>
    <th>Joining Year</th>
        <td><input type="text" name="year" placeholder="Enter Year" required/></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:20px;width:100%s;"><input type = "submit" name ="submit" value="Submit"></td>
    </tr>

</table>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $name=$_POST['name'];
    $no=$_POST['no'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $year = $_POST['year'];
    $qry="INSERT INTO `customer`(`id`, `name`, `mobile num`, `address`, `email`,`year`) VALUES (NULL,'$name',
    '$no','$address','$email','$year')";
    $result = mysqli_query($con,$qry);
    if($result == true)
    {
        ?>
        <script>
            alert('Data.....');
        </script>
        <?php   
    }
}

?>