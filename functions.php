<?php
require 'config.php';

function get_from_zomato($endpoint){

	$ch = curl_init("https://developers.zomato.com/api/v2.1/" . $endpoint);

	curl_setopt(
		$ch, 
		CURLOPT_HTTPHEADER, 
		array(
			'Accept: application/json',
			'user-key: ' . ZOMATO_API_KEY
		)
	);

	// Returns the transfer as a string instead of outputting it directly
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	$data = curl_exec($ch);
	curl_close($ch);

	$output = json_decode($data, true);

	if(!empty($output)){
		return $output;
	}
	
	return false;

}

?>