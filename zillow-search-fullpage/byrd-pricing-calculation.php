<?php
include ('byrd-pricing-variables-data.php');
$pv = new PricingVariables();

$action = isset($_POST['action']) && ($_POST['action'] != '' )? $_POST['action']: '';


switch($action){
	case 'get_price': 
		$pv = new PricingVariables();
		
		$sqft = isset($_POST['sqft']) && ($_POST['sqft'] != '' )? $_POST['sqft']: '';
		$detached_garage = isset($_POST['detached_garage']) && ($_POST['detached_garage'] != '' )? $_POST['detached_garage']: '';
		$home_height = isset($_POST['home_height']) && ($_POST['home_height'] != '' )? $_POST['home_height']: '';
		$last_cleaned = isset($_POST['last_cleaned']) && ($_POST['last_cleaned'] != '' )? $_POST['last_cleaned']: '';
		$gutter_guards = isset($_POST['gutter_guards']) && ($_POST['gutter_guards'] != '' )? $_POST['gutter_guards']: '';
		$coupon = isset($_POST['coupon']) && ($_POST['coupon'] != '' )? $_POST['coupon']: 1;
		$zip_code = isset($_POST['zip_code']) && ($_POST['zip_code'] != '' )? $_POST['zip_code']: '';
		
		
		$price = $pv->get_price($sqft, $detached_garage, $home_height , $last_cleaned , $last_cleaned , 
					$gutter_guards, $coupon,$zip_code);
		
		return $price;
	break;
	
}

