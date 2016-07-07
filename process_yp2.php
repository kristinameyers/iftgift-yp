<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
	$Id = $_GET['Id'];
	$apikey = "s2d93hfqch"; 
	//$listingId='11071160';
	$endpoint = "http://api2.yp.com/listings/v1/details?listingid=$Id&format=json";
	 	$url = $endpoint . "&key=" . $apikey;
		
        $UserAgent = $_SERVER['HTTP_USER_AGENT'];
		$options  = array( 'http' => array( 'user_agent' => $UserAgent) );
		$context  = stream_context_create($options);
		$response2 = file_get_contents($url,false,$context);
		
	// ensure we actually got a response back 
	if (!$response2) 
	{
		throw new Exception("<br><br>Error calling API ($http_response_header[0])");
	}
	else
	{
		//echo  "results OK <br />";
	}
	$parsed_json2 = json_decode($response2);
	$searchListing = $parsed_json2->{'listingsDetailsResult'}->{'listingsDetails'}->{'listingDetail'};
	//echo '<pre>'; print_r($searchListing); exit;
	
	
	//echo $searchListing{0}->{'paymentMethods'};
	
	
	
	$message = '<table  width="100%" style="font-size:13px;border:1px solid #dddddd;margin-top: 50px">';
	$message .= '<tr  style="background:#2d6ab4;color#fff">';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Business Id</strong></th>';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Business Name</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">Payment Method</strong></th>';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Phone</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">City</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">Primary Category</strong></th>';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Open Hours</strong></th>';
    $message .=  '</tr>';
	
	$message .= '<tr style="border:1px solid #FFFF">';
	$message .= '<td style="padding:2px 5px 3px">'.$searchListing{0}->{'listingId'}.'</td>';
	 $message .=  '<td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'businessName'}.'</td>';
    $message .=  '<td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'paymentMethods'}.'</td>';
	$message .=  '<td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'phone'}.'</td>';
    $message .= '<td style="padding:2px 5px 3px">'.$searchListing{0}->{'city'}.'</td>';
    $message .= '<td style="padding:2px 5px 3px">'.$searchListing{0}->{'primaryCategory'}.'</td>';
	$message .= '<td style="padding:2px 5px 3px;word-break: break-all;">'.$searchListing{0}->{'openHours'}.'</td>';
    $message .=  '</tr>';
			//echo '<pre>'; print_r($parsed_json2)
		$message .= '</table>';
		echo $message;

 //exit;
 ?>

	

