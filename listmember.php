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
                                    $anutot = mysqli_query($konek, "SELECT * FROM riwayat_likekomen");
echo "Total submit: ".$nutot = mysqli_num_rows($anutot);
                                ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>EXP</th>
                                            <th>Lastlogin</th>
                                            <th>Total Submit</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sekarang = date("Y-m-d H:i:s");
                                        $reset = mysqli_query($konek,"update user set jeda = '$sekarang' where username='rafi'");
                                        $s = mysqli_query($konek,"select * from user order by id asc");
                                        while($sx = mysqli_fetch_array($s)){
                                            $anjing = $sx['username'];
                                            $expcok = $sx['exp'];
                                            $jembodcok = $sx['id'];
                                            if($expcok < $sekarang){
                                                $usernyacok = "<p style='font-color:red;'>".$anjing." - DIEEE</p>";
                                            } else {
                                                $usernyacok = "<p>".$anjing."</p>";
                                            }
                                            $cekriwayat = mysqli_query($konek,"SELECT * FROM riwayat_likekomen WHERE username = '$anjing'");
                                            $totri = mysqli_num_rows($cekriwayat);
                                            echo "
                                            <tr>
                                            <td>".$usernyacok."</td>
                                            <td>".$expcok."</td>
                                            <td>".$sx['lastlogin']."</td>
                                            <td>".$totri."</td>
                                            <td><a href='editmember.php?id=".$anjing."'>Edit</a></td>
                                        </tr>
                                            ";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
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