<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
      <a class="navbar-brand" href="customer-login.php">Customer's Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Signup </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="admin-login.php">Admin Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php">Home page</a>
           </div>
        </li>
      </ul>
    </div>
      </div>
    </nav>
    <div>
        <form method="post" action="customer-login.php" class="login-form">
            <h1>Customer's Login</h1>

            <div class="txtb">
                <input type="text" name="cname" required>
                <span data-placeholder="Name:" ></span>
           </div>

            <div class="txtb">
                <input type="text"  name="cnum" required>
                <span data-placeholder="Mobile Number:"></span>
            </div>
            
            <div class="txtb">
               <select name="cyear">
                    <option value="0">Joining Year:</option>
                    <option value="1">2019</option>
                    <option value="2">2018</option>
                    <option value="3">2017</option>
                </select>
            </div>

            <input type="submit" name="csubmit" class="logbtn" value="Login">

      </form>
    </div>
    <script src="animation.js"></script>
</body>
</html>
<?php 
 include('dbcon.php');
 if(isset($_POST['csubmit']))
 {
   $name = $_POST['cname'];
   $number = $_POST['cnum'];
   $year = $_POST['cyear'];

  
   $sql = "SELECT * FROM `customer` WHERE `name`='$name' AND `mobile num` ='$number' ;";
   $run = mysqli_query($con,$sql);
   $row = mysqli_num_rows($run);
   if($row < 1)
   {
       ?>
            <script>alert("Please Enter valid Customer Name and Mobile Number ");
            window.open('customer-login.php','_self');
            </script>
       <?php
   }
   else{
    $data = mysqli_fetch_assoc($run);
    $id = $data['id'];
    $_SESSION['uid']=$id;
    header('location:Customer\custom.php');
   }
 
 }
?>