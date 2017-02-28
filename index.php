<?php

echo "Run, Randomato!\n";

$ch = curl_init("https://developers.zomato.com/api/v2.1/categories");

curl_setopt(
	$ch, 
	CURLOPT_HTTPHEADER, 
	array(
		'Accept: application/json',
		'user-key: 108a557d32aaa2ffe51444df48fbe052'
	)
);

$data = curl_exec($ch);

curl_close($ch);

$output = json_decode($data);
echo "<pre>";

print_r($output);

exit;

?>