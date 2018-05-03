<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-margin-x grid-padding-x'); ?> role="article">

	<div class="article-image small-12 medium-4 cell">
		<?php the_post_thumbnail('full'); ?>
	</div>

	<div class="article-content small-12 medium-8 cell">
		<header class="article-header">
			<h2><?php the_title(); ?></h2>
			<?php get_template_part( 'parts/content', 'byline' ); ?>
		</header> <!-- end article header -->

		<section class="entry-content" itemprop="articleBody">
			
			<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">
	    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
		</footer> <!-- end article footer -->
	</div>

</article> <!-- end article -->