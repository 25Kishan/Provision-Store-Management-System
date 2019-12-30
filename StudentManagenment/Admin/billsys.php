<?php 
include('../dbcon.php');
    $cname = $_POST['cname'];
    $cid = $_POST['cid'];
    $date = date('Y-m-d ');
    $option = $_POST['option'];  
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $due = $_POST['due'];
    $price = str_replace("$","",$_POST['price']);
        $qry = "INSERT INTO `selling`(`cname`, `cid`, `date`, `pname`, `pqty`, `price`) VALUES ('$cname','$cid','$date','$option','$qty','$price')";
        $result = mysqli_query($con,$qry);
        
        if($result){
            echo "one row added";
        }
        else{
            echo "Not Added";
        }
    
   /* else if($_POST['acc']){
        $sql = "INSERT INTO `caccount`(`cname`, `cid`, `totamt`, `amtpaid`, `amtdue`, `date`) VALUES ('$cname','$cid','$total','$paid','$due','$date')";
        $resultt = mysqli_query($con,$sql);
        if($resultt){
           echo "Data added to account";   
        }
        else{
            echo " Not added to account";
        }
    } */  
?>
