<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<?php get_template_part( 'parts/loop', 'page-header' ); ?>

		<?php get_template_part( 'parts/loop', 'single-project' ); ?>

	</article> <!-- end article -->

<?php endwhile; else : ?>

	<?php get_template_part( 'parts/content', 'missing' ); ?>

<?php endif; ?>

<?php get_footer(); ?>