<?php

require 'functions.php';

$has_restaurant = false;

$start_locations = get_from_zomato("location_details?entity_id=97948&entity_type=subzone");

// var_dump($start_locations);

$random_rest_key = array_rand($start_locations["nearby_res"]);

$random_rest_id = $start_locations["nearby_res"][$random_rest_key];

$restaurant_deets = get_from_zomato("restaurant?res_id=" . $random_rest_id);

if (!empty($restaurant_deets)){
	// echo '<pre>';
	// var_dump($restaurant_deets);

	$restaurant_name = trim(strip_tags($restaurant_deets["name"]));
	$restaurant_link = $restaurant_deets["url"];
	$restaurant_number = $restaurant_deets["phone_numbers"]; // May potentially have >1 number
	$restaurant_image = $restaurant_deets["featured_image"];
	$has_restaurant = true;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Randomato</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>
	<div class="container text-center">
		<br>
		<h1>Randomato</h1>
		<?php  

			if($has_restaurant){
		?>
			<a class="restaurant_link" href="<?php echo $restaurant_link; ?>" target="_blank">
				<h3 class="restaurant_name"><?php echo $restaurant_name; ?></h3>
				<img class="restaurant_image img-responsive" src="<?php echo $restaurant_image; ?>" alt="<?php echo $restaurant_name; ?>'s image"/>
			</a>
			<br>
			<a class="restaurant_number" href="tel: <?php echo $restaurant_number; ?>"><?php echo $restaurant_number; ?></a>
		<?php
			}else{
		?>
				<p class="alert alert-danger">
					Sorry, couldn't get you a restaurant :<
				</p>
		<?php
			}

		?>

	</div>	
	





	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>

