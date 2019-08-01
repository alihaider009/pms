<?php
	include 'header.php';
	include 'config.php';
	$message = "";
	 
	
	

	if(isset($_POST["submit"]))
	{
		//$id = $_GET["id"];
		$id = (isset($_GET['id']) ? $_GET['id'] : 0);
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
			$query = mysqli_query($db, "UPDATE employee SET name='$name' , email='$email' , contact_no='$contact_no' , address='$address' , gender='$gender' , 
					position='$position' , bday='$bday' WHERE eid='$id' ");
			if($query)
				{
					$message = "Data inserted successfully";
					//header("Location: employee.php");
					echo "<script> location.href='employee.php'; </script>";
				}else
				{
					$message =  "There is some problem in inserting data.";
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
                <h2 class="tm-block-title d-inline-block">Update Employee</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
				<form action="" method="POST">
				
				<?php
				$id = $_GET['id'];
				$sql = "SELECT * FROM employee where eid='$id' ";
				$result = mysqli_query($db,$sql)or die(mysqli_error());
				while($row = mysqli_fetch_array($result)) {
				?>
				
					<div class="form-group">
						<label for="inputAddress"> Name</label>
						<input type="text" class="form-control" name="name" id="inputAddress" value="<?php echo $row['name'];?>">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="email" id="inputEmail4" value="<?php echo $row['email'];?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Contact no</label>
							<input type="text" class="form-control" name="contact_no" id="inputPassword4" value="<?php echo $row['contact_no'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" name="address" id="inputAddress" value="<?php echo $row['address'];?>">
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
							<input type="text" class="form-control" name="position" id="inputZip" value="<?php echo $row['position'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="expire_date">Birthday</label>
						<input type="text" class="form-control validate" data-large-mode="true" name="bday" id="bday" value="<?php echo $row['bday']; ?>">
						<script type="text/javascript" language="javascript">
							$(function() {
								$('#bday').datepicker();
							});
						</script>
						
					</div>
					
				<?php } ?>
					<div class="form-group col-md-8">
							<p><?php echo $message;?></p>
					</div>
				
					<button type="submit" name="submit" class="btn btn-primary">Update</button>
				</form>
          </div>
        </div>
      </div>
    </div>
	
<?php
	include 'footer.php';
?>