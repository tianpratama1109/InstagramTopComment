<?php
date_default_timezone_set('Asia/Jakarta');

function request($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0, $userpwd = 0, $is_socks5 = 0){
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
	if ($data){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	$response = curl_exec($ch);
	$httpcode = curl_getinfo($ch);
	if(!$httpcode) return false; else{
		$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		curl_close($ch);
		return array($header, $body);
	}
}
function generateDeviceId($seed){
	$volatile_seed = filemtime(__DIR__);
	return 'android-'.substr(md5($seed.$volatile_seed), 16);
}
function generateSignature($data){
	$hash = hash_hmac('sha256', $data, '68a04945eb02970e2e8d15266fc256f7295da123e123f44b88f09d594a5902df');
	return 'ig_sig_key_version=4&signed_body='.$hash.'.'.urlencode($data);
}
function generate_useragent(){
	return 'Instagram 10.8.0 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)';
}
function get_csrftoken(){
	$fetch = request('si/fetch_headers/', null, null);
	$header = $fetch[0];
	if (!preg_match('#Set-Cookie: csrftoken=([^;]+)#', $fetch[0], $token)) {
		return json_encode(array('result' => false, 'content' => 'Missing csrftoken'));
	} else {
		return substr($token[0], 22);
	}
}
function generateUUID($type){
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

    return $type ? $uuid : str_replace('-', '', $uuid);
}
function instagram_login($post_username, $post_password){
	$postq = json_encode([
		'phone_id' => generateUUID(true),
		'_csrftoken' => get_csrftoken(),
		'username' => $post_username,
		'guid' => generateUUID(true),
		'device_id' => generateUUID(true),
		'password' => $post_password,
		'login_attempt_count' => 0
	]);
	$a = request(1, generate_useragent(), 'accounts/login/', 0, generateSignature($postq));
	$header = $a[0];
	$a = json_decode($a[1]);
	if($a->status == 'ok'){
		preg_match_all('%Set-Cookie: (.*?);%',$header,$d);$cookies = '';
		for($o=0;$o<count($d[0]);$o++)$cookies.=$d[1][$o].";";
		$id = $a->logged_in_user->pk;
		$array = json_encode(['result' => true, 'cookies' => $cookies, 'useragent' => generate_useragent(), 'id' => $id]);
	} else {
		$array = json_encode(['result' => false, 'msg' => 'Invalid user/pass or verify']);
	}
	return $array;
}
function genWaktu($detik){
		$detik1 = time()-10;
		return "$detik"."_"."$detik1";
			 }
?>