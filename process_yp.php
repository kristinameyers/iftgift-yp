<?php
error_reporting(0);
ini_set('display_errors', true);
if ($_POST){ 
	$country    = $_POST['country'];
	$cat    = $_POST['cat'];
	$cats=str_replace(' ','+',$cat); 
	 $countries=str_replace(' ','+',$country); 
	$city   	= $_POST['city'];
	$cites=str_replace(' ','+',$city);
	
	$apikey = "s2d93hfqch"; 
	$endpoint = "http://api2.yp.com/listings/v1/search?searchloc=$cites+$countries&term=$cats&format=json&sort=distance&radius=5&listingcount=20";
	$url = $endpoint . "&key=" . $apikey;
	
	$UserAgent = $_SERVER['HTTP_USER_AGENT'];
	$options  = array( 'http' => array( 'user_agent' => $UserAgent) );
	$context  = stream_context_create($options);
	$response = file_get_contents($url,false,$context);
	// ensure we actually got a response back 
	if (!$response) 
	{
		throw new Exception("<br><br>Error calling API ($http_response_header[0])");
	}
	else
	{
		//echo  "results OK <br />";
	}
	$parsed_json = json_decode($response);
	//echo '<pre>'; print_r($parsed_json); 
	$searchListing = $parsed_json->{'searchResult'}->{'searchListings'}->{'searchListing'};
	$i=1;
	$message = '<table  width="100%" style="font-size:13px;border:1px solid #dddddd;margin-top: 50px">';
	$message .= '<tr  style="background:#2d6ab4;color#fff">';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Business Id</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">Business Name</strong></th>';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Categories</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">City</strong></th>';
    $message .= '<th style="padding:5px"><strong style="color:#fff">Primary Category</strong></th>';
	$message .= '<th style="padding:5px"><strong style="color:#fff">Business Name Url</strong></th>';
    $message .=  '</tr>';
	if($searchListing){
		foreach($searchListing as $listing){
		if($i < 20){
	$message .= '<tr style="border:1px solid #FFFF">';
	$message .= '<td style="padding:2px 5px 3px"><a href="detail_yp.php?Id='.$listing->{'listingId'}.'" id="listid" target="_blank" >'.$listing->{'listingId'}.'</a></td>';
    $message .=  '<td style="padding:2px 5px 3px;">'.$listing->{'businessName'}.'</td>';
	$message .=  '<td style="padding:2px 5px 3px;word-break: break-all;">'.$listing->{'categories'}.'</td>';
    $message .= '<td style="padding:2px 5px 3px">'.$listing->{'city'}.'</td>';
    $message .= '<td style="padding:2px 5px 3px">'.$listing->{'primaryCategory'}.'</td>';
	$message .= '<td style="padding:2px 5px 3px;word-break: break-all;">'.$listing->{'businessNameURL'}.'</td>';
    $message .=  '</tr>';
			//echo '<pre>'; print_r($parsed_json2);
			}
		$i++;
		}
		$message .= '</table>';
		echo $message;
		}else{ echo "No Record Found "; }
	}
//cho '<pre>'; print_r($parsed_json);
 //exit;
 ?>

	

