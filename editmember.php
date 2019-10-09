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
        if(!isset($_GET['id'])){
            header("Location: index.php");
            die();
        }
        $userget = $_GET['id'];
        $getdata = mysqli_query($konek, "SELECT * FROM user WHERE username= '$userget'");
        $data = mysqli_fetch_assoc($getdata);
        $userasli = $data['username'];
        $likefoto = $data['likefoto'];
        $komenfoto = $data['komenfoto'];
        $likekomen = $data['likekomen'];
        $followers = $data['follow'];
        $viewstory = $data['story'];
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                Username : <?php echo $userget ?><br><br>
                                Status Like foto : <?php echo $likefoto ?><br>
                                Status Komen foto : <?php echo $komenfoto ?><br>
                                Status Top Komen : <?php echo $likekomen ?><br>
                                Status Followers : <?php echo $followers ?><br>
                                Status View Story : <?php echo $viewstory ?><br><br>
                                Ganti Ke<br><br>
                                <?php
                                    if(isset($_POST['submit'])){
                                        $postlike = $_POST['likefoto'];
                                        $postkomen = $_POST['komenfoto'];
                                        $posttop = $_POST['topkomen'];
                                        $postfollow = $_POST['follow'];
                                        $story = $_POST['story'];
                                        $editdata = mysqli_query($konek, "UPDATE user SET likefoto = '$postlike' WHERE username = '$userasli'");
                                        $editdata = mysqli_query($konek, "UPDATE user SET komenfoto = '$postkomen' WHERE username = '$userasli'");
                                        $editdata = mysqli_query($konek, "UPDATE user SET likekomen = '$posttop' WHERE username = '$userasli'");
                                        $editdata = mysqli_query($konek, "UPDATE user SET follow = '$postfollow' WHERE username = '$userasli'");
                                        $editdata = mysqli_query($konek, "UPDATE user SET story = '$story' WHERE username = '$userasli'");
                                        if($editdata){
                                            echo "sukses edit user ini";
                                        } else {
                                            echo "gagal, tanya rafi vadra di wa";
                                        }
                                    }
                                ?>
                                <form action="editmember.php?id=<?php echo $userasli ?>" method="post">
                                    <label>Likefoto</label>
                                    <select name="likefoto">
                                        <option value="no">no</option>
                                        <option value="yes">yes</option>
                                    </select>
                                    <label>Komen foto</label>
                                    <select name="komenfoto">
                                        <option value="no">no</option>
                                        <option value="yes">yes</option>
                                    </select>
                                    <label>Top Komen</label>
                                    <select name="topkomen">
                                        <option value="no">no</option>
                                        <option value="yes">yes</option>
                                    </select>
                                    <label>Followers</label>
                                    <select name="follow">
                                        <option value="no">no</option>
                                        <option value="yes">yes</option>
                                    </select>
                                    <label>View Story</label>
                                    <select name="story">
                                        <option value="no">no</option>
                                        <option value="yes">yes</option>
                                    </select><br>
                                    <input type="submit" name="submit">
                                </form>
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