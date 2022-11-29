 
$(document).ready(function() { 
   
	  
	var fname,lname, phone, email , street, city, state, zip, sqft, height, guard,
	amt, lasttime, detached, suggestedAddress; 

	$('input').keyup(delay(function (e) {
		var id = $(this).attr('id'); 
		var flag = true;
		
		switch(id){
			case 'phone':
				$(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2-$3"));
				var pattern = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

				if(!pattern.test($(this).val())){
					flag = false;  
				} else flag = true;
			break;
			case 'email':
				 
				var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

				if(!pattern.test($(this).val())){
					flag = false;
				}else flag = true;

			break;

			default:

				if($(this).val() == ''){
					flag = false;
				}else flag = true;

			break;
		}

		if(!flag){  
			$(this).effect( "shake",{times:1}, 1000 );
			$(this).css({"border-color":"red"}); 
			$('.input-icons i.'+id).show();
		}else{
			$(this).css({"border-color":"#ced4da"});
			$('.input-icons i.'+id).hide();
		}
		

	  }, 1000)); 
 
	 

   if ($.ui) {
		(function () {
			var oldEffect = $.fn.effect;
			$.fn.effect = function (effectName) {
				if (effectName === "shake") {
					var old = $.effects.createWrapper;
					$.effects.createWrapper = function (element) {
						var result;
						var oldCSS = $.fn.css;

						$.fn.css = function (size) {
							var _element = this;
							var hasOwn = Object.prototype.hasOwnProperty;
							return _element === element && hasOwn.call(size, "width") && hasOwn.call(size, "height") && _element || oldCSS.apply(this, arguments);
						};

						result = old.apply(this, arguments);

						$.fn.css = oldCSS;
						return result;
					};
				}
				return oldEffect.apply(this, arguments);
			};
		})();
	}

	searchmap =$('#searchmap');

    $( "#suggested_address_btn" ).click(function( event ) {
		searchmap.val($('span.valid_add').text());
		$('.invalidAddressInfo').hide();
		$('.suggested_address').hide();
	});
    
	$( "#locsearch" ).click(function( event ) {
	   event.preventDefault();
	   
	  //2510 Eagle Run Benton, AR 72015

	   fname = $('#fname');
	   lname = $('#lname') ;
	   phone = $('#phone') ;
	   email = $('#email') ;
	   address = $('#address') ;
	   city = $('#city') ;
	   state = $('#state') ;
	   zip = $('#zip') ; 
	    
	    if(fname.val() === ''  || lname.val() === ''  || phone.val() === ''  || email.val() === ''  ){
			 
			$('.step1').filter(':input').each(function(){ 
				var id = $(this).attr('id');
				

				if($(this).val() === '' ) {    
					$(this).effect( "shake" ,{times:1}, 1000 );
					$(this).css({"border-color":"red"});
 
					
					$('.input-icons i.'+id).show();
					$('.input-icons i.'+id).effect( "shake" ,{times:1}, 1000 );
				} else{

					if($(this).val() !== '' ) {  
						$(this).css({"border-color":"#ced4da"});
						$('.input-icons i.'+id).hide();
					} 
				}
			});

	   }else if(zip.val() === ''  || address.val() === ''  ){
			
			searchmap.effect( "shake" ,{times:1}, 1000 );
			searchmap.css({"border-color":"red"});
			$('.invalidAddressInfo').show();

		}else{	  

		//var location = street + " " + city + " " + state + " " + zip;
			$('input').css({"border-color":"#ced4da"});
			$('.invalidAddressInfo').hide();

           $.ajax({
 
               type: "POST", 
			   dataType: "json",
               url: "zillow-search-process.php",  
               data: { 
                   'action': 'checkValidityofAddress',
				   'address': address.val(),
				   'locality': city.val(),
				   'map' :searchmap.val()
                }, 
               success: function(result) {
					 
					//suggestedAddress = result;
					//var formattedSuAddress = result['result']['address']['formattedAddress'];
					 
					/*if(!result['valid'] ){
						$('span.valid_add').text(result['valid_address']);
						$('.invalidAddressInfo').show();
						$('.suggested_address').show();
					}else{*/
						var livingArea;
					
						if(result.hasOwnProperty('results')){ 
							livingArea = result.results[0].livingArea;
							
						}else{
							livingArea =  result.livingArea;
						}
						$('#sqft').val(livingArea);
						$('.alert').html('');
						$("#step1").hide();
						$("#step2").show();
					//}
  
					 // show if invalid address
					 	// .invalidAddressInfo, .suggested_address
               }}); 
	    }
   });

  
   
   $("#step2 input#next").click(function(event){

		
		sqft = $('#sqft');
		detached = $('#detached');
		height = $('#height');
		lasttime = $('#lasttime');
		amt = $('#amt');
		guard = $('#guard');
		coupon = $('#coupon'); 
		zip = $('#zip');
	 
		if(sqft.val() === ''  || detached.val() === ''  || height.val() === ''  || lasttime.val() === ''  
		|| guard.val() === ''   || zip.val() === ''  ){
			var id = $(this).attr('id');
			 
			if(sqft.val() === '' ) {
				$('span.error[data-id="sqft"]').show();
				sqft.effect( "shake",{times:1}, 1000  );
				sqft.css({"border-color":"red"});
			}
			if(detached.val() === '' ) {
				$('span.error[data-id="detached"]').show();
				detached.effect( "shake" ,{times:1}, 1000);
				detached.css({"border-color":"red"});
			}
			if(height.val() === '' ){
				$('span.error[data-id="height"]').show();
				height.effect( "shake",{times:1}, 1000 );
				height.css({"border-color":"red"});
			}
			if(lasttime.val() === '' ) {
				$('span.error[data-id="lasttime"]').show();
				lasttime.effect( "shake",{times:1}, 1000 );
				lasttime.css({"border-color":"red"});
			}
			if(guard.val() === '' ) {
				$('span.error[data-id="guard"]').show();
				guard.effect( "shake",{times:1}, 1000 );
				guard.css({"border-color":"red"});
			}
			if(amt.val() === '' ){
				$('span.error[data-id="amt"]').show();
				amt.effect( "shake" ,{times:1}, 1000);
				amt.css({"border-color":"red"});
			}
		    

	   }else{	 

			event.preventDefault();
			$.ajax({ 
				type: "POST",  
				url: "byrd-pricing-calculation.php",  
				data: { 
					'action': 'get_price',
					'sqft': $('#sqft').val(),
					'detached_garage': $('#detached').val(),
					'home_height': $('#height').val(),
					'last_cleaned': $('#lasttime').val(),
					'gutter_guards': $('#guard').val(),
					'coupon': $('#coupon').val(),
					'zip_code': $('#zip').val()
				},
				dataType: "json",

				success: function(result) {
					$('#estPrice').text(result); 
					$("#step2").hide();
					$("#step3").show();
				}

			});
		}
 
   });


    $("#prev2").click(function(event){
		$("#step2").show();
		$("#step3").hide();
	});
	$("#prev1").click(function(event){
		$("#step1").show();
		$("#step2").hide();
	});
	$("#prev0").click(function(event){ 
		$("#step0").slideDown(); 
		$("#step1").hide();
	});



});

function delay(callback, ms) {
	var timer = 0;
	return function() {
	  var context = this, args = arguments;
	  clearTimeout(timer);
	  timer = setTimeout(function () {
		callback.apply(context, args);
	  }, ms || 0);
	};
  }
  
   