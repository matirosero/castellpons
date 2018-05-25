jQuery(document).ready(function($) {

	var toggleBtn = $('#toggle-mobile-menu'),
		mobileMenu = $('#mobile-navigation'),
		mobileMenuBg = $('#mobile-navigation-background')
		topbar = $('#top-bar-menu');


	$(window).scroll(function() {
		var winTop = $(window).scrollTop();
		if (winTop >= 96 ) {
			topbar.addClass("shrink");
		} else{
			topbar.removeClass("shrink");
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