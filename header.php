<?php
	session_start();
	include "config.php";
	//$userid = isset($_GET['id']) ? $_GET['id'] : '';
	$username = $_SESSION['name'];
 
	$userq=mysqli_query($db,"select * from `users` where uid='$username'");
	//$userrow=mysqli_fetch_array($userq); 
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
	<!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">Product Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                       
						<li class="nav-item">
                            <a class="nav-link" href="employee.php">
                                <i class="fas fa-user"></i>
                                Employee
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="supplier.php">
                                <i class="fas fa-user"></i>
                                Supplier
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="customer.php">
                                <i class="fas fa-user"></i>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="medicine.php" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-capsules"></i>
                                <span>
                                    Medicine <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="medicine.php">Medicine list</a>
                                <a class="dropdown-item" href="order2.php">Order</a>
                                <a class="dropdown-item" href="sales.php">Sales</a>
                            </div>
                        </li>
						
						<li>
                            <a class="nav-link" href="cart.php">
                                <i class="fas fa-shopping-cart"></i>
                               Store <span></span>
                            </a>
                        </li>

                        
                       
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="login.php">
                               
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                               <span><?php echo $username; ?></span> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
		
