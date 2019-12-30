<?php 
session_start();
?>
<?php
include('../dbcon.php');
$cid = $_SESSION["cid"];
$total = $_POST['total'];
$paid = $_POST['totalpaid'];
$due = $_POST['totaldue'];
$quert = "SELECT `cname` from `caccount` group by `cid` having `cid`=$cid";
$res = mysqli_query($con,$quert);
$name = mysqli_fetch_array($res);
$date = date('Y-m-d ');
echo $date;
$qry = "INSERT INTO `caccount`(`cname`, `cid`, `totamt`, `amtpaid`, `amtdue`, `date`) VALUES ('$name[0]','$cid',0,'$due',0,'$date')";
$result = mysqli_query($con,$qry);
    if(mysqli_num_rows($result) <1)
    {
        ?>
        <script>
            alert('Succesfully Paid');
            window.open('payment.php','_self');
        </script>
        <?php
    }
?>
