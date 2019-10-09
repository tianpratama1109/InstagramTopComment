<?php
require_once("config.php");
$id = $_POST['service'];
$query = mysqli_query($konek,"SELECT * FROM service WHERE no = '$id' AND status = 'Tersedia'");
$count = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
$show = $data['description'];
if ($count == 0) { ?>
0
<? } else { ?>
<?php echo $show; ?>
<? } ?>