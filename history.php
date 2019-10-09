<?php
ob_start();
session_start();
require_once("include/config.php");
$usernameam = $_SESSION['usernameam'];
    $ceksession = mysqli_query($konek,"select * from user where username='$usernameam'");
    $xceksession = mysqli_fetch_array($ceksession);
    $cekuserasli = $xceksession['username'];
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
    $cekuserasli = $xceksession['username'];
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
                            <center>Riwayat Submit</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="panel-body">
                            <div class="form-group">
                                <a href="riwayat"><button class="btn btn-primary sorry btn-outline btn-block">Riwayat Top Komen</button></a>
                            </div>
                        </div>
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