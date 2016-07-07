<!DOCTYPE html> <html>
	<head>
		<title> Yellow Pages Api Business Detail </title>
	</head>
<body>
<?php
error_reporting(0);
ini_set('display_errors', true);
	$Id = $_GET['Id'];
	$apikey = "s2d93hfqch"; 
	$endpoint = "http://api2.yp.com/listings/v1/details?listingid=$Id&format=json";
	$url = $endpoint . "&key=" . $apikey;
		
	$UserAgent = $_SERVER['HTTP_USER_AGENT'];
	$options  = array( 'http' => array( 'user_agent' => $UserAgent) );
	$context  = stream_context_create($options);
	$response2 = file_get_contents($url,false,$context);
	$parsed_json2 = json_decode($response2);
	$searchListing = $parsed_json2->{'listingsDetailsResult'}->{'listingsDetails'}->{'listingDetail'};
	//echo '<pre>'; print_r($searchListing); exit;
	//echo $searchListing{0}->{'paymentMethods'};
	$message = '<table  width="80%" style="font-size:13px;border:1px solid #dddddd;margin-top: 50px;margin-left: 150px;">';
	$message .= '<tr  style="background:#CC0E0E;color:white;text-align:center;line-height: 2em;font-size:16px"><td colspan="2" tyle="padding:5px;background:#2d6ab4;width:15%;text-align:center;color:white;"><strong> Business Detail </strong></td> </tr>';
	$message .= '<tr style="border:1px solid #FFFF;"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Business Id</strong></td><td style="padding:2px 5px 3px">'.$searchListing{0}->{'listingId'}.'</td></tr>';
	$message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Business Name</strong></td><td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'businessName'}.'</td></tr>';
    $message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Payment Method</strong></td><td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'paymentMethods'}.'</td></tr>';
	$message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Phone</strong></td><td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'phone'}.'</td></tr>';
    $message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">City</strong></td><td style="padding:2px 5px 3px">'.$searchListing{0}->{'city'}.'</td></tr>';
    $message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Primary Category</strong></td><td style="padding:2px 5px 3px">'.$searchListing{0}->{'primaryCategory'}.'</td></tr>';
	$message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Open Hours</strong></td><td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'openHours'}.'</td>';
	$message .= '<tr style="border:1px solid #FFFF"><td style="padding:5px;background:#2d6ab4;width:15%;text-align:left;color:white"><strong style="color#fff">Address</strong></td><td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'state'}.' , '.$searchListing{0}->{'street'}.'</td>';
    $message .= '</tr>';
			//echo '<pre>'; print_r($parsed_json2)
		$message .= '</table>';
		echo $message;
 ?>
</body>
</html>

