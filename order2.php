<?php

include "header.php";
include "config.php";
$status="";
if (isset($_POST['mid']) && $_POST['mid']!=""){
	//$key = $_POST['keyword'];
	$code = $_POST['mid'];
	$result = mysqli_query($db,"SELECT * FROM `medicine` WHERE `mid`='$code'");
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$code = $row['mid'];
	$price = $row['price'];
	$image = $row['cname'];

	$cartArray = array(
		$code=>array(
		'name'=>$name,
		'code'=>$code,
		'price'=>$price,
		'quantity'=>1,
		'cname'=>$image)
	);

	if(empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		$status = "<div class='box' style='color:white;'>Product is added to your cart!</div>";
	}else{
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($code,$array_keys)) {
			$status = "<div class='box' style='color:red;'>
			Product is already added to your cart!</div>";	
		} else {
		$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
		$status = "<div class='box' style='color:white;'>Product is added to your cart!</div>";
		}

	}
}
?>
<html>
<head>
<title>Order List</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <form action="" method="">
					<div class="form-row">
						
						<div class="form-group col-md-8">
							<input type="text" class="form-control" name="keyword" id="inputZip" placeholder="Enter medicine name or price">
						</div>
						<div class="form-group col-md-2">
							<button type="submit" name="submit" class="btn btn-success"><a href="search.php?key=$key">Search</a></button>

						</div>
					</div>
				</form>
              </div>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));

?>

<?php
}

$result = mysqli_query($db,"SELECT * FROM `medicine`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='mid' value=".$row['mid']." />
			  <div class='image'>".$row['name']."</div>
			  <div class='name'>".$row['cname']."</div>
		   	  <div class='price'>".$row['price']."</div>
			  <button type='submit' class='buy'>Sell Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($db);
?>

<div style="clear:both;"></div>


</div>
</div>
</div>
</div>
</div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
<br /><br />
</div>
</body>
</html>