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
        $pw = $data['password'];
        $lastlogin = $data['lastlogin'];
        $lastip = $data['ip'];
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php
                                if(isset($_POST['submit'])){
                                    $saatini = trim(stripslashes(strip_tags(htmlspecialchars($_POST['saatini']))));
                                    $baru = trim(stripslashes(strip_tags(htmlspecialchars($_POST['baru']))));
                                    $ulangi = trim(stripslashes(strip_tags(htmlspecialchars($_POST['ulangi']))));
                                    if(empty($saatini) OR empty($baru) OR empty($ulangi)){
                                        echo "<div class='alert alert-danger'>Fill in the data correctly</div>";
                                    } else {
                                        if($saatini != $pw){
                                            echo "<div class='alert alert-danger'>The current password is wrong</div>";
                                        } else {
                                            if($baru != $ulangi){
                                                echo "<div class='alert alert-danger'>The new password does not match</div>";
                                            } else{
                                                $updatenya = mysqli_query($konek,"update user set password = '$baru' where username = '$uname'");
                                                if($updatenya){
                                                    echo "<div class='alert alert-success'>Successfully change password</div>";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Failure to change the password, contact the admin for more information</div>";
                                                }
                                            }
                                        }
                                    }
                                }
                            ?>
                            <form role="form" method="POST" action="ganti_password.php" autocomplete="off">
                                <div class="form-group">
                                    <label>Current password</label>
                                    <input type="text" class="form-control" name="saatini" placeholder="Current password">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="text" class="form-control" name="baru" placeholder="New password">
                                </div>
                                <div class="form-group">
                                    <label>Repeat new password</label>
                                    <input type="text" class="form-control" name="ulangi" placeholder="Repeat new password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Change Password</button>
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