<option value="0">Pilih salah satu</option>
<?php
require_once("../include/config.php"); 
 $category = $_POST['category'];
 $category = mysqli_real_escape_string($konek,$category);
 $query = "SELECT * FROM service WHERE category = '$category' AND status = 'Tersedia' ORDER BY no";
 $exe = mysqli_query($konek,$query);
 $cek = mysqli_num_rows($exe);
 $no = 1;
 while($row = mysqli_fetch_assoc($exe)){
  $id = $row['provider_id'];
  $service = $row['service'];

if(isset($_SERVER['HTTP_USER_AGENT'])) {
	$user_agent = array("sqlmap","curl","bot");
	if(preg_match('/'. implode('|',$user_agent) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
	header('HTTP/1.0 404 Not Found');
	exit;
	}
}

?>
<option value="<?php echo $id; ?>"><?php echo $service; ?></option>
<?
$no++;
} ?>