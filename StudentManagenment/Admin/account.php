<?php 
   include('../dbcon.php');
       $cname = $_POST['cname'];
       $cid = $_POST['cid'];
       $date = date('Y-m-d ');
       $total = str_replace("$","",$_POST['total']);
       $paid = str_replace("$","",$_POST['paid']);
       $due = str_replace("$","",$_POST['due']);
       $sql = "INSERT INTO `caccount`(`cname`, `cid`, `totamt`, `amtpaid`, `amtdue`, `date`) VALUES ('$cname','$cid','$total','$paid','$due','$date')";
       $resultt = mysqli_query($con,$sql);
         if($resultt){
             echo "Data added to account";  
         }
      $sqll = ""
      
       
               
?>