<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\admin-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Signup </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admindash.php">Dashboard</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
      </ul>
    </div>
      </div>
    </nav>
    <script src="animation.js"></script>
</body>
</html>
<h2 style="text-align:center;">Admin Area:</h2>
<table align="center" width="80%" border="">
    <form action="payment.php" method="post">
    
    <tr>
        <th>Enter Name</th>
        <td><input type="text" name="username" placeholder="Enter Name" required/></td>

        <th>Enter Id</th>
        <td><input type="text" name="id" placeholder="Enter Id" required/></td>

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
<form action="statement.php">
<table align="center" width="80%" border="" style="margin-top:20px;">
    <tr>
        <th>Customer Name</th>
        <th>Customer Id</th>
        <th>Total Amount</th>
        <th>Amount Paid</th>
        <th>Amount Due</th>
        <th>Link</th>
    </tr>
    <?php
     include('../dbcon.php');
    $sum =0;
    
     if(isset($_POST['submit'])){
        $year = $_POST['id'];
        $name = $_POST['username'];
        $qry = "SELECT `cname`,`cid`,SUM(`totamt`),SUM(`amtpaid`),SUM(`amtdue`) FROM `caccount` GROUP BY `cid` having `cid` = '$year'";
        $run = mysqli_query($con,$qry);
        
       }
     else{
         $qry = "SELECT `cname`,`cid`,SUM(`totamt`),SUM(`amtpaid`),SUM(`amtdue`) from caccount GROUP BY `cid` ";
         $run = mysqli_query($con,$qry);
     }
     

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
               <th><?php echo $data['SUM(`totamt`)']; ?></th>
               <th><?php echo $data['SUM(`amtpaid`)']; ?></th>
               <th><?php echo $data['SUM(`totamt`)']-$data['SUM(`amtpaid`)'] ; ?></th>
               <th><a href="statement.php?cid=<?php echo $data['cid'];?>">statement</a></th>
            </tr>
             <?php
         }
     }

?>
</table>
</form>