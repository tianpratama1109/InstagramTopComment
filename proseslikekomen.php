<?php
error_reporting(0);
ob_start();
session_start();
require_once("include/config.php");
require_once("mainconfig.php");
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
        header("Location: login");
        die();
    }else{
        // ini yang dipakai
        header('Content-Type: application/json');
        $url2 = trim(stripslashes(strip_tags(htmlspecialchars($_POST['url']))));
        $url = substr($url2,0,40);
        $targetnya = trim(stripslashes(strip_tags(htmlspecialchars($_POST['username']))));
        $total = trim(stripslashes(strip_tags(htmlspecialchars($_POST['total']))));
        if(empty($url) or empty($targetnya) or empty($total)){
            print json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger"> <strong>Error: </strong> Isi data yang kosong</div>'));
            die();
        } else {
            $get = request(0, generate_useragent(), 'https://api.instagram.com/oembed/?url='.$url);
			$get = json_decode($get[1]);
			$media_id = $get->media_id;
			$getjeda = mysqli_query($konek,"SELECT * FROM user WHERE username='$usernameam'");
			$fetchjeda = mysqli_fetch_array($getjeda);
			$limitlike = $fetchjeda['limit_like'];
			$statuslikekomen = $fetchjeda['likekomen'];
			if($get->media_id){
			    $sekarang = date("Y-m-d H:i:s");
			    $jeda = $fetchjeda['jeda'];
			    $exp = $fetchjeda['exp'];
			    $ab = time() + (60 * 3);
			    $jadigini = date('Y-m-d H:i:s',$ab);
			    if($statuslikekomen == "yes"){
			        if($jeda < $sekarang){
			        if($exp > $sekarang){
			            // disni
			            $getfoto = request(0, generate_useragent(), $url.'?__a=1');
                        $anu = json_decode($getfoto[1]);
                        $totalkomen = $anu->graphql->shortcode_media->edge_media_to_parent_comment->count;
                        for($i=0;$i <= $totalkomen;$i++){
                            $jem = $anu->graphql->shortcode_media->edge_media_to_parent_comment->edges[$i]->node->owner->username;
                            if($jem == $targetnya){
                                $pknya = $anu->graphql->shortcode_media->edge_media_to_parent_comment->edges[$i]->node->id;
                            }
                        }
                        if($pknya == ""){
                            print json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger">The Target comment was not found in this post</div>'));
                        } else {
                            // eksekusi suntik likekomen
                            mysqli_query($konek, "UPDATE user SET jeda='$jadigini' WHERE username='$usernameam'");
                            mysqli_query($konek, "INSERT INTO riwayat_likekomen (username, url, target, total, tanggal) VALUES ('$usernameam','$url','$targetnya','$total','$sekarang')");
                            $cekq = mysqli_query($konek, "SELECT * FROM instagram where likekomen = 'yes' order by rand() LIMIT $total");
                            $postData="ig_sig_key_version=4&signed_body=terserah";
                            while($fx = mysqli_fetch_array($cekq)){
                                $ua = $fx['useragent'];
                                $co = $fx['cookies'];
                                $user = $fx['username'];
                                $cuk = request(1, $ua, 'media/'.$pknya.'/comment_like/', $co, generateSignature($postData));
                                $cross = json_decode($cuk[1]);
                                if($cross->message == "login_required"){
                                    $update = mysqli_query($konek,"UPDATE instagram SET likekomen='no' WHERE username='$user'");
                                }
                            }
                        print json_encode(array('result' => 0, 'content' => '<div class="alert alert-success">Success</div>'));
                        }
			        } else {
			            print json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger">Your account has been expired</div>'));
			        }
			    } else {
			        $awal  = new DateTime($sekarang);
                    $akhir = new DateTime($jeda); // Waktu sekarang
                    $diff  = $awal->diff($akhir);
			        print json_encode(array('result' => 0, 'content' => '<div class="alert alert-warning" role="alert">Tunggu '.$diff->i .' Minutes '.$diff->s.' seconds to submit again.</div>'));
			    }
			    } else {
			        print json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger">This service is not active in your account, chat admin to activate it. Click <a href="https://wa.me/6281227254130"> here</a></div>'));
			    }
			} else {
			    print json_encode(array('result' => 0, 'content' => '<div class="alert alert-danger">Post not found</div>'));
			}
        }

    ?>
    <?php
    }
}
?>