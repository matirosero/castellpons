/*
 * Drop side/up
 */

jQuery(document).ready(function($) {

	var trigger = $('.drop-up-side .cp-current-language > .wpml-ls-link'),
		menu = $('.drop-up-side');

	trigger.on('click', function(e){
        // console.log('clicked on language switcher');
        e.preventDefault();

        // console.log( $(this).next().attr('class') );

        $(this).toggleClass('open').next('.submenu').toggleClass('active');

    });

});