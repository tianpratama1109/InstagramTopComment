<?php
function instagram($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0, $userpwd = 0, $is_socks5 = 0) {
	$url = $ighost ? 'https://i.instagram.com/api/v1/' . $url : $url;
 	$ch = curl_init($url);
 	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
 	if($proxy) curl_setopt($ch, CURLOPT_PROXY, $proxy);
 	if($userpwd) curl_setopt($ch, CURLOPT_PROXYUSERPWD, $userpwd);
 	if($is_socks5) curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
 	if($httpheader) curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
 	curl_setopt($ch, CURLOPT_HEADER, 1);
 	if($cookie) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
 	if ($data): curl_setopt($ch, CURLOPT_POST, 1);
 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 	endif;
 	$response = curl_exec($ch);
 	$httpcode = curl_getinfo($ch);
 	if(!$httpcode) return false;
 	else{
 		$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
 		$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
 		curl_close($ch);
 		return array($header, $body);
 	}
}
function generateSignature($data) {
 	return hash_hmac('sha256', $data, '109513c04303341a7daf27bb41b268e633b30dcc65a3fe14503f743176113869');
}
function generateSignatureForPost($data) {
 	return 'ig_sig_key_version=4&signed_body='.generateSignature($data).'.'.urlencode($data);
}
function generateDeviceId() {
 	$megaRandomHash = md5(number_format(microtime(true), 7, '', ''));
 	return 'android-'.substr($megaRandomHash, 16);
}
function isValidUUID($uuid) {
	if (!is_string($uuid)) {
 		return false;
 	}
 	return (bool) preg_match('#^[a-f\d]{8}-(?:[a-f\d]{4}-){3}[a-f\d]{12}$#D', $uuid);
}
function generate_useragent($sign_version = '27.0.0.7.97') {
    $resolusi = array('1080x1776','1080x1920','720x1280', '320x480', '480x800', '1024x768', '1280x720', '768x1024', '480x320');
    $versi = array('HM NOTE 1LTE', 'HM 1SW', 'MI 4W', 'Redmi 4','Redmi 4x','Redmi Note 5','Redmi Note 5A','MI MAX 2','MI 6','Redmi 3','Redmi Note 3');
    $dpi = array('120', '160', '320', '240');
    $ver = $versi[array_rand($versi)];
    return 'Instagram '.$sign_version.' Android ('.mt_rand(10,11).'/'.mt_rand(1,3).'.'.mt_rand(3,5).'.'.mt_rand(0,5).'; '.$dpi[array_rand($dpi)].'dpi; '.$resolusi[array_rand($resolusi)].'; Xiaomi; '.$ver.'; armani; qcom; en_US)';
}
function generateUUID($keepDashes = true) {
	$uuid = sprintf(
		'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		mt_rand(0, 0xffff),
		mt_rand(0, 0xffff),
		mt_rand(0, 0xffff),
		mt_rand(0, 0x0fff) | 0x4000,
		mt_rand(0, 0x3fff) | 0x8000,
		mt_rand(0, 0xffff),
		mt_rand(0, 0xffff),
		mt_rand(0, 0xffff)
	);
	return $keepDashes ? $uuid : str_replace('-', '', $uuid);
}