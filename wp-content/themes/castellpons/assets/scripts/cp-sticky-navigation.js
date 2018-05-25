jQuery(document).ready(function($) {

	// $('#top-bar-menu').on('sticky.zf.stuckto:top', function(){
	//   $(this).addClass('shrink');
	// }).on('sticky.zf.unstuckfrom:top', function(){
	//   $(this).removeClass('shrink');
	// })

	$(window).scroll(function() {
		var winTop = $(window).scrollTop();
		if (winTop >= 96) {
			$("#top-bar-menu").addClass("shrink");
		} else{
			$("#top-bar-menu").removeClass("shrink");
		}
	});

});