<?php
	include('config.php');
	include('header.php');


		$quan=1;

		$id = (isset($_GET['id']) ? $_GET['id'] : 0);
		$id2 = (isset($_GET['id2']) ? $_GET['id2'] : 0);

		//$result = mysqli_query($db , "");
		$sql = "SELECT * FROM medicine JOIN sales on medicine.name=sales.name  WHERE sales.name='$id' AND sales.s_id='$id2'";
		$result = mysqli_query($db,$sql)or die(mysqli_error($db));

		while($row=mysqli_fetch_assoc($result)){
			$quan = $row['stock'] - $row['quantity'];
			//echo $quan;
		}

		$result2 = mysqli_query($db,"UPDATE medicine set stock='$quan' WHERE name='$id'");
		if($result2){
			echo "updated";
		}
		else{
			echo "No";
		}

?>
