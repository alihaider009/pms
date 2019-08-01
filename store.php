<?php
	include 'header.php';
?>
	<div class="container">
            
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Latest Hits</h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Performance</h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
               
                
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Storage Status</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO.</th>
                                    <th scope="col">MEDICINE NAME</th>
                                    <th scope="col">RACK NO</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">STORE TIME</th>
									<th scope="col">ACTION</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><b>#122349</b></th>
                                    <td><b>Oliver Tragkljkjklkkkkjkjkhujkilu</b></td>
                                    <td><b>London, UK</b></td>
                                    <td><b>485 km</b></td>
                                    <td>16:00, 12 NOV 2018</td>
									<td>
										<a href="">Update</a>
									</td>
                                    
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
				<a href="add_store.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new </a>
            </div>
        </div>
<?php
	include 'footer.php';
?>