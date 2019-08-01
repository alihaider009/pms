<?php
	include 'header.php';
?>
	<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Store Information</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
				<form action="" method="POST">
					<div class="form-group">
						<label for="inputAddress"> Customer Name</label>
						<input type="text" class="form-control" name="cname" id="inputAddress" placeholder="Enter your name">
					</div>
					<div class="form-group">
						<label for="inputAddress"> Contact No</label>
						<input type="text" class="form-control" name="contact_no" id="inputAddress" placeholder="Enter your contact number">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Rack no</label>
							<input type="email" class="form-control" name="rack_no" id="inputEmail4" placeholder="Rack ID">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Quantity(pack)</label>
							<input type="text" class="form-control" name="quantity" id="inputPassword4" placeholder="Medicine Number">
						</div>
					</div>
					 
					<div class="form-group">
						<p><?php echo $message; ?></p>
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary">Add</button>
				</form>
          </div>
        </div>
      </div>
    </div>

<?php
	include 'footer.php';
?>