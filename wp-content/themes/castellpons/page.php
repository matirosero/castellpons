<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

	<div class="content">

		<div class="inner-content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    <?php get_template_part( 'parts/loop', 'page' ); ?>

		    <?php endwhile; endif; ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>