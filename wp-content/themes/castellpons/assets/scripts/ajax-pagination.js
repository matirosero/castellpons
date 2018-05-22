jQuery(document).ready(function($) {


	function find_page_number( element ) {
		// element.find('span').remove();
		return parseInt( element.html() );
	}

	$(document).on( 'click', '.pagination a', function( event ) {
		event.preventDefault();

		page = find_page_number( $(this).clone() );

		console.log('page number clicked: ' + page);

		$.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page
			},
			success: function( html ) {
				// alert( result );
				$('.posts-container').find( 'article' ).remove();
				$('#main .page-navigation').remove();
				$('.posts-container').append( html );
			}
		})
	})

});