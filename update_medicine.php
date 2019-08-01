<?php
	include 'header.php';
	include 'config.php';
	$message = "";
	if(isset($_POST["submit"]))
	{
		$id = (isset($_GET['id']) ? $_GET['id'] : 0);
		$name = $_POST["name"];
		$cname = $_POST["cname"];
		$generic = $_POST["generic"];
		$category = $_POST["category"];
		$production_date = $_POST["production_date"];
		$expire_date = $_POST["expire_date"];
		$stock = $_POST["stock"];
		$price = $_POST["price"];
		$total_price = $stock * $price;
		
		
		$query = mysqli_query($db, "UPDATE medicine SET name='$name' , cname='$cname' , generic='$generic' , category='$category', production_date='$production_date' , expire_date='$expire_date' , 
					stock='$stock' , price='$price' , total_price='$total_price' WHERE mid='$id' ");
			if($query){
				    
				$message = "Data inserted successfully";
				//header("Location:dashboard.php");
				echo "<script> location.href='medicine.php'; </script>";
					
			}else{
					$message =  "There is some problem in inserting data.";
				}
	}
	
?>


    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Update Medicine</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" method="POST" class="tm-edit-product-form">
				<?php
				$mid = $_GET['id'];
				//$mid = $_SESSION['id'];
				$sql = "SELECT * FROM medicine where mid='$mid' ";
				$result = mysqli_query($db,$sql)or die(mysqli_error());
				while($row = mysqli_fetch_array($result)) {
				?>
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
					  value="<?php echo $row['name'];?>"
                      
                    />
                  </div>
				   <div class="form-group mb-3">
                    <label
                      for="cname"
                      >Company</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="cname"
					  name="cname"
					  value="<?php echo $row['cname'];?>"
                    >
                      <option selected > <?php echo $row['cname'];?></option>
                      <option value="square">Square Pharmaceuticals Limited</option>
                      <option value="beximco">Beximco Pharmaceuticals Limited</option>
                      <option value="skf">SKF</option>
					  <option value="incepta">Incepta</option>
					  <option value="delta">Delta Pharmaceuticals</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="generic"
                      >Generic
                    </label>
                    <input
                      id="generic"
                      name="generic"
                      type="text"
                      class="form-control validate"
					  value="<?php echo $row['generic'];?>"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
					  name="category"
                    >
                      <option selected ><?php echo $row['category'];?></option>
                      <option value="capsul">Capsul</option>
                      <option value="tablet">Tablet</option>
                      <option value="syrup">Syrup</option>
					  <option value="antibiotic">Antiboitic</option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="production_date"
                            >Production Date
                          </label>
                          <input
                            id="production_date"
                            name="production_date"
                            type="text"
                            class="form-control validate"
							 value="<?php echo $row['production_date'];?>"
                            data-large-mode="true"
                          />
                        </div>
						<div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Expire Date
                          </label>
                          <input
                            id="expire_date"
                            name="expire_date"
                            type="text"
                            class="form-control validate"
							 value="<?php echo $row['expire_date'];?>"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Units In Stock
                          </label>
                          <input
                            id="stock"
                            name="stock"
                            type="text"
                            class="form-control validate"
							value="<?php echo $row['stock'];?>"
							required
                            
                          />
                        </div>
						 <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="price"
                            >Price per unit
                          </label>
                          <input
                            id="price"
                            name="price"
                            type="text"
                            class="form-control validate"
							value="<?php echo $row['price'];?>"
                            required
                          />
                        </div>
				<?php } ?>
						<div class="form-group mb-3">
							<p><?php echo $message;?></p>
						</div>
                  </div>
                  
              </div>
             
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Update</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Rabeya</a>
        </p>
        </div>
    </footer> 

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
		$(function() {
        $("#expire_date").datepicker();
        });
        $("#expire_date").change(function () {
		var startDate = document.getElementById("production_date").value;
		var endDate = document.getElementById("expire_date").value;

		if ((Date.parse(endDate) <= Date.parse(startDate))) {
			alert("End date should be greater than Start date");
			document.getElementById("expire_date").value = "";
	}
});
    </script>
	 <script>
      $(function() {
        $("#production_date").datepicker();
      });
    </script>
  </body>
</html>
