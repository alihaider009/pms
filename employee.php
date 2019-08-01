<?php
	include 'header.php';
	include 'config.php';
	
	$sql = "SELECT * FROM employee";

	$result = mysqli_query($db,$sql)or die(mysqli_error());

?>
<div class="container mt-5">
      <div class="row tm-content-row" style="margin:10px; text-align:center;">
        <table class="table table-bordered">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Email</th>
                <th>Contract</th>
				<th>Address</th>
				


				<th>Position</th>
				<th>Action 1</th>
				<th>Action 2</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($row = mysqli_fetch_array($result)) {
				$id = $row['eid'];
			?>
			  <tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['contact_no'];?></td>
					<td><?php echo $row['address'];?></td>
						<td><?php echo $row['position'];?></td>
				<td>
					<a href="#" onClick="deleteme(<?php echo $id; ?>)" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
					<script language="javascript">
						function deleteme(delid)
						{
							if(confirm("Do you want Delete!")){
								window.location.href='delete_employee.php?del_id=' +delid+'';
								return true;
							}
						} 
					</script>
				</td>
				<td>
					<a href="update_employee.php?id=<?php echo $id; ?>" class="tm-product-delete-link">
                        <i class="fas fa-edit"></i>
                    </a>
				</td>
			  </tr>
			<?php }  ?>  
			</tbody>
		  </table>
        </div>
			<a
              href="add_employee.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new employee</a>
      </div>
    
<?php
	include 'footer.php';
?>