<?php
session_start();
?>
<table align="center" width="80%" border="" style="margin-top:20px;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Joining Year</th>

    </tr>
<?php
include('header.php');
    include('../dbcon.php');
if(isset($_SESSION['uid'])){
  $ids =  $_SESSION['uid'];

   $sql = "SELECT * FROM `customer` WHERE `id`='$ids'";
   $run = mysqli_query($con,$sql);
   $data = mysqli_fetch_assoc($run);
}
else{
    header('location: ..\customer-login.php');
} 
?>
<tr>
<th><?php echo $data['id'] ?></th>
<th><?php echo $data['name'] ?></th>
<th><?php echo $data['mobile num'] ?></th>
<th><?php echo $data['address'] ?></th>
<th><?php echo $data['email'] ?></th>
<th><?php echo $data['year'] ?></th>

</tr>
<?php
?>