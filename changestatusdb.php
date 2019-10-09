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
        $update = mysqli_query($konek, "UPDATE instagram SET likekomen = 'yes'");
        $update = mysqli_query($konek, "UPDATE instagram SET likes = 'yes'");
        $update = mysqli_query($konek, "UPDATE instagram SET status = 'yes'");
        $update = mysqli_query($konek, "UPDATE instagram SET follow = 'yes'");
        $update = mysqli_query($konek, "UPDATE instagram SET story = 'yes'");
        if($update){
            header("Location: cekdbnya.php");
            die();
        } else {
            echo "gagal, chat rafi";
        }
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