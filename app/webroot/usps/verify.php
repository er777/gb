<?php

require('usps_address_class.php');
$uspsRequest = new usps(); //class instantiation
$uspsRequest->address1 = '';
$uspsRequest->address2 = '2454 Wilshire Blvd';
$uspsRequest->city = 'Santa Monica';
$uspsRequest->state = 'CA';
$uspsRequest->zip = '90403';
/*
//optional second address
$uspsRequest->ship_address1 = '';
$uspsRequest->ship_address2 = '';
$uspsRequest->ship_city = '';
$uspsRequest->ship_state = '';
$uspsRequest->ship_zip = '';
*/

$result = $uspsRequest->submit_request();

print_r($result);

$result = $uspsRequest->submit_request2();

print_r($result);

// if (!empty($result)){
// 	$xml = new SimpleXMLElement($result);
// 	print_r($xml);
// } else {
// 	die;
// }

// if(isset($xml->Address[0]->Error)) { echo ' Error Address 1';}
// if(isset($xml->Address[1]->Error)) { echo ' Error Address 2';}

// echo $xml->Address[0]->Address2 . ' ' . $xml->Address[0]->Address1 ;
// echo '<br />';
// echo $xml->Address[0]->City. ' ' . $xml->Address[0]->State  . ' ' . $xml->Address[0]->Zip5;
// echo '<br />';
// echo $xml->Address[1]->Address2 . ' ' . $xml->Address[1]->Address1 ;
// echo '<br />';
// echo $xml->Address[1]->City. ' ' . $xml->Address[1]->State  . ' ' . $xml->Address[1]->Zip5;
