/**
 * Theme Customizer
 */

( function( api ) {

	// Extends our custom "hoot-premium" section. ( trt-customizer-pro - custom section )
	api.sectionConstructor['hoot-premium'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

	api.bind('ready', function () {

		jQuery(document).ready(function($) {
			$('a[rel="focuslink"]').click(function(e) {
				e.preventDefault();
				var id = $(this).data('href'),
					type = $(this).data('focustype');
				if(api[type].has(id)) {
					api[type].instance(id).focus();
				}
			});
		});

	});

} )( wp.customize );


jQuery(document).ready(function($) {
	"use strict";

});
