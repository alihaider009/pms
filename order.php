<?php
	//session_start();
	include "header.php";
	include "config.php";
	$status="";
	
	if (isset($_POST['mid']) && $_POST['mid']!=""){
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
			'mid'=>$code,
			'price'=>$price,
			'quantity'=>1,
			'cname'=>$image)
	);

		if(empty($_SESSION["shopping_cart"])) {
			$_SESSION["shopping_cart"] = $cartArray;
			$status = "<div class='box'>Product is added to your cart!</div>";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($code,$array_keys)) {
			$status = "<div class='box' style='color:red;'>
			Product is already added to your cart!</div>";	
		} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			$status = "<div class='box'>Product is added to your cart!</div>";
		}

	}
}

?>
<div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
			<form method="post" action="">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">SL NO.</th>
                    <th scope="col">MEDICINE NAME</th>
                    <th scope="col">UNIT SOLD</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">EXPIRE DATE</th>
					<th scope="col">ACTION1</th>
                    <th scope="col">ACTION2</th>
                  </tr>
                </thead>
                <tbody>
				<div class="cart_div">
					<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
				</div>
				<?php
					if(!empty($_SESSION["shopping_cart"])) {
						$cart_count = count(array_keys($_SESSION["shopping_cart"]));
				?>	
				
				<?php        
					}
        // selecting rows
      
					$sql = "SELECT * FROM medicine"; 
					$result = mysqli_query($db,$sql);

        /////////////
					$sno = 1;
        
					while($fetch = mysqli_fetch_array($result)){
						$name = $fetch['name'];
						$price = $fetch['price'];
						$email = $fetch['stock'];
						$exp = $fetch['expire_date'];
						?>
			<tr>
                <td align='center'><?php echo $sno; ?></td>
                <td class="tm-product-name" align='center'><?php echo $name; ?></td>
                <td align='center'><?php echo $price; ?></td>
                <td align='center'><?php echo $email; ?></td>
				<td align='center'><?php echo $exp; ?></td>
				<td align='center'><a href=""><i class="far fa-trash-alt tm-product-delete-icon"></a></td>
				<td align='center'><a href=update_medicine.php?id=<?php echo $fetch['mid']; ?>><i class="fas fa-edit" style="color:white;"></i></a></td>
            </tr>
            <?php
            $sno ++;
        }
        ?>
				  <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
            </div>
                </tbody>
              </table>
			  </form
            </div>
			
            <!-- table container -->
            <a
              href="add_medicine.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new medicine</a>
           
          </div>
        </div>
        
      </div>
    </div>
<?php
	include "footer.php";
?>