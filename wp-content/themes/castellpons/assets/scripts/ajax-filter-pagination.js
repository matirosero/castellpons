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

		var page = find_page_number( $(this).clone() ),
			currentFilter = $('.filter-menu .is-active a'),
			taxID,
			taxonomy;


		if ( currentFilter.attr('data-id') ) {
			// console.log('data id is set');
			taxID = currentFilter.data('id');
		}

		if ( currentFilter.attr('data-taxonomy') ) {
			// console.log('data taxonomy is set');
			taxonomy = currentFilter.data('taxonomy');
		}

		// console.log('page number clicked: ' + page);
		// console.log('taxonomy: ' + taxID);
		// console.log('taxonomy id: ' + taxonomy);

		// console.log(ajaxFilterPagination.query_vars);

		//if new wp query else query vars

		$.ajax({
			url: ajaxFilterPagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_filter_pagination',
				query_vars: ajaxFilterPagination.query_vars,
				page: page,
				taxID: taxID,
				taxonomy: taxonomy
			},
			beforeSend: function() {
				$('.posts-container').find( 'article' ).remove();
				$('.posts-container').find( 'pre' ).remove();
				$('#main .page-navigation').remove();
				$(document).scrollTop();
				$('.posts-container').append( '<div class="page-content text-center" id="loader"><i class="icon-spin1 animate-spin"></i></div>' );
			},
			success: function( html ) {
				$('.posts-container #loader').remove();
				$('.posts-container').append( html );
			}
		})
	})


	$(document).on( 'click', '.filter-menu a', function( event ) {

		event.preventDefault();

		var slug,
			taxID,
			taxonomy;

		// console.log('Clicked slug: ' + $(this).data('id'));

		slug = $(this).data('slug');
		taxID = $(this).data('id');

		if( $(this).data('id') !== null && $(this).data('id') !== '' && $(this).data('id') !== undefined ) {
		   console.log('THERE IS AN ID');
		}

		// console.log('ID is '+taxID);
		// console.log(ajaxFilterPagination.query_vars);

		$.ajax({
			url: ajaxFilterPagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_filter_pagination',
				query_vars: ajaxFilterPagination.query_vars,
				taxID: taxID,
				taxonomy: $(this).data('taxonomy')
			},
			beforeSend: function() {
				$('.posts-container').find( 'article' ).remove();
				$('.posts-container').find( 'pre' ).remove();
				$('#main .page-navigation').remove();
				$('.filter-menu .is-active').removeClass('is-active');
				$(document).scrollTop();
				$('.posts-container').append( '<div class="page-content text-center" id="loader"><i class="icon-spin1 animate-spin"></i></div>' );
			},
			success: function( html ) {
				$('.posts-container #loader').remove();
				$('.posts-container').append( html );
				$('.filter-menu .'+slug).addClass('is-active');
			}
		})
		
	})
});