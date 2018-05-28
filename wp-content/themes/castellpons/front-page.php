<?php
/**
 * The template for the frontpage
 *
 */

get_header(); ?>

	<div class="content">

		<header class="page-header grid-y grid-padding-x">

		    	<?php get_template_part( 'parts/content', 'frontpage-slider' ); ?>


		</header> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>