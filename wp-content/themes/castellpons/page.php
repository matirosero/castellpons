<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<?php get_template_part( 'parts/loop', 'page-header' ); ?>

	    <?php get_template_part( 'parts/loop', 'page' ); ?>

	</div> <!-- end #content -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>