<?php

$accounts = array(
	'gourmet',
);

$account = $_GET['account'];

$url = $_GET['url'];

$host = parse_url($url);
$host = $host['host'];

$referrer = $_GET['referrer'];

$parsed = parse_url($referrer, PHP_URL_QUERY);
parse_str($parsed, $p);
$keyword = '';
if(isset($p['q'])) {
	$keyword = $p['q'];
}
if(isset($p['p'])) {
	$keyword = $p['p'];
}

$ip = $_SERVER['REMOTE_ADDR'];
$remotehost = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$resulotion = $_GET['resolution'];
$title = $_GET['title'];

//if(!empty($referrer) && (in_array($account, $accounts))) {
if((in_array($account, $accounts))) {

	if(function_exists('geoip_record_by_name')) {
		$geo = geoip_record_by_name($ip);
		$country_code = $geo['country_code'];
		$region = $geo['region'];
		$city = $geo['city'];
	} else {
		include('geoipcity.inc');
		include('geoipregionvars.php');
		$geodb = geoip_open('GeoLiteCity.dat', GEOIP_MEMORY_CACHE);
		$geo = geoip_record_by_addr($geodb, $ip);
		$country_code = $geo->country_code;
		$region = $geo->region;
		$city = $geo->city;
	}

	require_once('../../Config/database.php');
	$db = get_class_vars('DATABASE_CONFIG');

	@mysql_connect($db['default']['host'], $db['default']['login'], $db['default']['password']) or die(mysql_error());
	@mysql_select_db($db['default']['database']) or die(mysql_error());

	$query = "INSERT INTO visitors SET
	host = '".mysql_real_escape_string($host)."',
	url = '".mysql_real_escape_string($url)."',
	referrer = '".mysql_real_escape_string($referrer)."',
	keyword = '".mysql_real_escape_string($keyword)."',
	ip = '".mysql_real_escape_string($ip)."',
	country_code = '".mysql_real_escape_string($country_code)."',
	region = '".mysql_real_escape_string($region)."',
	city = '".mysql_real_escape_string($city)."',
	remotehost = '".mysql_real_escape_string($remotehost)."',
	useragent = '".mysql_real_escape_string($useragent)."',
	created_date = '".date('Y-m-d')."',
	created = '".date('Y-m-d H:i:s')."'
	";

	@mysql_query($query);

	//mail('andras@kende.com', $ip, $query);
	//file_put_contents('track.txt', $query, FILE_APPEND | LOCK_EX);

}

header('Content-type: image/gif');
echo chr(71).chr(73).chr(70).chr(56).chr(57).chr(97).
chr(1).chr(0).chr(1).chr(0).chr(128).chr(0).
chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).
chr(33).chr(249).chr(4).chr(1).chr(0).chr(0).
chr(0).chr(0).chr(44).chr(0).chr(0).chr(0).chr(0).
chr(1).chr(0).chr(1).chr(0).chr(0).chr(2).chr(2).
chr(68).chr(1).chr(0).chr(59);

