<?php

require 'config.php';

$ch = curl_init("https://developers.zomato.com/api/v2.1/location_details?entity_id=97948&entity_type=subzone");

curl_setopt(
	$ch, 
	CURLOPT_HTTPHEADER, 
	array(
		'Accept: application/json',
		'user-key: ZOMATO_API_KEY'
	)
);

// Returns the transfer as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$data = curl_exec($ch);
curl_close($ch);

echo "<pre>";

$output = json_decode($data, true);

// var_dump($output);

$randomRest = array_rand($output["nearby_res"]);

echo $output["nearby_res"][$randomRest];

exit;

?>