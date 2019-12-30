<?php 

    function showdetails($name,$number)
    {
        include('dbcon.php');
        $sql = "SELECT * FROM `customer` WHERE `name`='$name' AND `mobile num` ='$number' ;";
        $run = mysqli_query($con,$sql);
        if(mysqli_num_rows ($run)> 0){
            $data = mysqli_fetch_assoc($run);
            ?>
            <table>
                <tr>
                    <th colspan ="2">Customer Details</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data['name'];?></td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td><?php echo $data['mobile num'];?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $data['address'];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data['email'];?></td>
                </tr>
                <tr>
                    <th>Joining Year</th>
                    <td><?php echo $data['year'];?></td>
                </tr>
            </table>
            <?php
        }
        else{
            echo "<script>alert('No Customer Found');</script>";
        }
       
        
    }

?>