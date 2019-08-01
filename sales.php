<?php
    include 'header.php';
    include 'config.php';
    
    $sql = "SELECT * FROM sales";

    $result = mysqli_query($db,$sql)or die(mysqli_error());

?>
<div class="container mt-5">
      <div class="row tm-content-row" style="margin:10px; text-align:center;">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($result)) {
                $id = $row['name'];
                $id2 = $row['s_id'];
            ?>
              <tr>
                <td><?php echo $row['cus_name']; ?></td>
                <td><?php echo $row['cus_contact']; ?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['sub_time'];?></td>
                <td>
                      <a href="confirmation.php?id=<?php echo $id;?>&id2=<?php echo $id2;?>" class="tm-product-delete-link">
                        <i class="fas fa-edit"></i>
                    </a>
                 </td>
                
              </tr>
            <?php }  ?>  
            </tbody>
          </table>
        
    
<?php
    include 'footer.php';
?>