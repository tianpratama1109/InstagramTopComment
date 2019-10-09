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
    $cekuserasli = $xceksession['username'];
    if($cekuserasli != "admin"){
        header("Location: index.php");
        die();
    }
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
        $cekkode = mysqli_query($konek, "SELECT * FROM admin");
        $kodenya = mysqli_fetch_assoc($cekkode);
        $kode = $kodenya['kode'];
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ganti Kode Nambah Member
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                if(isset($_POST['submit'])){
                                    $kodex = $_POST['kode'];
                                    if(empty($kodex)){
                                        echo "isi datanya";
                                    } else {
                                        $updatex = mysqli_query($konek, "UPDATE admin SET kode = '$kodex'");
                                        if($updatex){
                                            echo "sukses update kode";
                                        } else {
                                            echo "gagal update";
                                        }
                                    }
                                }
                            ?>
                            <form role="form" method="POST" action="gantikode.php" autocomplete="off">
                                <div id="salsakp8" class="input-group col-md-12 col-sm-6 col-xs-12"></div>
                                <div class="form-group">
                                    <label>Kode Sekarang</label>
                                    <input type="text" class="form-control" value="<?php echo $kode ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Total View</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Baru">
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