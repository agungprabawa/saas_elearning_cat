(function ($) {

	"use strict";

	// Preload
	$(window).on('load', function () { // makes sure the whole site is loaded
		$('[data-loader="circle-side"]').fadeOut(); // will first fade out the loading animation
		$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(350);
		$('.left_title').addClass('start_animation');
		$('#sub_content_in').addClass('start_animation');
	})

	// Submit loader mask
	$('form#wrapped').on('submit', function () {
		var form = $("form#wrapped");
		form.validate();
		if (form.valid()) {
			$("#loader_form").fadeIn();
		}
	});

	// Jquery select
	$("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true
            });
        });

	// Jquery select 2
	$('.styled-select select').niceSelect();

	// Tooltip
	$('.tooltip-1').tooltip({html:true});

    // Carousel
    $(".carousel_pic").owlCarousel({
			animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
			items: 1,
			loop: false,
			margin: 10,
			autoplay: false,
			smartSpeed: 300,
			responsiveClass: false
		});

	// Menu
	var overlayNav = $('.cd-overlay-nav'),
		overlayContent = $('.cd-overlay-content'),
		navigation = $('.cd-primary-nav'),
		toggleNav = $('.cd-nav-trigger');

	//inizialize navigation and content layers
	layerInit();
	$(window).on('resize', function(){
		window.requestAnimationFrame(layerInit);
	});

	//open/close the menu and cover layers
	toggleNav.on('click', function(){
		if(!toggleNav.hasClass('close-nav')) {
			//it means navigation is not visible yet - open it and animate navigation layer
			toggleNav.addClass('close-nav');

			overlayNav.children('span').velocity({
				translateZ: 0,
				scaleX: 1,
				scaleY: 1,
			}, 500, 'easeInCubic', function(){
				navigation.addClass('fade-in');
			});
		} else {
			//navigation is open - close it and remove navigation layer
			toggleNav.removeClass('close-nav');

			overlayContent.children('span').velocity({
				translateZ: 0,
				scaleX: 1,
				scaleY: 1,
			}, 500, 'easeInCubic', function(){
				navigation.removeClass('fade-in');

				overlayNav.children('span').velocity({
					translateZ: 0,
					scaleX: 0,
					scaleY: 0,
				}, 0);

				overlayContent.addClass('is-hidden').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					overlayContent.children('span').velocity({
						translateZ: 0,
						scaleX: 0,
						scaleY: 0,
					}, 0, function(){overlayContent.removeClass('is-hidden')});
				});
				if($('html').hasClass('no-csstransitions')) {
					overlayContent.children('span').velocity({
						translateZ: 0,
						scaleX: 0,
						scaleY: 0,
					}, 0, function(){overlayContent.removeClass('is-hidden')});
				}
			});
		}
	});

	function layerInit(){
		var diameterValue = (Math.sqrt( Math.pow($(window).height(), 2) + Math.pow($(window).width(), 2))*2);
		overlayNav.children('span').velocity({
			scaleX: 0,
			scaleY: 0,
			translateZ: 0,
		}, 50).velocity({
			height : diameterValue+'px',
			width : diameterValue+'px',
			top : -(diameterValue/2)+'px',
			left : -(diameterValue/2)+'px',
		}, 0);

		overlayContent.children('span').velocity({
			scaleX: 0,
			scaleY: 0,
			translateZ: 0,
		}, 50).velocity({
			height : diameterValue+'px',
			width : diameterValue+'px',
			top : -(diameterValue/2)+'px',
			left : -(diameterValue/2)+'px',
		}, 0);
	}

})(window.jQuery);

// QUANTITY INPUT  ===============================================================================
// This button will increment the value
$('.qtyplus').on('click',function (e) {
	// Stop acting like a button
	e.preventDefault();
	// Get the field name
	fieldName = $(this).attr('name');
	// Get its current value
	var currentVal = parseInt($('input[name=' + fieldName + ']').val());
	// If is not undefined
    // alert($('input[name=' + fieldName + ']').val());
	if (!isNaN(currentVal)) {
		// Increment

		$('input[name=' + fieldName + ']').val((currentVal + 50));
	} else {
		// Otherwise put a 0 there
		$('input[name=' + fieldName + ']').val(0);
	}
});
// This button will decrement the value till 0
$(".qtyminus").on('click',function (e) {
	// Stop acting like a button
	e.preventDefault();
	// Get the field name
	fieldName = $(this).attr('name');
	// Get its current value
	var currentVal = parseInt($('input[name=' + fieldName + ']').val());
	// If it isn't undefined or its greater than 0
	if (!isNaN(currentVal) && currentVal > 0) {
		// Decrement one
		$('input[name=' + fieldName + ']').val((currentVal - 50));
	} else {
		// Otherwise put a 0 there
		$('input[name=' + fieldName + ']').val(0);
	}
});

$('.qtyplus1').on('click',function (e) {
	// Stop acting like a button
	e.preventDefault();
	// Get the field name
	fieldName = $(this).attr('name');
	// Get its current value
	var currentVal = parseInt($('input[name=' + fieldName + ']').val());
	// If is not undefined
	if (!isNaN(currentVal)) {
		// Increment
		$('input[name=' + fieldName + ']').val((currentVal + 1));
	} else {
		// Otherwise put a 0 there
		$('input[name=' + fieldName + ']').val(1);
	}
});
// This button will decrement the value till 0
$(".qtyminus1").on('click',function (e) {
	// Stop acting like a button
	e.preventDefault();
	// Get the field name
	fieldName = $(this).attr('name');
	// Get its current value
	var currentVal = parseInt($('input[name=' + fieldName + ']').val());
	// If it isn't undefined or its greater than 0
	if (!isNaN(currentVal) && currentVal > 1) {
		// Decrement one
		$('input[name=' + fieldName + ']').val((currentVal - 1));
	} else {
		// Otherwise put a 0 there
		$('input[name=' + fieldName + ']').val(1);
	}
});
