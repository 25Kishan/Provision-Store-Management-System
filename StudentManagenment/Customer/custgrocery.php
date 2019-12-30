<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\customer-login.php');
}
include('header.php');
    include('../dbcon.php');
    $cid = $_SESSION['uid'];
        $sql = "SELECT * FROM `selling` WHERE `cid`=2 ";
        $result = mysqli_query($con,$sql);
        $qry = "SELECT SUM(`price`) FROM selling WHERE cid = 2 ";
        $total = mysqli_query($con,$qry);
        $roww = mysqli_fetch_row($total);
        ?>
        
        <table border="1">
            <th>Customer Name</th>
            <th>Customer Id</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Purchace Date</th>
            </tr>
            
        <?php

             while($row=  mysqli_fetch_array($result))
             {
                 ?>
            <tr>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['cid']; ?></td>
                <td><?php echo $row['pname']; ?></td>
                <td><?php echo $row['pqty'] ;?></td>
                <td><?php echo $row['price'] ;?></td>
                <td><?php echo $row['date'] ;?></td>
            </tr>
        <?php
             }
             ?>
             <th colspan="3"></th>
             <th>Total:</th>
             <td><?php echo $roww[0] ;?></td>
             </table>