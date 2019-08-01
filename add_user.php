<?php
	include 'header.php';
?>
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add User</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
				<form>
					<div class="form-group">
						<label for="inputAddress"> Name</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Enter your name">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Contact no</label>
							<input type="text" class="form-control" id="inputPassword4" placeholder="Mobile Number">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
					</div>
					
					<div class="form-row">
						
						<div class="form-group col-md-4">
							<label for="inputState">Gender</label>
							<select id="inputState" class="form-control">
								<option selected>Choose...</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary">Add</button>
				</form>
          </div>
        </div>
      </div>
    </div>
<?php
	include 'footer.php';
?>