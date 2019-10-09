<?php
require_once("../include/config.php");
$id = stripslashes(htmlspecialchars($_POST['service'], ENT_QUOTES));
$query = mysqli_query($konek,"SELECT * FROM service WHERE no = '$id' AND status = 'Tersedia'");
$count = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
$show = $data['rate']*1000;
if ($count == 0) { ?>
Rp. 0
<? } else { ?>
<?php echo 'Rp. '.number_format($show,0,",","."); ?>
<? } ?>