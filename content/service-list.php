<?php
// Script by Denny Irawan

if(!$username) {
	header('location:../login.php');
} ?>

                    <!-- Row-->
<div class="row">
						
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Service List</b></h4>
                            <p class="text-muted font-13 m-b-30">
                               "our multiple listing service"
                            </p>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
			                <thead>
			                  <tr>
			                    <th>ID</th>
			                    <th>SERVICE</th>
			                    <th>PRICE/1000</th>
			                    <th>DESCRIPTION</th>
			                    <th>MIN</th>
			                    <th>MAX</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
 $queryu = "SELECT * FROM service WHERE status = 'Tersedia' ORDER BY no ASC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $id = $row['no'];
  $service = $row['service'];
  $price = $row['rate']*1000;
  $description = $row['description'];
  $min = $row['min'];
  $max = $row['max'];
?>
			                  <tr>
			                    <td><?php echo $id; ?></td>
			                    <td><?php echo $service; ?></td>
			                    <td><?php echo "Rp " . number_format($price,0,",","."); ?></td>
			                    <td><?php echo $description; ?></td>
			                    <td><?php echo $min; ?></td>
			                    <td><?php echo $max; ?></td>
			                  </tr>
<?
$no++;
} ?>
			                </tbody>
			              </table>

                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->