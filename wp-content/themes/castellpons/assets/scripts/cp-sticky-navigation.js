jQuery(document).ready(function($) {

	// $('#top-bar-menu').on('sticky.zf.stuckto:top', function(){
	//   $(this).addClass('shrink');
	// }).on('sticky.zf.unstuckfrom:top', function(){
	//   $(this).removeClass('shrink');
	// })

	var toggleBtn = $('*[data-toggle="mobile-menu"]'),
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



	// $('#toggle-mobile-menu').hide();

	$(document).on( 'click', toggleBtn, function( event ) {

		event.preventDefault();

		console.log('toggle on mobile menu');

		$(this).find('i').toggleClass('icon-menu-toggle').toggleClass('icon-menu-close');

		mobileMenu.toggleClass('open');
		mobileMenuBg.toggleClass('open');
		topbar.toggleClass('static');

		$('body').toggleClass('lock-scroll');

	});

});