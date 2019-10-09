<?php
ob_start();
session_start();
require_once("include/config.php");
// cek user login dengan session yg benar
if(isset($_SESSION['usernameam'])) {
    $usernameam = $_SESSION['usernameam'];
    $sessionam = $_SESSION['csam'];
    $ceksession = mysqli_query($konek,"select * from user where username='$usernameam'");
    $xceksession = mysqli_fetch_array($ceksession);
    $truesession = $xceksession['session'];
    if($_SESSION['csam'] == $truesession){
        header("Location: index");
        die();
    }
}

// cek data yang sudah di submit
if(isset($_POST['submit'])){
    $username = trim(stripslashes(strip_tags(htmlspecialchars(mysqli_real_escape_string($konek,$_POST['username'])))));
    $password = trim(stripslashes(strip_tags(htmlspecialchars(mysqli_real_escape_string($konek,$_POST['password'])))));
    if(strpbrk($username,"#$%^&*()+=-[]';/{}|:<>?~") === false){
        $cekuser = mysqli_query($konek,"select * from user where username='$username'");
        $fcekuser = mysqli_fetch_array($cekuser);
        $fpass = $fcekuser['password'];
        $usernameasli = $fcekuser['username'];
        $sekarang = date("Y-m-d H:i:s");
        $expnya = $fcekuser['exp'];
        $xcekuser = mysqli_num_rows($cekuser);
        if($xcekuser == 0){
            $pesan = "<div class='alert alert-danger'>Username atau Password Anda salah</div>";
        } else {
            if($expnya < $sekarang){
                $pesan = "<div class='alert alert-danger'>Maaf, Akun lo sudah expired</div>";
            } else {
                if($password == $fpass){
                    include("ip.php");
                    $sekarang = date("Y-m-d H:i:s");
                    $ip = ip();
                    $_SESSION['usernameam'] = $usernameasli;
                    $csam = rand(100000000,999999999);
                    $_SESSION['csam'] = $csam;
                    $updatesession = mysqli_query($konek,"update user set session='$csam' where username='$username'");
                    $updateip = mysqli_query($konek,"update user set ip='$ip' where username='$username'");
                    $updatelastlogin = mysqli_query($konek,"update user set lastlogin='$sekarang' where username='$username'");
                    $pesan = "<div class='alert alert-success'>Berhasil login, Anda akan dialihkan....<script>window.location = 'index.php';</script></div>";
                } else{
                    $pesan = "<div class='alert alert-danger'>Username atau Password Anda salah</div>";
                }
            }
        }
        // end lanjutan
    } else {
        $pesan = "<div class='alert alert-danger'>Dilarang menggunakan simbol di username</div>";
    }
}

include("include/header.php");
?>

<div class="container">
    <div class="row">
        <div style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-instagram"></i> Login</h3>
                </div>
                <div class="panel-body">
                    <?php
                        if(isset($_POST['submit'])){
                            echo $pesan;
                        } elseif (isset($_GET['error']) =="yes"){
                            echo "<div class='alert alert-danger'>Anda telah login dengan perangkat lain.</div>";
                        }
                    ?>
                    <form role="form" method="POST" action="login.php" autocomplete="off">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Login</button>
                        <a href="https://api.whatsapp.com/send?phone=6288233311356"><button class="btn btn-primary sorry btn-outline btn-block">WA : 088233311356</button></a>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php
include("include/footer.php");
?>