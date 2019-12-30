<?php 

include('../dbcon.php');

    $id = $_REQUEST['cid'];
    $qry="DELETE FROM `customer` WHERE `id` ='$id';";
    $result = mysqli_query($con,$qry);
    if($result == true)
    {
        ?>
        <script>
            alert('Data Deleted Successfully');
            window.open('deletecustomer.php','_self');
        </script>
        <?php   
    }

?>