<?php
// Script by Denny Irawan

if(!$username) {
	header('location:../login.php');
} ?>


                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
                        <div class="card-box1 table-responsive">
                            <h4 class="m-t-0 header-title"><b>Order History</b></h4>
                            <p class="text-muted font-13 m-b-30">
                                "after you order, the data will be stored in order history."
                            </p>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">		
			                <thead>
			                  <tr>
			                    <th>NO</th>
			                    <th>ORDER ID</th>
			                    <th>SERVICE</th>
			                    <th>LINK</th>
			                    <th>Start Count</th>
			                    <th>QUANTITY</th>
			                    <th>PRICE</th>
			                    <th>STATUS</th>
			                    <th>DATE</th>
			                  </tr>
			                </thead>
			                <tbody>
<?php
  $queryu = "SELECT * FROM order_history WHERE buyer = '$username' ORDER BY id DESC";
 $exe = mysql_query($queryu);
 $cek = mysql_num_rows($exe);
 $no = 1;
 while($row = mysql_fetch_assoc($exe)){
  $order_id = $row['order_id'];
  $service = $row['service'];
  $link = $row['link'];
  $start = $row['start_count'];
  $quantity = $row['quantity'];
  $price = $row['price'];
  $status = $row['status'];
  $date = $row['date'];
?>
			                  <tr>
			                    <td><?php echo $no; ?></td>
			                    <td><?php echo $order_id; ?></td>
			                    <td><?php echo $service; ?></td>
			                    <td><?php echo $link; ?></td>
                                <td><?php echo $start; ?></td>
			                    <td><?php echo $quantity; ?></td>
			                    <td><?php echo $price; ?></td>
			                    <td>
<?php if ($status == "Completed") { ?>
<span class="label label-success">
<? } else if ($status == "In progress") { ?>
<span class="label label-info">
<? } else if ($status == "Partial") { ?>
<span class="label label-warning">
<? } else if ($status == "Pending") { ?>
<span class="label label-warning">
<? } else if ($status == "Refunded") { ?>
<span class="label label-danger">
<? } else if ($status == "Processing") { ?>
<span class="label label-info">
<? } else if ($status == "Success") { ?>
<span class="label label-success">
<? } else if ($status == "Cancelled") { ?>
<span class="label label-danger">
<? } ?>
<?php echo $status; ?>
</span>
</td>
			                    <td><?php echo $date; ?></td>
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