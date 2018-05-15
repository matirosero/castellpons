/*
 * Drop side/up
 */

jQuery(document).ready(function($) {
	
	var trigger = $('.drop-up-side .cp-current-language > .wpml-ls-link'),
		menu = $('.drop-up-side');
	
	trigger.on('mouseenter', function(event){
		console.log('hover');
		$(this).next('.submenu').addClass('active');
	});

	menu.on('mouseleave', function(event){
		console.log('leave');
		if ( $(this).find('.submenu').hasClass('active') ) {
			$(this).find('.submenu').removeClass('active');
		}
		
	});
});