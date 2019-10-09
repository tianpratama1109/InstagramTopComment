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
        header("Location: login");
        die();
    }else{
        // ini yang dipakai
        include("include/header.php");
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                $ds = mysqli_query($konek, "SELECT * FROM instagram");
                                $semua = mysqli_num_rows($ds);
                                $dtk = mysqli_query($konek, "SELECT * FROM instagram WHERE likekomen = 'yes'");
                                $topkomen = mysqli_num_rows($dtk);
                                $dlf = mysqli_query($konek, "SELECT * FROM instagram WHERE likes = 'yes'");
                                $likefoto = mysqli_num_rows($dlf);
                                $dk = mysqli_query($konek, "SELECT * FROM instagram WHERE status = 'yes'");
                                $komen = mysqli_num_rows($dk);
                                $df = mysqli_query($konek, "SELECT * FROM instagram WHERE follow = 'yes'");
                                $follow = mysqli_num_rows($df);
                                echo "DB Top Komen Live = ".$topkomen."<br>";
                                echo "DB Like Foto Live = ".$likefoto."<br>";
                                echo "DB Komen Foto Live = ".$komen."<br>";
                                echo "DB Follow Live = ".$follow."<br><br>";
                            ?>
                            Klik <a href="changestatusdb.php">disini</a> untuk mengubah semua db status jadi "yes/bisa digunakan" semua, tapi tetep saja, tergantung dbmu, kalo udh kena block salah satu fitur ya gak bisa digunain lagi, harus nunggu kurang lebih sehari lebih. Oleh karena itu, script w ini auto misahin db yg live dan die, supaya yg die bisa di rehat kan sejenak dari aktivitas panelmu<br>Jadi db yg mati atau gak bisa digunain didiemin dlu aja semingguan, kalo udh agak lama baru di rubah semua statusnya biar bisa digunain (kembali ke sebelumnya, gak semua bisa idup kembali.
                            <!-- /.table-responsive -->
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