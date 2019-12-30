<?php
$q = strval($_GET['q']);

$con = mysqli_connect('localhost','root','','sms');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"sms");
$sql="SELECT * FROM product WHERE P_name = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    $purchace =   $row['P_SPrice'];
    $qty = $row['P_qty'];
    $amt = ($purchace/$qty);
    echo $amt;
}
mysqli_close($con);
?>
