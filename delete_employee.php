<?php
	include "config.php";
	
	$select = "DELETE from employee where eid='".$_GET['del_id']."'";
	$query = mysqli_query($db, $select) or die($select);
	header ("Location: employee.php");
?>
