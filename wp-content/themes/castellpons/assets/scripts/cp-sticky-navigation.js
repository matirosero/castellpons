jQuery(document).ready(function($) {

	var toggleBtn = $('#toggle-mobile-menu'),
		mobileMenu = $('#mobile-navigation'),
		mobileMenuBg = $('#mobile-navigation-background')
		topbar = $('body:not(.home) #top-bar-menu');


	$(window).scroll(function() {
		var winTop = $(window).scrollTop();
		if (winTop >= 96 ) {
			console.log('shrink');
			topbar.addClass("shrink");
		} else{
			topbar.removeClass("shrink");
			console.log('unshrink');
		}
	});


	$(document).on( 'click', '#toggle-mobile-menu', function( event ) {

		event.preventDefault();

		console.log('toggle on mobile menu');

		$(this).find('i').toggleClass('icon-menu-toggle').toggleClass('icon-menu-close');

		mobileMenu.toggleClass('open');
		mobileMenuBg.toggleClass('open');
		topbar.toggleClass('static');

		$('body').toggleClass('lock-scroll');

	});

});