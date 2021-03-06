<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-sign.css">
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
      <a class="navbar-brand" href="#">Admin Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Signup </a>
            <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="customer-login.php">Customer Login</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php">Home page</a>
           </div>
        </li>
      </ul>
    </div>
      </div>
    </nav>
    <div>
    <form action="index.html" class="login-form">
        <h1>SignUp</h1>

        <div class="txtb">
          <input type="text" required>
          <span data-placeholder="Username"></span>
        </div>
        <div class="txtb">
            <input type="text">
            <span data-placeholder="Email"></span>
          </div>

        <div class="txtb">
          <input type="password">
          <span data-placeholder="Password"></span>
        </div>
        <div class="txtb">
            <input type="text">
            <span data-placeholder="Contact Number"></span>
        </div>

        <div class="txtb">
            <input type="text">
            <span data-placeholder="Address"></span>
        </div>

        <input type="submit" class="logbtn" value="Sign Up">

        <div class="bottom-text">
          Already a member? <a href="admin-login.php">Login</a>
        </div>
    </form>
    </div>
    <script src="animation.js"></script>
</body>
</html>