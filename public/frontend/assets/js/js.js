/**
* Author: LimpidThemes
* Version: 1.0
* Description: Javascript file for the theme
* Date: 20-07-2015
**/

/**********************************************************
		BEGIN: PRELOADER
**********************************************************/
$(window).load(function() {
	"use strict";
	$("#loader").fadeOut("slow");
});

/**********************************************************
		BEGIN: OWL CAROUSELS
**********************************************************/
jQuery(document).ready(function($) {
   "use strict";
    if(jQuery().owlCarousel) { 
		/* BLOG POST CAROUSEL */
		if (jQuery("#post-list").length){
			jQuery("#post-list").owlCarousel({
				loop:true,
				margin:30,
				responsiveClass:true,
				autoplay:false,
				autoplayTimeout:5000,
				navigation:false,
				stopOnHover:true,
				responsive:{
					0:{
						items:1,
						loop:true
					},
					600:{
						items:2,
						loop:true
					},
					1000:{
						items:4,
						loop:true
					}
				}
			});	
		}
		
		/* HOMEPAGE OFFER SLIDER */
		if (jQuery("#offer1").length){
			jQuery("#offer1").owlCarousel({
				loop:true,
				responsiveClass:true,
				autoplay:true,
				autoplayTimeout:5000,
				navigation:false,
				stopOnHover:true,
				responsive:{
					1000:{
						items:1,
						loop:true
					}
				}
			});	
		}
		
	
		
		/* ABOUT US PAGE PRTNERS SLIDER */
		if (jQuery("#partner").length){
			jQuery("#partner").owlCarousel({
				loop:true,
				margin:20,
				responsiveClass:true,
				autoplay:true,
				autoplayTimeout:5000,
				navigation:false,
				stopOnHover:true,
				responsive:{
					0:{
						items:1,
						loop:true
					},
					600:{
						items:2,
						loop:true
					},
					1000:{
						items:4,
						loop:true
					}
				}
			});	
		}
		
		/* LAST MINUTE DEALS SLIDER */
		
	
		if (jQuery("#review-customer").length){
			jQuery("#review-customer").owlCarousel({
				loop:true,
				margin: 10,
				responsiveClass:true,
				autoplay:true,
				autoplayTimeout:5000,
				navigation:false,
				stopOnHover:true,
				responsive:{
					0:{
						items:1,
						loop:true
					},
					600:{
						items:1,
						loop:true
					},
					1000:{
						items:1,
						loop:true
					}
				}
			});
		}
	}
});


/***************************************************************
		BEGIN: VARIOUS DATEPICKER & SPINNER INITIALIZATION
***************************************************************/
$(function() {
		"use strict";
		new WOW().init();
		$( "#departure_date" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#return_date" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#check_out" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#check_in" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#package_start" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#car_start" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#car_end" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#cruise_start" ).datepicker({ minDate: -0, maxDate: "+3M" });
		$( "#adult_count" ).spinner({
			min: 1
		});
		$( "#child_count" ).spinner( {
			min: 1
		});
		$( "#hotel_adult_count" ).spinner( {
			min: 1
		});
		$( "#hotel_child_count" ).spinner( {
			min: 1
		});
		$('.selectpicker').selectpicker({
			style: 'custom-select-button'
		});
});

/**********************************************************************
		BEGIN: STYLESHEET SWITCHER 
***********************************************************************/
$('#color-switcher ul li').on('click', function(){
	"use strict";	
    var path = $(this).data('path');
    $('#select-style').attr('href', path);
});

$('#stoggle').on('click', function(){
	"use strict";	
	var effect;
	var direction;
	var duration;
	effect = 'slide';
	duration = 400;
    $('#color-switcher').toggle(effect, duration);
});