<?php
	include 'header.php';
	include 'config.php';
	$message = "";
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$contact_no = $_POST["contact_no"];
		$address = mysqli_real_escape_string($db, $_POST["address"]);
		$position = mysqli_real_escape_string($db, $_POST["position"]);
	    $bday = $_POST["bday"];
	    $gender = $_POST["gender"];
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$message = "Invalid email format"; 
		}else
		{
			$sql="SELECT email FROM employee WHERE email='$email'";
			$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result) == 1)
			{
				$message = "Sorry...This email already exist.";
			}
			else
			{
				$query = mysqli_query($db, "INSERT INTO employee (eid,name,email,contact_no,address,gender,position,bday)VALUES (NULL,'$name', '$email', '$contact_no' , '$address' , '$gender' , '$position' , '$bday')");
				if($query)
				{
				    
					$message = "Data inserted successfully";
					//header("Location:employee.php");
					echo "<script> location.href='employee.php'; </script>";
					
				}else
				{
					$message =  "There is some problem in inserting data.";
				}
			}

		}
	}
	
	
?>
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Employee</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
				<form action="" method="POST">
					<div class="form-group">
						<label for="inputAddress"> Name</label>
						<input type="text" class="form-control" name="name" id="inputAddress" placeholder="Enter your name">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Contact no</label>
							<input type="text" class="form-control" name="contact_no" id="inputPassword4" placeholder="Mobile Number">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
					</div>
					
					<div class="form-row">
						
						<div class="form-group col-md-4">
							<label for="inputState">Gender</label>
							<select id="inputState" name="gender" class="form-control">
								<option selected>Choose...</option>
								<option name="male" value="male">Male</option>
								<option name="female" value="female">Female</option>
							</select>
						</div>
						<div class="form-group col-md-8">
							<label for="inputZip">Position</label>
							<input type="text" class="form-control" name="position" id="inputZip">
						</div>
					</div>
					<div class="form-group">
						<label for="bday">Birthday</label>
						<input type="date" class="form-control" name="bday" id="bday" >
						
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