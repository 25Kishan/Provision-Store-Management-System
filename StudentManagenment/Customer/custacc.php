<?php
session_start();

if(isset($_SESSION['uid'])){
   $uid= $_SESSION['uid'];
}
else{
    header('location: ..\customer-login.php');
}

?>
<?php
    include('header.php');
 /*   include('admindash.css');*/
?>
<table align="center" width="80%" border="" style="margin-top:20px;">
    <tr>
        <th>Name</th>
        <th>Id</th>
        <th>Total Amount</th>
        <th>Amount Paid</th>
        <th>Amount Due</th>
        <th>Date</th>
    </tr>
    <?php
     include('../dbcon.php');
     $qry = "SELECT `name` from customer where `id` = '$uid'";
     $res = mysqli_query($con,$qry);
     $dataa = mysqli_fetch_assoc($res);
     $cname = $dataa['name'];
     $sum =0;
          $query = "SELECT * from caccount where `cname` = '$cname' ";
          $run = mysqli_query($con,$query);
          $query = "SELECT SUM(`totamt`) from caccount GROUP BY `cname` having `cname` = '$cname'";
          $conn = mysqli_query($con,$query);
          $totamtt = mysqli_fetch_assoc($conn);
          $total = $totamtt['SUM(`totamt`)'];
          $queryy = "SELECT SUM(`amtpaid`) from caccount GROUP BY `cname` having `cname` = '$cname'";
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
             </tr>
             </table>