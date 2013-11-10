<?php

$ip = $_SERVER['REMOTE_ADDR'];

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

print_r($geo);

die('end.');

