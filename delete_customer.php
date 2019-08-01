<?php
	include "config.php";
	
	$select = "DELETE from customer where cid='".$_GET['del_id']."'";
	$query = mysqli_query($db, $select) or die($select);
	header ("Location: customer.php");
?>
