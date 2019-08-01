<?php
	if(session_start()) // Destroying All Sessions
	{
		session_destroy ();
		header("Location: login.php"); // Redirecting To Home Page
	}
	

?>
