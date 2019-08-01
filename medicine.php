<?php
	include 'header.php';
	include 'config.php';
?>
<style>
	.sort{
    list-style: none;
}
.sort li{
    float: left;
    border: 1px solid #000;
    padding: 5px 7px;
    margin-right: 10px;
    border-radius: 3px;
}
.sort li a{
    text-decoration: none;
    color:black;
}

.active{
    color: white !important;
}
</style>
<div class="container mt-5">
      <div class="row tm-content-row" >
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products" style="width: 160%;">
			<ul class="sort">
        
        <?php
            echo '<li ><a href="medicine.php" '; 
            if( !isset($_GET['char']) ){
                    echo ' class="active" ';
            }
            echo ' >All</a></li>';

            // Select Alphabets and total records
            $alpha_sql = "select DISTINCT LEFT(name , 1) as firstCharacter,( select count(*) from medicine where LEFT(name , 1)= firstCharacter ) 
						  AS counter from medicine order by name asc";
            $result_alpha = mysqli_query($db,$alpha_sql);

            while($row_alpha = mysqli_fetch_array($result_alpha) ){
                $firstCharacter = $row_alpha['firstCharacter'];
                $counter = $row_alpha['counter'];
                
                echo '<li ><a href="?char='.$firstCharacter.'" '; 
                if( isset($_GET['char']) && $firstCharacter == $_GET['char'] ){
                    echo ' class="active" ';
                }
                echo ' >'.$firstCharacter.' ('.$counter.')</a></li>';

             
            }
        ?>
		</ul><br><br>
            <div class="tm-product-table-container" >
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">SL NO.</th>
                    <th scope="col">MEDICINE NAME</th>
					<th scope="col">Generic Name</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Category</th>
					
                    <th scope="col">Production Date</th>
                 
                    <th scope="col">Expire Date</th>
					<th scope="col">Price</th>
					
					<th scope="col">Stock </th>
					<th scope="col">Action1</th>
                    <th scope="col">Action2</th>
                  </tr>
                </thead>
                <tbody>
					
				<?php        

        // selecting rows
      
        $sql = "SELECT * FROM medicine where 1"; 
        if( isset($_GET['char']) ){
            $sql .= " and LEFT(name,1)='".$_GET['char']."' ";
        }
        $sql .=" ORDER BY name ASC";
        $result = mysqli_query($db,$sql);

        /////////////
        $sno = 1;
        
        while($fetch = mysqli_fetch_array($result)){
			$id = $fetch['mid'];
			//$_SESSION['id'] = $id;
            $name = $fetch['name'];
			 $generic = $fetch["generic"];
			$cname = $fetch["cname"];
		  
		    $category = $fetch["category"];
		    $production_date = $fetch["production_date"];
            $exp = $fetch['expire_date'];
			
            $price = $fetch['price'];
            $email = $fetch['stock'];
			
			
            ?>
            <tr>
                <td align='center'><?php echo $sno; ?></td>
                <td class="tm-product-name" align='center'><?php echo $name; ?></td>
				<td align='center'><?php echo $generic; ?></td>
				<td align='center'><?php echo $cname; ?></td>
				<td align='center'><?php echo $category; ?></td>
                <td align='center'><?php echo $production_date; ?></td>
			    <td align='center'><?php echo $exp; ?></td>
                <td align='center'><?php echo $price; ?></td>
                <td align='center'><?php echo $email; ?></td>
				
				<td>
                    <a href="#" onClick="deleteme(<?php echo $id; ?>)" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                    <script language="javascript">
                        function deleteme(delid)
                        {
                            if(confirm("Do you want Delete!")){
                                window.location.href='delete_medicine.php?del_id=' +delid+'';
                                return true;
                            }
                        } 
                    </script>
                </td>
				<td>
					<a href="update_medicine.php?id=<?php echo $id;?>" class="tm-product-delete-link2">
                        <i class="fas fa-edit"></i>
                    </a>
				</td>
            </tr>
            <?php
            $sno ++;
        }
        ?>
				  
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add_medicine.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new medicine</a>
           
          </div>
        </div>
       
<?php
	include 'footer.php';
?>