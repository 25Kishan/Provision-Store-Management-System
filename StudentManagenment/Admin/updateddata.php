<?php 

include('../dbcon.php');
    $name=$_POST['name'];
    $no=$_POST['no'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $year = $_POST['year'];
    $id = $_POST['cid'];
    $qry="UPDATE `customer` SET `name` = '$name', `mobile num` = '$no', `address` = '$address', `email` = '$email', `year` = '$year' WHERE `id` = '$id' ";
    $result = mysqli_query($con,$qry);
    if($result == true)
    {
        ?>
        <script>
            alert('Data Updated Successfully');
            window.open('editcustomer.php?cid=<?php echo $id; ?>','_self');
        </script>
        <?php   
    }

?>