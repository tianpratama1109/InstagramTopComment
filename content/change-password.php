<?php
// Script by Denny Irawan

if(!$username) {
	header('location:../login.php');
} ?>


<?php if (isset($_POST['change-password'])) {
$npass = $_POST['npass'];
$npass2 = $_POST['npass2'];

if ($npass !== $npass2) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Data yang dimasukkan tidak sesuai. </div>
<? } else if (strlen($npass) < 5) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password minimal 5 karakter. </div>
<? } else if (strlen($npass) > 10) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Password maksimal 10 karakter. </div>
<? } else {
	$send = mysql_query("UPDATE user SET password = '$npass' WHERE username = '$username'");
if ($send) { ?>
<div class="alert alert-info"> <strong>Success: </strong> Password berhasil diganti menjadi <font color="red"><?php echo $npass; ?></font>. </div>
<? } else { ?>
Database error!
<? } } } else { ?>
<div class="alert alert-success"> <strong>*INFO: </strong> Password least 5 characters and a maximum of 10 characters. </div>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
								<div class="panel panel-border panel-custom">
								<div class="panel-heading">Ganti Password</div>
								<div class="panel-body">
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Username</label>
		                      <div class="col-md-12">
		                        <input type="text" class="form-control" value="<?php echo $username; ?>" readonly>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">New Passwod</label>
		                      <div class="col-md-12">
		                        <input type="password" class="form-control" name="npass" placeholder="New Password" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">New Password (Again)</label>
		                      <div class="col-md-12">
		                        <input type="password" class="form-control" name="npass2" placeholder="New Password Again" required>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="change-password">Submit</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->