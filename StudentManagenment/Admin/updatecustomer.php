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
<table align="center" width="80%" border="">
    <form action="updatecustomer.php" method="post">
    
    <tr>
        <th>Enter Name</th>
        <td><input type="text" name="username" placeholder="Enter Name" required/></td>

        <th>Enter Year</th>
        <td><input type="text" name="year" placeholder="Enter Year" required/></td>

        <td colspan="2"><input type="submit" name="submit" value="Search"></td>

    </tr>

    <!-- <tr>
        <th>Enter Address</th>
        <td><input type="text" name="address" placeholder="Enter Address" required/></td>
    </tr>
    <tr>
        <th>Enter Email</th>
        <td><input type="text" name="email" placeholder="Enter Email" required/></td>
    </tr> --> 
    </form>
</table>
<table align="center" width="80%" border="" style="margin-top:20px;">
    <tr>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Joining Year</th>
        <th>Edit</th>

    </tr>
    <?php
 if(isset($_POST['submit']))
 {
     include('../dbcon.php');
     $year = $_POST['year'];
     $name = $_POST['username'];
     $qry = "SELECT * FROM `customer` WHERE year= '$year' AND name LIKE '%$name%'";
     $run = mysqli_query($con,$qry);

     if(mysqli_num_rows($run)<1)
     {
         echo "<tr><td colspan='5>No User Found</td></tr>";
     }
     else{
         $cnt =0;
         while($data=mysqli_fetch_assoc($run))
         {
             $cnt++;
            ?>
            <tr>
               <th><?php echo $data['name'] ?></th>
               <th><?php echo $data['mobile num'] ?></th>
               <th><?php echo $data['address'] ?></th>
               <th><?php echo $data['email'] ?></th>
               <th><?php echo $data['year'] ?></th>
               <th><a href="editcustomer.php?cid=<?php echo $data['id']; ?>">Edit</a></th>
            </tr>
             <?php
         }
     }
 }

?>

</table>
