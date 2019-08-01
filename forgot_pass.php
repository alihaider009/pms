<?php

	include ("config.php");
	$msg = "";
	session_start();
// If form submitted, insert values into the database.
	if (isset($_POST['submit'])){
       
		$email = mysqli_real_escape_string($db, $_POST["email"]);
		//$password = mysqli_real_escape_string($db, $_POST["password"]);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'";
		$result = mysqli_query($db,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$row = mysqli_fetch_array($query);
			$_SESSION['id'] = $row['uid'];
			//$_SESSION['email'] = $email;
            // Redirect user to index.php
			//header("Location: dashboard.php");
			echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
		}else{
			$msg = "Incorrect login attempt";
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
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    
</head>
<body>
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
				
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Email</label>
                    <input
                      name="email"
                      type="text"
                      class="form-control validate"
                      id="username"
                      placeholder="Enter your email"
                      required
                    />
                  </div>
				   <div class="form-group">
                    
                    <?php echo $msg; ?>
                  </div>
                  
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
					  name="submit"
                    >
                      Send Recovery
                    </button>
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php } ?>
</body>
</html>