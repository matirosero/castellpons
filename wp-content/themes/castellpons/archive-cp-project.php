<?php
/**
 * Displays archive pages if a speicifc template is not set.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

	<div class="content">

		<div class="inner-content">

		    <main id="main" class="main project-content" role="main">

		    	<?php cp_tax_filter(); ?>

		    	<div class="project-grid posts-container">

			    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<!-- To see additional archive styles, visit the /parts directory -->
						<?php get_template_part( 'parts/loop', 'project-grid' ); ?>

					<?php endwhile; ?>
				</div><!-- project-grid -->

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>


			</main> <!-- end #main -->

	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>