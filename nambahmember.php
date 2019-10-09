<?php
ob_start();
session_start();
require_once("include/config.php");

// cek data yang sudah di submit
if(isset($_POST['submit'])){
    if (empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['durasi']) OR empty($_POST['kode'])){
        $pesan = "<div class='alert alert-danger'>Isi data yang ada dengan benar</div>";
    }
    else {
       $submitkode = $_POST['kode'];
    $get = mysqli_query($konek, "select * from admin");
    $getkode = mysqli_fetch_array($get);
    $kode = $getkode['kode'];
    if($kode == $submitkode){
        $username = trim(stripslashes(strip_tags(htmlspecialchars(mysqli_real_escape_string($konek,$_POST['username'])))));
        $password = trim(stripslashes(strip_tags(htmlspecialchars(mysqli_real_escape_string($konek,$_POST['password'])))));
        $durasi = trim(stripslashes(strip_tags(htmlspecialchars(mysqli_real_escape_string($konek,$_POST['durasi'])))));
        $likefoto = "no";
        $komenfoto = "no";
        $follow = "no";
        $topkomenya = "yes";
        $viewstory = "no";
        $sekarang = date("Y-m-d H:i:s");
        $ab = time() + (60 * 60 * 24 * $durasi);
	    $jadigini = date('Y-m-d H:i:s',$ab);
        $insert = mysqli_query($konek, "INSERT INTO user (username, password, exp, jeda, jeda_foll, jeda_komen, jeda_like, status, limit_like, likekomen, likefoto, komenfoto, follow, story) VALUES ('$username','$password','$jadigini','$sekarang','$sekarang','$sekarang','$sekarang','1','no','$topkomenya','$likefoto','$komenfoto','$follow','$viewstory')");
        if($insert){
            $pesan = "<div class='alert alert-success'>Sukses Add Member<br><br>Username : ".$username."<br>Password : ".$password."<br>Durasi : ".$durasi." hari</div>";
        } else {
            $pesan = "<div class='alert alert-danger'>error, hubungi creator script ini/div>";
        }
    } else {
        $pesan = "<div class='alert alert-danger'>Kode salah, kalau ente bukan admin jangan main2 ya gaes, ke detect tau</div>";
    } 
    }
    
} else {
    $pesan = "<div class='alert alert-danger'>Isi data yang ada dengan benar</div>";
}

include("include/header.php");
?>

<div class="container">
    <div class="row">
        <div style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-instagram"></i> Tambah Member</h3>
                </div>
                <div class="panel-body">
                    <?php
                        if(isset($_POST['submit'])){
                            echo $pesan;
                        }
                    ?>
                    <form role="form" method="POST" action="nambahmember.php" autocomplete="off">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Durasi (hari)</label>
                            <input type="number" class="form-control" name="durasi" placeholder="Durasi (contoh 30 hari ditulis hanya '30' saja">
                        </div>
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control" name="kode" placeholder="Kode">
                        </div>
                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php
include("include/footer.php");
?>