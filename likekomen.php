<?php
ob_start();
session_start();
require_once("include/config.php");
// cek user login dengan session yg benar
if(!isset($_SESSION['usernameam']) OR !isset($_SESSION['csam'])) {
    header("Location: login");
    die();
} else{
    $usernameam = $_SESSION['usernameam'];
    $sessionam = $_SESSION['csam'];
    $ceksession = mysqli_query($konek,"select * from user where username='$usernameam'");
    $xceksession = mysqli_fetch_array($ceksession);
    $truesession = $xceksession['session'];
    if($_SESSION['csam'] <> $truesession){
        header("Location: login?error=yes");
        die();
    }else{
        // ini yang dipakai
        include("include/header.php");
        $xdata = mysqli_query($konek,"select * from user where username='$usernameam'");
        $data = mysqli_fetch_array($xdata);
        $limitlikenya = $data['limit_like'];
        $uname = $data['username'];
        $lastlogin = $data['lastlogin'];
        $lastip = $data['ip'];
        $ydata = mysqli_query($konek,"select * from riwayat_likekomen where username='$usernameam'");
        $sdata = mysqli_num_rows($ydata);
        $gentod = mysqli_query($konek,"select * from instagram where likekomen='yes'");
        $gen = mysqli_num_rows($gentod);
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Submit likes comments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-warning">Always Error? Click <a href='cara_likekomen'>here</a></div>
                            <form role="form" method="POST" action="proseslikekomen.php" autocomplete="off" id="loginform">
                                <div id="salsakp8" class="input-group col-md-12 col-sm-6 col-xs-12"></div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Post URL">
                                </div>
                                <div class="form-group">
                                    <label>Username Target</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username Target *besar kecil berpengaruh">
                                </div>
                                <div class="form-group">
                                    <label>Total Like</label>
                                    <input type="text" class="form-control" id="total" name="total" placeholder="Total Like, max <?php echo $gen ?>">
                                </div>
                                <button type="submit" id="btn-login8" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Submit</button>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
    
    <?php
    }
}
?>
<?php
include("include/footer.php");
?>