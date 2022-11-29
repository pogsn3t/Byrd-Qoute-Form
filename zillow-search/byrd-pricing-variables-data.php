<?php


class PricingVariables {
	
	public $token = 'vWZ-eX1rsPcj0EzY7nOk14HWOYflzgUR';
	public $sqft;
	
	/*
	function __construct($sqft = null) {
		$this->sqft = $sqft;
	}*/
	
	function get_price($sqft, $detached_garage, $home_height , $last_cleaned , $amount_of_guttering , 
					$gutter_guards, $coupon = '',$zip_code){
		
		if(!empty($coupon)){
			$coupon_value = $this->get_coupon($coupon);
		}
		
		$perimeter = sqrt($sqft)*4.62;
		$sum_of_home_details = (
					   $detached_garage +
					   $home_height +
					   $last_cleaned +
					   $amount_of_guttering +
					   $gutter_guards );
					   
		$market_multiplier = $this->get_market_multiplier($zip_code); 
		
		$price = (($perimeter + $sum_of_home_details ) * $market_multiplier) * $coupon_value;
		
		echo  round($price, 2);
	}
	
	function get_coupon($user_coupon) { 
		$curl = curl_init();
 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/coupons?filter[coupon][_eq]='.$user_coupon,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));
		 
		$response = curl_exec($curl); 
		curl_close($curl);
		$coupon = json_decode($response);
		
		if(!empty( $coupon->data))
			$coupon = $coupon->data[0];
		else return 1;
		
		if($coupon->status == 'Published'){
			return $coupon;
		}
		 else return 1;

	}
	
	function get_market_multiplier($zip_code) { 
		$curl = curl_init(); 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/market_region_data?filter[zip_code][_eq]='.$zip_code,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		 
		$market_multiplier = json_decode($response);
		 
		$market_multiplier = $market_multiplier->data[0]->market_multiplier;
		
		return $market_multiplier;

	}
	
	function get_height() { 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/pv_height',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}
	
	
	function get_amount_of_guttering() { 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/pv_amount_of_guttering',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}
	
	function get_detached_garage() { 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/pv_detached_garage',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}
	
	function get_gutter_guards() { 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/pv_gutter_guards',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}
	
	function get_last_cleaned() { 
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.byrdup.com/items/pv_last_cleaned',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$this->token
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;

	}

} 