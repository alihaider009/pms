<?php

include "header.php";
include "config.php";
//session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST['code'] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

  	
}

if(isset($_POST["next"])){

  

  foreach ($_SESSION["shopping_cart"] as $product){
    $code = $product['quantity'];
    $c = $product['name'];
    $cus_name = $_POST['cus_name'];
    $cus_contact = $_POST['cus_contact'];

    $query = mysqli_query($db, "INSERT INTO sales (s_id,name,quantity,cus_name,cus_contact,sub_time)VALUES (NULL ,'$c', '$code' ,'$cus_name', '$cus_contact' , CURTIME())");
      if($query){
        
        unset($_SESSION["shopping_cart"]);    
        $message = "Data inserted successfully";
        //header("Location:dashboard.php");
        echo "<script> location.href='sales.php'; </script>";
          
      }else{
          $message =  "There is some problem in inserting data.";
        }

  }
  
  
}
?>
<html>
<head>
<title>List</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
			<div class="col-12">
                <h2 class="tm-block-title d-inline-block">Order List</h2>
              </div>


<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
<div class="row tm-content-row">	
<table class="table table-bordered">
<tbody>
<tr>

<td>Item Name</td>
<td>Quantity</td>
<td>Unit Price</td>
<td>Item Total Price</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["mid"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
 <div class="row tm-edit-product-row">
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />

<input type='number' name='quantity' value="<?php echo $product['quantity'];?>" class="quantity" onchange="this.form.submit()">
</form>
</div>
</td>
<td><?php echo $product["price"]; ?></td>
<td><?php echo $product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>

</td>
</tr>
</tbody>
</table>
<form method="post" action="">
  Customer Name:<br/>
  <input type="text" name="cus_name" style="width:300px;" placeholder="Enter customer name"><br/>
  Customer Contact:<br/>
  <input type="text" name="cus_contact" style="width:300px;" placeholder="Enter customer contact number"><br/><br/>
  <button type="submit" name="next">Next</button>
</form>	
</div>	
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<br /><br />
</div>
</div>
</div>
</div>
</div>
</body>
</html>
