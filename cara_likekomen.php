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
        $ydata = mysqli_query($konek,"select * from riwayat where username='$usernameam'");
        $sdata = mysqli_num_rows($ydata);
        $gentod = mysqli_query($konek,"select * from clean1 where likekomen='yes'");
        $gen = mysqli_num_rows($gentod);
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            How to inject likes comment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-danger">Username Target Case Sensitive (The small uppercase letters are influential)</div>
                            <div class="alert alert-danger">Have you commented a lot? But it's not yet the top comment. This happens because in the account that you commented on, he activated the comment filter. So your comment is filtered with the owner so that it can't get into the top comments<br><br>Surely there are promotions (foll, software, and other promos) right? If so, you really got a filter by the owner so that it can't be topped up.<br><br>Try natural comments according to the photos. Without any promotional element, it will definitely be top. <br><br>This can also be done by using different words or fonts, which cannot be detected by the comments filter, for example join your words like this "Sell.Followerss "Cheap" this will be difficult to detect as words that get filtered.</div>
                            <div class="alert alert-danger">
                                If you find urls like this <br>
                            <div class="form-group">
                                <input class="form-control" id="disabledInput" type="text" value="https://www.instagram.com/filtersocialmedia/p/BDTE07CuyDq/" disabled>
                            </div>
                            Surely you will not find (detected) the photo, the username in the link you have to delete first so that you can find it (detect) the photo. Examples of being like this<br><br>
                            <div class="form-group">
                                <input class="form-control" id="disabledInput" type="text" value="https://www.instagram.com/p/BDTE07CuyDq/" disabled>
                            </div>
                            </div>
                            <div class="alert alert-danger">Don't submit photos with more than 1000 comments, because the target will definitely not be found.</div>
                            <div class="alert alert-danger"><img src='assets/likekomen.jpeg' width='270px' height='300px'><br><br>So inject like comments on photos whose total comments are below 1000, like the photo above.</div>
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