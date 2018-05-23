jQuery(document).ready(function($) {

	function getUrlParameter(name) {
	    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
	    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
	    var results = regex.exec(location.search);
	    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
	};

	function find_page_number( element ) {
		// element.find('span').remove();
		var parsed = parseInt( element.html() ),
			page;

		if ( isNaN( parsed ) ) {
			// var url = element.attr('href'),
			// 	;
			// console.log(url);
			// page = getUrlParameter('post');

		}

		return parsed;
	}

	$(document).on( 'click', '.pagination a', function( event ) {
		event.preventDefault();

		page = find_page_number( $(this).clone() );

		console.log('page number clicked: ' + page);

		console.log(ajaxpagination.query_vars);

		//if new wp query else query vars

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page
			},
			beforeSend: function() {
				$('.posts-container').find( 'article' ).remove();
				$('.posts-container').find( 'pre' ).remove();
				$('#main .page-navigation').remove();
				$(document).scrollTop();
				$('.posts-container').append( '<div class="page-content" id="loader">Loading New Posts...</div>' );
			},
			success: function( html ) {
				$('.posts-container #loader').remove();
				$('.posts-container').append( html );
			}
		})
	})

});