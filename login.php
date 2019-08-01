<?php

	include ("config.php");
	$msg = "";
	session_start();
// If form submitted, insert values into the database.
	if (isset($_POST['submit'])){
       
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		$password = mysqli_real_escape_string($db, $_POST["password"]);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
		AND password='".md5($password)."' AND status=1 ";
		$result = mysqli_query($db,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$row = mysqli_fetch_array($query);
			$_SESSION['name'] = $row['name'];
			//$_SESSION['email'] = $email;
            // Redirect user to index.php
			header("Location: dashboard.php");
		}else{
			//$msg = "Incorrect login attempt";
			echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmacy Management System</title>
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
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Login</h2>

				
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="email"
                      type="text"
                      class="form-control validate"
                      id="username"
                      placeholder="Enter your email"
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      placeholder="Enter your password"
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
					  name="submit"
                    >
                      Login
                    </button>
                  </div>
                  <button class="mt-5 btn btn-primary btn-block text-uppercase">
                    Forgot your password?
                  </button>
				  <p><?php echo $msg;?></p>
                </form>
				<button class="mt-5 btn btn-red btn-block text-uppercase">
                   <a href="index.php" >Create Account</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php } ?>
</body>
</html>