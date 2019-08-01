<?php
	include("config.php");
	include('header.php');


	$id = (isset($_GET['key']) ? $_GET['key'] : 0);
	$result = mysqli_query($db,"SELECT * FROM medicine WHERE name='$id' AND price<='$id' ");

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
                <form action="" method="POST">
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


while($row = mysqli_fetch_assoc($result)){
		//$id = $row['mid'];
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='mid' value=".$row['mid']." />
			  <div class='image'>".$row['name']."</div>
			  <div class='name'>".$row['cname']."</div>
		   	  <div class='price'>".$row['price']."</div>
			  <button type='submit' class='buy'><a href='confirmation.php?id=$id'>Buy Now</a></button>
			  </form>
		   	  </div>";
        }
//mysqli_close($db);
?>

<div style="clear:both;"></div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="message_box" style="margin:10px 0px;">

<br /><br />

</body>
</html>