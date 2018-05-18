<?php
/*
Template Name: Con recuadro para íconos
*/


get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<?php get_template_part( 'parts/loop', 'page-header' ); ?>

	    <?php get_template_part( 'parts/loop', 'page' ); ?>

	</article> <!-- end .content -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>