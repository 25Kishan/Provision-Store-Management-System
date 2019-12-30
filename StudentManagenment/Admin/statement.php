<?php
session_start();

if(isset($_SESSION['uid'])){
   echo " ";
}
else{
    header('location: ..\admin-login.php');
}
    include('header.php');
    include('../dbcon.php');

    $cid = $_GET['cid'];

?>
<form action="pay.php" method="post">
<h2 style="text-align:center;">Admin Area:</h2>
<table align="center" width="80%" border="" style="margin-top:20px;">
    <tr>
        <th>Customer Name</th>
        <th>Customer Id</th>
        <th>Total Amount</th>
        <th>Amount Paid</th>
        <th>Amount Due</th>
        <th>Date</th>
    </tr>
    <?php
     include('../dbcon.php');
    $sum =0;
         $query = "SELECT * from caccount where `cid` = '$cid' ";
         $run = mysqli_query($con,$query);
         $query = "SELECT SUM(`totamt`) from caccount GROUP BY `cid` having `cid` = '$cid'";
         $conn = mysqli_query($con,$query);
         $totamtt = mysqli_fetch_assoc($conn);
         $total = $totamtt['SUM(`totamt`)'];
         $queryy = "SELECT SUM(`amtpaid`) from caccount GROUP BY `cid` having `cid` = '$cid'";
         $connn = mysqli_query($con,$queryy);
         $amtduee = mysqli_fetch_assoc($connn);
         $totdue = $amtduee['SUM(`amtpaid`)'];


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
               <th><?php echo $data['cname'] ?></th>
               <th><?php echo $data['cid'] ?></th>
               <th><?php echo $data['totamt']; ?></th>
               <th><?php echo $data['amtpaid']; ?></th>
               <th><?php echo $data['amtdue'] ; ?></th>
               <th><?php echo $data['date']; ?></th>
            </tr>
             <?php
         }
     }

?>
<tr>
<th colspan="2"></th>

             <td><input type="text" name="total" value="<?php echo $total ;?>"></td>
             <td><input type="text" name = "totalpaid" value="<?php echo $totdue ;?>"></td>
             <td><input  type="text" name="totaldue" value="<?php echo $total - $totdue ;?>"></td>
             <td><input type="submit" name="Payment" href="pay.php?cid=<?php echo $data['cid'];?>"> </td>
            </tr>
            </table>
            
</form>
<?php 
$_SESSION["cid"] = $cid;
?>