<?php

require 'functions.php';

$start_locations = get_from_zomato("location_details?entity_id=97948&entity_type=subzone");

// var_dump($start_locations);

$random_rest_key = array_rand($start_locations["nearby_res"]);

$random_rest_id = $start_locations["nearby_res"][$random_rest_key];

$restaurant_deets = get_from_zomato("restaurant?res_id=" . $random_rest_id);

if (!empty($restaurant_deets)){
	// echo '<pre>';
	// var_dump($restaurant_deets);

	$restaurant_name = $restaurant_deets["name"];
	$restaurant_link = $restaurant_deets["url"];
	$restaurant_number = $restaurant_deets["phone_numbers"]; // May potentially have >1 number
	$restaurant_image = $restaurant_deets["featured_image"];
}

exit;

?>