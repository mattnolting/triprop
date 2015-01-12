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
			} );

			// About slider
			var owlAbout = $("#about-slider");

			owlAbout.owlCarousel({
				itemsCustom : [
					[0, 1],
					[768, 1]
				]
			});



			// Amenities slider
			var owlAmenities = $("#amenities-slider");

			owlAmenities.owlCarousel({
				itemsCustom : [
					[0, 1],
					[768, 2],
					[1170, 2]
				],
				//navigation : true,
				//navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				rewindNav: false
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
				//navigation : true,
				//navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				rewindNav: false
			});

			$("#next-property").click(function(){
				owlProperties.trigger('owl.next');
			});
			$("#prev-property").click(function(){
				owlProperties.trigger('owl.prev');
			});

		  // JavaScript to be fired on the home page
		}
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
