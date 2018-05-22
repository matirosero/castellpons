jQuery(document).ready(function($) {


	function find_page_number( element ) {
		// element.find('span').remove();
		return parseInt( element.html() );
	}

	$(document).on( 'click', '.pagination a', function( event ) {
		event.preventDefault();

		page = find_page_number( $(this).clone() );

		console.log('page number clicked: ' + page);

		console.log(ajaxpagination.query_vars);

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