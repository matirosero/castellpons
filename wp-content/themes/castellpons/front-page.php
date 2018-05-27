<?php
/**
 * The template for the frontpage
 *
 */

get_header(); ?>

	<div class="content">

		<div class="inner-content">

		    <main id="main" class="main" role="main">

		    	<?php
	    		/*
	    		 * The WordPress Query class.
	    		 *
	    		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
	    		 */
	    		$args = array(

	    			// Type & Status Parameters
	    			'post_type'   => 'cp-project',
	    			'post_status' => 'any',

	    			'post_status' => array(
	    				'publish',
	    			),

	    			// Order & Orderby Parameters
	    			'order'               => 'DESC',
	    			'orderby'             => 'date',

	    			// Pagination Parameters
	    			'posts_per_page'         => 3,

	    		);

		    	$query = new WP_Query( $args );

		    	if( $query->have_posts() ):
				while ( $query->have_posts() ) : $query->the_post();

					echo '<p>';
					the_title();
					echo '</p>';

					wp_reset_query();

				endwhile;
				endif;

		    	?>

		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>