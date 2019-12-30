<?php
session_start();

if(isset($_SESSION['uid'])){
   echo " ";
}
else{
    header('location: ..\admin-login.php');
}

?>
<?php
    include('header.php');
    include('../dbcon.php');

    $cid = $_GET['cid'];
    $sql = "SELECT * FROM `customer` WHERE `id`='$cid'";
    $run = mysqli_query($con,$sql);

    $data = mysqli_fetch_assoc($run);
 /*   include('admindash.css');*/
?>
<form action="updateddata.php" method="post" enctype="multipart/form-data">
<table align="center" width="80" style="margin-top:20px; padding-top:10px;">
    <tr>
        <th>Name</th>
        <td><input type="text" name="name" value =<?php echo $data['name'];?> required/></td>
    </tr>
    <tr>
        <th>Mobile Number</th>
        <td><input type="text" name="no" value =<?php echo $data['mobile num'];?> required/></td>
    </tr>
    <tr>
    <th>Address</th>
        <td><input type="text" name="address" value =<?php echo $data['address'];?> required/></td>
    </tr>
    <tr>
    <th>Email</th>
        <td><input type="text" name="email" value =<?php echo $data['email'];?> required/></td>
    </tr>

    <tr>
    <th>Joining Year</th>
        <td><input type="text" name="year" value =<?php echo $data['year'];?> required/></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size:20px;width:100%s;">
        <input type="hidden" name = "cid" value = "<?php echo $data['id']; ?>" />

        <input type = "submit" name ="submit" value="Submit">
        
        </td>
    </tr>

</table>
</form>