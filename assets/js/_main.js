/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
	// All pages
	common: {
		init: function() {
		// JavaScript to be fired on all pages
		}
	},
	// Home page
	home: {
		init: function() {
			var height  = $(window).height(),
				width   = $(window).width();

			if(width > 767) {
				$('#intro').css({ height: height - 66 });
			}

			$('#compass').click(function(){
				$('#map-navigation').fadeToggle();
			});

			function initGridrotator() {
				$( '#ri-grid' ).gridrotator( {
					rows    : 1,
					columns : 4,
					w240 : {
						rows    : 1,
						columns : 1
					},
					w320 : {
						rows    : 1,
						columns : 1
					},
					w480 : {
						rows    : 1,
						columns : 1
					},
					w600 : {
						rows    : 1,
						columns : 2
					},
					w768 : {
						rows    : 1,
						columns : 4
					},
					w1024 : {
						rows    : 1,
						columns : 4
					},
					step: 4,
					animType: 'fadeInOut',
					animSpeed: 500,
					interval: 3000

				});
			}

			initGridrotator();


			// About slider
			var owlAbout = $("#about-slider");

			owlAbout.owlCarousel({
				itemsCustom : [
					[0, 1],
					[768, 1]
				],
				autoHeight : true
			});


			// Amenities slider
			var owlAmenities = $("#amenities-slider");

			$('#amenities-slider .hoverbox').mouseleave(function() {
				$('#amenities-slider .hoverbox .hover-content').animate({
					scrollTop: 0
				}, 'slow');
			});

			owlAmenities.owlCarousel({
				itemsCustom : [
					[0, 1],
					[768, 2],
					[1170, 2]
				],
				//navigation : true,
				//navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				rewindNav: false,
				autoHeight : true
			});

			$("#next-amenity").click(function(){
				owlAmenities.trigger('owl.next');
			});

			$("#prev-amenity").click(function(){
				owlAmenities.trigger('owl.prev');
			});


			// Properties slider
			var owlProperties = $("#properties-slider");

			owlProperties.owlCarousel({
				itemsCustom : [
					[0, 1],
					[768, 2],
					[1170, 2]
				],
				navigation : true,
				navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				rewindNav: false,
				autoHeight : true
			});

			$('#properties-all').click(function(){
				$(this).find('button').addClass('active');
				$('#properties-available button').removeClass('active');
				$('#properties-slider').fadeIn();
				$('#available-properties-slider').hide();
			});

			$('#properties-available').click(function(){
				$(this).find('button').addClass('active');
				$('#properties-all button').removeClass('active');
				$('#properties-slider').hide();
				$('#available-properties-slider').fadeIn();

				var owlPropertiesAvailable = $("#available-properties-slider");

				owlPropertiesAvailable.owlCarousel({
					itemsCustom : [
						[0, 1],
						[768, 2],
						[1170, 2]
					],
					navigation : true,
					navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
					rewindNav: false,
					autoHeight : true
				});
			});


			$('#map-1-button').click(function(){
				$(this).find('button').addClass('active');
				$('#map-2-button button').removeClass('active');
				$('#map-1').fadeIn();
				$('#map-2').hide();
			});

			$('#map-2-button').click(function(){
				$(this).find('button').addClass('active');
				$('#map-1-button button').removeClass('active');
				$('#map-2').fadeIn();
				$('#map-1').hide();
			});

			// Show Maps
			// Category
			function showCategory() {
				var sideNav     = $('#map-navigation'),
					link        = sideNav.find('ul li');

				link.mouseover(function(){
					target = $(this).attr('class');
					$('.item-attraction').not(target).removeClass('hover');
					$('.item-attraction[ data-target=' + target + ']' ).addClass('hover');
				});

				$('html').click(function() {
					$('.item-attraction').removeClass('hover');
				});

				$('#map-navigation, #compass').click(function(event){
					event.stopPropagation();
				});

				link.mouseout(function(){
					$('.item-attraction, .item-attraction').removeClass('hover');
				});

				link.click(function(e){
					e.preventDefault();

					target = $(this).attr('class');

					if($(this).hasClass('active')) {
						$(this).removeClass('active');
						$('.item-attraction, .item-attraction div').removeClass('active');
					} else {
						$('.item-attraction, .item-attraction div').removeClass('active');
						$('.item-attraction[ data-target=' + target + '], .item-attraction div').addClass('active');
						$(target).addClass('active');
						$(this).addClass('active');
						link.not(this).removeClass('active');
					}
				});

				$('.popup').hover(function(){
					$('.popup').css({ 'z-index': 998 });
					$(this).css({ 'z-index': 999 });
				});

				$('.popup').click(function(){
					$('.popup').css({ 'z-index': 998 });
					$(this).css({ 'z-index': 999 });
				});

				//
				//$('.popup').mouseout(function(){
				//	$(this).removeClass('hover');
				//});
			}

			showCategory();		}
	},
	// About us page, note the change from about-us to about_us.
	about_us: {
		init: function() {
		  // JavaScript to be fired on the about us page
		}
	}
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
	fire: function(func, funcname, args) {
		var namespace = Roots;
		funcname = (funcname === undefined) ? 'init' : funcname;
		if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
			namespace[func][funcname](args);
		}
	},
	loadEvents: function() {
		UTIL.fire('common');

		$.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
		  UTIL.fire(classnm);
		});
	}
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
$(window).load( function() {

	var owlPropertiesSingle = $("#properties-single-slider");
	if(owlPropertiesSingle.length) {

		// Properties single slider
		owlPropertiesSingle.owlCarousel({
			itemsCustom : [
				[0, 1],
				[768, 1]
			],
			autoHeight : true
		});
	}

	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});
	$('#ri-grid ul').fadeIn(1200);
});
