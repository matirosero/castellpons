<?php
/**
 * The template for the frontpage
 *
 */

get_header(); ?>

	<div class="content">

		<div class="inner-content">

		    <main id="main" class="main" role="main">

		    	<?php get_template_part( 'parts/content', 'frontpage-slider' ); ?>

		    </main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>