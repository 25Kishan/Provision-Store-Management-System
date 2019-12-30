<?php
session_start();

if(isset($_SESSION['uid'])){
   echo "";
}
else{
    header('location: ..\admin-login.php');
}
$cnt = 1;
$date = date('d-m-Y ');
include('header.php');
include('..\dbcon.php');
function fill_price($con)
{
    $output = "";
    $query = "SELECT * FROM product ORDER BY P_name ASC";
    $statement = $con->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $output .= '<option value="'.$row["unit_name"].'">'.$row["unit_name"].'</option>';
    }
    return $output;
}
?>
<html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Editable Invoice</title>

	<link rel='stylesheet' type='text/css' href='invoice.css' />
	<script type='text/javascript' src='jquery.invoice.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	function formSubmit(){
		var cname = $('#cname').val();
		var cid = $('#cid').val();
		var option = $('#users').val();
		var qty = $('#qty').val();
		var price = $('#price').text();
		var total = $('#total').text();
		var paid = $('#paid').text();
		var due = $('#due').text();
		
		$.ajax({
			type:'POST',
			url:'billsys.php',
			data:{
				cname:cname,
				cid:cid,
				option:option,
				qty:qty	,
				price:price,
				total:total,
				paid:paid,
				due:due
			},
			success:function(response){
				alert(response);
			}
		});
		return false;
}
$(document).ready(function() {
       $("#acc").click(function() {
		var cname = $('#cname').val();
		var cid = $('#cid').val();
		var total = $('#total').text();
		var paid = $("#paid").val();
		var due = $('#due').text();
		
		$.ajax({
			type:'POST',
			url:'account.php',
			data:{
				cname:cname,
				cid:cid,
				total:total,
				paid:paid,
				due:due
			},
			success:function(response){
				alert(response);
			}
		});
		return false;
       });
    });

	</script>
</head>

<body>

	<div id="page-wrap" style="background-color:#fff;">

		<textarea style="text-align:center; width:100%; background-color:black; color:#fff; padding-top:10px;">INVOICE</textarea>

		<div style="clear:both"></div>
		<form action="" id="frminvoice" method="post" onsubmit="return formSubmit();"> 
		<div id="customer">
		<table id="all">
            <table id="meta">
							<tr>
								<td class="meta-head">Customer Type</td>
								<td><input type="radio" id="new" name="new" value="New" for="checkcustomer" > New Customer<br>
                				<input type="radio" id="old" name="new" value="Old">Old Customer<br></td>
							</tr>
							<tr>
								<td class="meta-head" for="cname">Customer Name</td>
								<td><input type="text" id="cname" name="cname" placeholder="Customer Name"></td>
							</tr>
                <tr>
                    <td class="meta-head" for="cid">Customer Id</td>
                    <td ><input id="cid" name="cid"></td>
                </tr>

                <tr>

                    <td class="meta-head">Date</td>
                    <td><div id="date"><?php echo $date;?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"></div></td>
                </tr>

            </table>

		</div>

		<table id="items" name="items">

		  <tr>
		      <th>Item</th>
		      <th>Quantity</th>
		      <th>Unit Cost</th>
		      <th>Price</th>
		  </tr>
		  <!-- <tr>
		  <td class="item-name"><div class="delete-wpr"><select name="users" id="users" onchange="showUser(this.value)"><option value="">Select a person:</option><option value="Sugger">Sugger</option><option value="Rice">Rice</option><option value="Pawa">Pawa</option><option value="Potato">Potato</option></select><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td><input type="text" class="qty" name="qty" id="qty"  placeholder="Item Quantity"></td><td><input type="text" class="cost" id="txtHint" placeholder="Item Unitcost"></td><td><span class="price" id="price" placeholder="Total Price"></span></td>
		  </tr> -->

		  <tr class="item-row">
		  </tr>

		  <tr>
		    <td colspan="4"><a id="addrow" href="javascript:;" title="Add a row">
				<input type="button" name="Add" value="Add" id="add"></a>
			</td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total" name="total"></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><input type="text" id="paid" name="paid" placeholder="Enter paid balance"></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance" id="due"><div class="due" name="due" ></div></td>
		  </tr>
          <tr>
        <td colspan="2" class ="blank"align="center" style="font-size:20px;width:100%s;">
		</td>
    </tr>

		</table>
		<input type="submit" name="submit" value="Submit" id="submit">
		
		
        </form>
		<input type="submit" name="acc" value="Add to Account" id="acc">
		<input type="button" name="Reset" value="Reset" id="reset" onclick="resetinput();">
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>

	</div>
    <script>
function resetinput(){
	var data = document.getElementById("items");
	while(data.rows.length>0){
		data.deleteRow(2);
	}
}
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").value = this.responseText;
                  document.getElementById("txtHi").value = this.responseText;

            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>
</body>
</html>
<?php  


?>