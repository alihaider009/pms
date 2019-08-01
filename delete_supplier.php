<?php
	include "config.php";
	
	$select = "DELETE from supplier where sid='".$_GET['del_id']."'";
	$query = mysqli_query($db, $select) or die($select);
	header ("Location: supplier.php");
?>
