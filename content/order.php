<?php

if(!$username) {
	header('location:../login.php');
} ?>

<?php if (isset($_POST['order'])) {
$link = mysql_real_escape_string($_POST['link']);
$no = mysql_real_escape_string($_POST['service']);
$quantity = mysql_real_escape_string($_POST['quantity']);

$dataservice = mysql_query("SELECT * FROM service WHERE no = '$no' AND status = 'Tersedia'");
$sdata = mysql_fetch_array($dataservice);
$scount = mysql_num_rows($dataservice);

$min = $sdata['min'];
$description = $sdata['description'];
$category = $_POST['category'];
$max = $sdata['max'];
$service = $sdata['service'];
$rate = $sdata['rate'];
$provider = $sdata['provider'];
$providerid = $sdata['provider_id'];
$time1 = date('h-i-s A'); 
$price = $quantity*$rate;


if ($scount == 0) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Service tidak ditemukan. </div>
<? } else if (!$quantity || !$link) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Masih ada data yang kosong. </div>
<? } else if ($quantity < $min) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Quantity tidak sesuai. </div>
<? } else if ($quantity > $max) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Quantity tidak sesuai. </div>
<? } else if ($balance < $price) { ?>
<div class="alert alert-danger"> <strong>Error: </strong> Balance tidak mencukupi, silahkan topup. </div>
<? } else {

if ($provider == "FASTPEDIA") {
$key = "Mohon Di isi API KEYnya !"; // your api key
$link = $link; // link target
$quantity = $quantity; // order qantity
$postdata = "key=$key&action=add&service=$no&link=$link&quantity=$quantity";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://domain/api.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
curl_close($ch);
$json_result = json_decode($chresult, true);

} else if ($provider == "SM") {
class Api
   {
      public $api_url = 'https://domain/api/v2/'; // API URL

      public $api_key = 'Mohon Di isi API KEYnya !'; // Your API key

      public function order($link, $type, $quantity) { // Add order
        return json_decode($this->connect(array(
          'api' => $this->api_key,
          'action' => 'add',
          'link' => $link,
          'service' => $type,
          'quantity' => $quantity
        )));
      }

      public function status($order_id) { // Get status, remains
        return json_decode($this->connect(array(
          'api' => $this->api_key,
          'action' => 'status',
          'order_id' => $order_id
        )));
      }


      private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
          foreach ($post as $name => $value) {
            $_post[] = $name.'='.urlencode($value);
          }
        }
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        if (is_array($post)) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
      }
   }

   // Examples

   $api = new Api();

   $order = $api->order("".$link."", "".$providerid."", "".$quantity."");
   }


if ($provider == "FASTPEDIA") {
$order_id = $json_result['order_id'];
} else if ($provider == "SM") { //Get id Order SM Panel
$order_id = $order->data->order_id;
} else {
$order_id = rand(0000,9999);
}
$tai = rand(0000,9999);
$sss ="$tai";
	$send = mysql_query("UPDATE user SET balance = balance-$price WHERE username = '$username'");
	$send = mysql_query("UPDATE user SET balance_used = balance_used+$price WHERE username = '$username'");
	$send = mysql_query("INSERT INTO order_history(order_id, provider, buyer, service, category, link, quantity, price, status, date, time, start_count, remains) VALUES ('$order_id','$provider','$username','$service','$category','$link','$quantity','$price','Pending','$date','$time','$start_count','0')");
if ($send AND $json_result['error'] == TRUE) { ?>
<div class="alert bg-danger">
<font color="black">
<strong>Pembelian: Gagal!</strong><br />
Reason :<?php echo  $json_result['error']?>
</font>
</div>
<? } else { ?>
<div class="alert bg-success">
<font color="black">
<strong>Pembelian: Berhasil!</strong><br />
Order ID: #<?php echo $json_result['order_id']; ?><br />
Service : <?php echo $service; ?><br />
Link : <?php echo $link; ?><br />
Jumlah : <?php echo $quantity; ?><br />

Tanggal Order : <?php echo $date; ?> <br />

</font>
</div>
<? } } }else { ?>
<div class="alert bg-info"> <strong>*INFO: </strong> Sebelum order mohon mebaca Peraturan, agar tidak terjadi kesalahan saat melakukan order. Kami tidak akan merefund order yang error karena kesalahan user</div>
<? } ?>
                    <!-- Row-->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-6">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>       
         <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){

 $("#category").change(function(){
    var category = $("#category").val();

	$.ajax({
		url	: 'include/service.php',
		data	: 'category='+category,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#service").html(msg);
	        }
	});
  });

  $("#service").change(function(){
    var service = $("#service").val();

	$.ajax({
		url	: 'include/min.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#min").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/max.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#max").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/rate.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#rate").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/description.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#description").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/price.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#price").val(msg);
	        }
	});
  });

});
</script>
								<div class="panel panel-border panel-custom">
								<div class="panel-heading"><i class="ti-shopping-cart"></i> New Order</div>
								<div class="panel-body">
                                <!-- start content -->
		                  <form class="form-horizontal" method="POST">
		                    <div class="form-group">
		                      <label class="col-md-12">Category</label>
		                      <div class="col-md-12">
		                        <select class="form-control" name="category" id="category">
		                          <option value="0">Pilih salah satu</option>
				          <option value="IGF">Instagram Followers</option>
				          <option value="IGL">Instagram Likes</option>
				          <option value="IGV">Instagram Views</option>
		                          <option value="TW">Twitter</option>
		                          <option value="FB">Facebook</option>
		                          <option value="YT">Youtube</option>
		                          <option value="GP">Google Plus</option>
		                          <option value="VINE">Vine</option>
		                          <option value="SC">Soundcloud</option>
		                          <option value="SNC">Snapchat</option>
                                          <option value="WEBS">Website</option>
                                          <option value="HOT">Musical.ly</option>

		                        </select>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="col-md-12">Service</label>
		                      <div class="col-md-12">
		                        <select class="form-control" name="service" id="service">
		                          <option value="0">Pilih salah satu</option>
		                        </select>
		                      </div>
		                    </div>
<div class="form-group">
		                      <div class="col-md-4">
			                      <label>Price/1000</label>
			                      <div class="input-group"><span class="input-group-addon">Rp.</span>
			                        <input type="text" class="form-control" id="price" value="0" readonly>
			                      </div>
		                      </div>
		                      <div class="col-md-4">
			                      <label>Min</label>
			                      <div>
			                        <input type="text" class="form-control" id="min" value="0" readonly>
			                      </div>
		                      </div>
		                      <div class="col-md-4">
			                      <label>Max</label>
			                      <div>
			                        <input type="text" class="form-control" id="max" value="0" readonly>
			                      </div>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-12">
			               <label>Description</label>
		                         <textarea id="description" class="form-control" readonly="true"></textarea>
			                      </div>
			                      </div>
		                    <div class="form-group">
		                      <div class="col-md-12">
		                      <label>Username/Link</label>
		                        <input type="text" class="form-control" name="link" placeholder="Username/Link" required>
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <div class="col-md-12">
			                      <label>Quantity</label>
			                      <div>
			                        <input type="hidden" class="form-control" id="rate">
			                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Jumlah order" onkeyup="getcut(this.value).value;" required>
			                      </div>
		                      </div>
		                      <div class="col-md-12">
			                      <label>Cut Balance</label>
			                      <div class="input-group"><span class="input-group-addon">Rp.</span>
			                        <input type="text" class="form-control" id="cutbalance" value="0" readonly>
			                      </div>
		                      </div>
		                    </div>
		                    <div class="form-group m-b-0">
		                      <div class="col-md-12">
		                        <button type="submit" class="btn btn-info waves-effect waves-light" name="order">Submit</button>
		                      </div>
		                    </div>
		                  </form>
                                <!-- end content -->
                            </div>

                        </div>
                        <!-- col -->
                    </div>
                    <!-- Row-->
<div class="col-sm-6">
								<div class="panel panel-border panel-custom">
								<div class="panel-heading">
									<div class="heading-elements">
				                	</div>
								</div>

<div class="panel-body">
<center><h4><i class="fa fa-user"></i><font color="red"> <b>PERATURAN SEBELUM ORDER</b></h4></font></center><br>
<hr>
<strong><u> PASTIKAN AKUN TERSEDIA Dan TIDAK DI PRIVATE </u></strong><br>
Berikut Beberapa Contoh Data Yang Harus Di Sesuaikan Dengan Service :<br>
<ul>
<li>Instagram Like/Views Video : <b>https://www.instagram.com/p/BM1B9KyhbSt/</b></li>
<li>Instagram Followers : <b>m_harits19( Tidak menggunakan Link )</b></li>
<li>Youtube Views : <b>https://www.youtube.com/watch?v=Tf7YkkGM0fk</b></li>
<li>Twitter Followers : <b>RYukii69 ( Hanya Menggunakan Username Twitter )</b></li>
<li>Line@ : <b>@wth2571v</b>
</li></ul>
<li> Jangan menggunakan lebih dari satu layanan sekaligus untuk username/link yang sama. Harap tunggu status Completed / Masuk. <br>
<li> Pilih Layanan Sesuai Yang Dibutuhkan, Sebelum Submit Pastikan Data Benar.<br>
<li> Kesalahan Submit akan Mengakibatkan Kerugian Dan Tidak Dapat Di Refunded<br>
<strong><center><font color="red">JIKA ADA MASALAH SILAHKAN CONTACT ADMIN</font></center></strong>


</div>
</div></div></div></div>
					</div>
					</div>
                    <!-- Row-->
                    <!-- Row-->