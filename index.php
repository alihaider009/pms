<?php
	include ("config.php");
	$msg = "";
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$contact_no = $_POST["contact_no"];
		$password = mysqli_real_escape_string($db, $_POST["password"]);
		$password = md5($password);
		//$email = $_POST["email"];
	    //$password = $_POST["password"];
	    //$cpassword = $_POST["cpassword"];
		$cpassword = mysqli_real_escape_string($db, $_POST["cpassword"]);
		$cpassword = md5($cpassword);
	    $bday = $_POST["bday"];
	    $gender = $_POST["gender"];
	    $status = 0;
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$msg = "Invalid email format"; 
		}else
		{
			$sql="SELECT email FROM users WHERE email='$email'";
			$result=mysqli_query($db,$sql);
			if(mysqli_num_rows($result) == 1)
			{
				$msg = "Sorry...This email already exist.";
			}
			else
			{
				$key = md5($email.time());
				$confirm = mysqli_query($db, "INSERT INTO confirm (email, confirm_key) VALUES ('$email', '$key')");
				$query = mysqli_query($db, "INSERT INTO users (uid,name,email,contact_no,password,cpassword,bday,gender,status)VALUES (NULL,'$name', '$email', '$contact_no' , '$password','$cpassword','$bday','$gender' , '$status')");
				if($query && $confirm)
				{
					include ("mail_send.php");
					//$body = "Thank you for your registration.<br> Please verify your email by clicking the below link. <br>".$url . "confirmation/".$key;
					//$body = "Thank you for your registration.<br> Please verify your email by clicking the below link. <br>".$url . "/".$key;
					//$body = "Thank you for your registration.<br> Please verify your email by clicking the below link. <br>".$url;
					//$body = "<form action='confirm.php' method='POST'><input type='submit' name='submit' value='Activate'></form>";
					$body = "<a href='http://localhost/pharmacy_management_system/confirm.php?key=$key'>Register</a>";
					
					send_mail($email, $body);
					$msg = "You are now registered. Please check your inbox to verify your email.";
				}else
				{
					$msg =  "There is some problem in inserting data.";
				}
			}

		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
<body>
	<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block"  style="margin-left:35%;padding:0px;margin-bottom:50px;font-size:30px;">New Registration</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
				<form   action="" method="POST" style="margin-left:20%;padding:0px;">
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
						<label for="inputAddress">Password</label>
						<input type="password" class="form-control" name="password" id="inputAddress" placeholder="Enter your password">
					</div>
					
					<div class="form-group">
						<label for="inputAddress">Confirm Password</label>
						<input type="password" class="form-control" name="cpassword" id="inputAddress" placeholder="Confirm your password">
					</div>
					<div class="form-group">
						<label for="inputAddress">Date of Birth</label>
						<input type="date" class="form-control" name="bday" id="inputAddress" placeholder="Confirm your password">
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
						
					</div>
					<div class="form-group">
						<p><?php echo $msg;?></p>
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase mb-3">Sign Up</button>
				</form>
				<p style="margin-left:35%;margin-top:20px;">Already registered! <a href="login.php">log in</a></p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>