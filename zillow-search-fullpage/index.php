<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
<link rel="stylesheet"   href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.input-icons i {
		position: absolute; 
		color:red;
		display:none;
		right: 0;
	}
		
	.input-icons {
		width: 100%;
		margin-bottom: 10px;
	}
		
	.icon {
		padding: 10px 20px;
		min-width: 40px;
	} 
</style>


<script type="text/javascript" src="map.js?v=1.2"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script type="text/javascript" src="zillow-search-script.js?v=1.255"></script>
 
<?php
	include ('byrd-pricing-variables-data.php');
	$pv = new PricingVariables();
	  
?>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYBQ2DBj5MH53Rs2JP8mdOEtuBZlX85F8&libraries=places&callback=initAutocomplete"></script>

<div class="container alert" style="color:red;">
 
</div>


<div class="row">
  <div class="col-lg-12">
     

<form id="qoute" action="#" method="post" name="qoute">

<div class="container steps" id="step1" style="display:block !important"> 

	<div class="row mb-3">
		<div class="col-6 input-icons"> 
			<i class="fa fa-warning icon fname"></i>
			<input  class="form-control step1" type="text" name="fname" id="fname" placeholder="First Name" required />
			 
		</div>
		<div class="col-6 input-icons ">
			<i class="fa fa-warning icon lname"></i>
			<input class="form-control step1" type="text" name="lname" id="lname" placeholder="Last Name" required /> 
		</div>
	</div> 

	<div class="row mb-3">
		<div class="col-6 input-icons">
		<i class="fa fa-warning icon phone"></i>
			<input class="form-control step1"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" type="text" name="phone"  id="phone" placeholder="Phone" required />	
			 
		</div>
		<div class="col-6 input-icons"">
			<i class="fa fa-warning icon email"></i>
			<input  class="form-control step1" type="text" name="email"  id="email" placeholder="Email" required />
			 
		</div>
	</div> 

	<div class="row mb-3">
	  	<div class="col-12 input-icons">
		  	<i class="fa fa-warning icon searchmap"></i>
			<input type="text" id="searchmap"  class="form-control step1" placeholder="Search address"/> 
		</div> 
	</div>

	 

	<input type="hidden" name="zip"   id="zip" > 
	<input type="hidden" name="city"   id="city" >
	<input type="hidden" name="address"   id="address">
	<input type="hidden" name="state"   id="state">


	<!-- <div class="row mb-3"  > 
		<div class="col-3">
			<input class="form-control step1" type="text" name="street"  id="street" placeholder="Street" required /> 
			<span class="error"  data-id="street">Please add correct value here!</span>
		</div>
		<div class="col-3">
			<input class="form-control step1" type="text" name="city"  id="city" placeholder="City" required />
			<span class="error"  data-id="city">Please add correct value here!</span>
		</div>
		<div class="col-3">
			<select class="form-control step1" id="state" name="state"required >
				<option >Select State</option>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AS">American Samoa</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="UM-81">Baker Island</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="GU">Guam</option>
				<option value="HI">Hawaii</option>
				<option value="UM-84">Howland Island</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="UM-86">Jarvis Island</option>
				<option value="UM-67">Johnston Atoll</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="UM-89">Kingman Reef</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="UM-71">Midway Atoll</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="UM-76">Navassa Island</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="UM-95">Palmyra Atoll</option>
				<option value="PA">Pennsylvania</option>
				<option value="PR">Puerto Rico</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UM">United States Minor Outlying Islands</option>
				<option value="VI">United States Virgin Islands</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="UM-79">Wake Island</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
			<span class="error"  data-id="state">Please add correct value here!</span>
		</div> 
		  <div class="col-3">
			<input type="text" name="zip"  id="zip" class="form-control step1" placeholder="Zip Code" required />
			<span class="error"  data-id="zip">Please add correct value here!</span>
		</div>  
	</div> -->

	 
</div>

<div class="container steps" id="step2">
	
	<div class="row mb-3">
		<div class="col-6">
			Total Sqft Of Home *
			<input type="text"  name="sqft" id="sqft" class="form-control" 
				placeholder="Total Sqft Of Home " required />  
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-6">	
			Height of Home *
			<select name="height" id="height" required class="form-control" >  
				<option value=""> </option>
				<?php
					$height = json_decode($pv->get_height());
					$height = $height->data;
					foreach($height as $h){
						echo '<option value="'.$h->hval.'">'.$h->height.'</option>';
					}
					
				?> 
			</select>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-6">	
			Do You Have Gutter Guards? *
			<select name="guard" id="guard" class="form-control">
				<option value=""> </option>
				<?php
					$get_gutter_guards = json_decode($pv->get_gutter_guards());
					$get_gutter_guards = $get_gutter_guards->data;
					
					foreach($get_gutter_guards as $gg){
						echo '<option value="'.$gg->ggval.'">'.$gg->gutter_guards.'</option>';
					}
					
				?> 
			</select>
		</div>
	</div>
	
	<div class="row mb-3">
		<div class="col-6">	
			Amount of Guttering *
			<select  name="amt" id="amt"  class="form-control">
				<option value=""> </option>
				<?php
					$get_amount_of_guttering = json_decode($pv->get_amount_of_guttering());
					$get_amount_of_guttering = $get_amount_of_guttering->data;
					
					foreach($get_amount_of_guttering as $ag){
						echo '<option value="'.$ag->agval.'">'.$ag->gutter_guards.'</option>';
					}
					
				?> 
			</select>
		</div>
	</div> 

	<div class="row mb-3">
		<div class="col-6">	
			Last Time Your Gutters Were Cleaned *
			<select  name="lasttime" id="lasttime" class="form-control" >
			<option value=""> </option>
				<?php
					$get_last_cleaned = json_decode($pv->get_last_cleaned());
					$get_last_cleaned = $get_last_cleaned->data;
					
					foreach($get_last_cleaned as $lc){
						echo '<option value="'.$lc->lcval.'">'.$lc->last_cleaned.'</option>';
					}
					
				?> 
			</select>
		</div>
	</div> 

	<div class="row mb-3">
		<div class="col-6">
			Detached Garage with Gutters? *
			<select   name="detached" id="detached" class="form-control" >
			<option value=""> </option>
				<?php
					$get_detached_garage = json_decode($pv->get_detached_garage());
					$get_detached_garage = $get_detached_garage->data;
					
					foreach($get_detached_garage as $dg){
						echo '<option value="'.$dg->dgval.'">'.$dg->detached_garage.'</option>';
					}
					
				?> 
			</select>
		</div>
	</div> 

	<div class="row mb-3">
		<div class="col-6">
			<input type="text" name="coupon" id="coupon" class="form-control" placeholder="Coupon" /> 
		</div>
	</div> 

	 
	   
</div>

<div class="container steps" id="step3">

	<div class="row mb-3" style="display:none;">
		<div class="col">
			<p style="color:red;font-weight:bold">Estimated Price $<span id="estPrice"></span></p>
		</div>		
	</div>	
	
	<div class="row mb-3">
		<div class="col">
			When Are You Wanting Service *

				<select   name="servicetime" id="servicetime"  class="form-control">
					<option value="" selected="selected"> </option>
					<option value="Asap"> Asap	 </option>
					<option value="Within One Week"> Within One Week </option>
					<option value="Within Two Weeks"> Within Two Weeks </option>
					<option value="Within A Month"> Within A Month </option>
					<option value="Just Getting Prices"> Just Getting Prices </option>
				</select>
		</div>		
	</div>	 
		
	<div class="row mb-3">
		<div class="col">
			 How Did You Hear About Us? *
			 <select   name="referred" id="referred"  class="form-control">
				<option value="" selected="selected"> </option>
				<option value="Received Mailer"> Received Mailer </option>
				<option value="Received Email"> Received Email </option>
				<option value="Google"> Google	 </option>
				<option value="Bing"> Bing	 </option>
				<option value="Yahoo"> Yahoo </option>
				<option value="Facebook"> Facebook </option>
				<option value="Repeat Customer"> Repeat Customer </option>
				<option value="Friend"> Friend	 </option>
				<option value="Other"> Other </option>
			</select>
		</div>		
	</div>	

	<div class="row mb-3">
		<div class="col">
			Anything Else You Would Like For Us To Know?
			<textarea  class="form-control" name="item_meta[1544]" id="field_jqjizp42c97615c02" rows="5" data-sectionid="1540" data-invmsg="Anything Else You Would Like For Us To Know? is invalid" aria-invalid="false" spellcheck="false"></textarea>
		</div>		
	</div>	
	<div class="row mb-3">
		<div class="col"> 
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<div class="g-recaptcha" data-sitekey="6LeLJuciAAAAAEHxmvnru-lIVKqhCBcba3M-bw8x" ></div>		
		</div>
	</div>
	<div class="row mb-3">
		<div class="col"> 
			 <input type="button"  id="submit" class="btn btn-primary" value="Submit" /> 
		</div>
	</div> 


</form>
<style>
	 
	input.error{
		border:1px solid red;
	}
	span.error{
		font-size: 13px;
		color: red;
		display: none;
	}
	.badge{
		font-weight:400;
	}
	.btn-secondary{
		color: white !important;
		font-size: 14px;
		margin-top: 20px;
	} 
	.suggested_address{
		background: #e7e7e7;
    	padding: 20px;
	}
	 
</style>