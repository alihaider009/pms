<?php
	include "config.php";
	
	$select = "DELETE from medicine where mid='".$_GET['del_id']."'";
	$query = mysqli_query($db, $select) or die($select);
	header ("Location: medicine.php");
?>
