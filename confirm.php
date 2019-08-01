<?php

	include ("config.php");

//	$confirm_key = $_GET["key"];
	$confirm_key = isset($_GET['key']) ? $_GET['key'] : '';
	
	$check = mysqli_query($db, "SELECT email FROM confirm WHERE confirm_key = '$confirm_key'");
	$row=mysqli_fetch_array($check,MYSQLI_ASSOC);
	if(mysqli_num_rows($check) == 1)
	{
		$query = mysqli_query($db, "UPDATE users SET status = 1 WHERE email = '$row[email]'");
		if($query)
		{
			$del = mysqli_query($db, "DELETE FROM confirm WHERE confirm_key = '$confirm_key'");
			if($del)
			{
				$msg=  "Thank You, your email is now activated.";
				echo "<script>window.open('login.php','_self')</script>";
			}
		}
	}
	else
	{
		$msg = "Sorry, Invalid confirmation code <strong>(or)</strong> Maybe your email is activated.";
	}

?>